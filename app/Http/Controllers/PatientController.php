<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Region;
use App\Models\Specialty;
use App\Models\Timetable;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Alert;
use App\Mail\ModifyRendezVousMail;
use App\Rules\CheckAvailableHour;
use App\Rules\CheckDayWork;
use Illuminate\Support\Facades\Mail;
use PDF;

class PatientController extends Controller
{
    public function __construct()
    {
        $this->middleware('patient');
    }


    public function index()
    {
        $cities = Region::all();
        $specialties = Specialty::all();
        $data = Appointment::where('patient_id', "=", Auth::id())->with(['doctor'])->orderBy('start', 'desc')->get();
        return view('patient.patient', [
            'data' => $data,
            'cities' => $cities,
            'specialties' => $specialties
        ]);
    }

    public function fixerAppointment(Request $request, $id)
    {
        // die($request);
        $minute = Timetable::where('doctor_id', $id)->first();
        $start = strtotime($request->day);
        $start = date("Y-m-d", $start);
        $request->validate([
            'gender' => 'required',
            'day' => [
                'required', 'date', 'after:tomorrow',
                new CheckDayWork($minute),
                new CheckAvailableHour($start, $minute),
            ],
            'raisonsSymptômes' => 'required',
        ]);

        $last = Appointment::where('start', 'like', $start . '%')->where('doctor_id',  $id)->latest()->value('start');
        if (empty($last)) {
            $day = Carbon::parse($request->day);
            $day = $day->format('l');

            if ($day == 'Monday') {
                $startappointment = $request->day . ' ' . $minute->mondayStartingTime;
            } else if ($day == 'Tuesday') {
                $startappointment = $request->day . ' ' . $minute->tuesdayStartingTime;
            } else if ($day == 'Wednesday') {
                $startappointment = $request->day . ' ' . $minute->wednesdayStartingTime;
            } else if ($day == 'Thursday') {
                $startappointment = $request->day . ' ' . $minute->thursdayStartingTime;
            } else if ($day == 'Friday') {
                $startappointment = $request->day . ' ' . $minute->fridayStartingTime;
            } else if ($day == 'Saturday') {
                $startappointment = $request->day . ' ' . $minute->saturdayStartingTime;
            } else if ($day == 'Sunday') {
                $startappointment = $request->day . ' ' . $minute->sundayStartingTime;
            }

            $startappointment = strtotime($startappointment);
            $startappointment = date("Y-m-d H:i:s", $startappointment);
            $end = Carbon::parse($startappointment)->addMinutes($minute->timeConsultation - 1);

            $appointment = Appointment::create([
                'patient_id' => Auth::id(),
                'doctor_id' => $id,
                'gender' => $request->gender,
                'start' => $startappointment,
                'end' => $end,
                'raisonsSymptômes' => $request->raisonsSymptômes,
            ]);
        } else {

            $startappointment = Carbon::parse($last)->addMinutes($minute->timeConsultation);
            $end = Carbon::parse($startappointment)->addMinutes($minute->timeConsultation - 1);
            $appointment = Appointment::create([
                'patient_id' => Auth::id(),
                'doctor_id' => $id,
                'gender' => $request->gender,
                'start' => $startappointment,
                'end' => $end,
                'raisonsSymptômes' => $request->raisonsSymptômes,
            ]);
        }

        Alert::success('créer avec succès', '');
        return redirect()->route('patient');
    }

    public function appointmentUpdate(Request $request, $appointment, $id)
    {
        $minute = Timetable::where('doctor_id', $id)->first();
        $start = strtotime($request->day);
        $start = date("Y-m-d", $start);
        $request->validate([

            'day' => [
                'required', 'date', 'after:tomorrow',
                new CheckDayWork($minute),
                new CheckAvailableHour($start, $minute),
            ],
        ]);
        $appointment = Appointment::find($appointment);

        $last = Appointment::where('start', 'like', $start . '%')->where('doctor_id',  $id)->latest()->value('start');
        if (empty($last)) {
            $day = Carbon::parse($request->day);
            $day = $day->format('l');

            if ($day == 'Monday') {
                $startappointment = $request->day . ' ' . $minute->mondayStartingTime;
            } else if ($day == 'Tuesday') {
                $startappointment = $request->day . ' ' . $minute->tuesdayStartingTime;
            } else if ($day == 'Wednesday') {
                $startappointment = $request->day . ' ' . $minute->wednesdayStartingTime;
            } else if ($day == 'Thursday') {
                $startappointment = $request->day . ' ' . $minute->thursdayStartingTime;
            } else if ($day == 'Friday') {
                $startappointment = $request->day . ' ' . $minute->fridayStartingTime;
            } else if ($day == 'Saturday') {
                $startappointment = $request->day . ' ' . $minute->saturdayStartingTime;
            } else if ($day == 'Sunday') {
                $startappointment = $request->day . ' ' . $minute->sundayStartingTime;
            }

            $startappointment = strtotime($startappointment);
            $startappointment = date("Y-m-d H:i:s", $startappointment);
            $end = Carbon::parse($startappointment)->addMinutes($minute->timeConsultation - 1);



            $appointment->start = $startappointment;
            $appointment->end = $end;
            $appointment->save();
        } else {

            $startappointment = Carbon::parse($last)->addMinutes($minute->timeConsultation);
            $end = Carbon::parse($startappointment)->addMinutes($minute->timeConsultation - 1);

            $appointment->start = $startappointment;
            $appointment->end = $end;
            $appointment->save();
        }
        Mail::to($appointment->doctor->email)->send(new ModifyRendezVousMail($appointment));
        Alert::success('la modification a été effectuée', '');
        return redirect()->route('patient');
    }




    public function deleteAppointment($id)
    {
        $appointment = Appointment::find($id);
        $appointment->delete();
        Alert::success('Supprimer avec succès', '');
        return redirect()->route('patient');
    }


    public function downloadRecu($id)
    {   
        $appointment = Appointment::with('doctor')->find($id);
        $pdf = PDF::loadView('pdf.pdfGenerate', compact('appointment'));
        return $pdf->download('invoice-'.Auth::user()->name.'-'.$appointment->start.'.pdf');
    }
}
