<?php

namespace App\Http\Controllers;

use Alert;
use App\Http\Requests\doctorInformationRequest;
use App\Http\Requests\timetableRequest;
use App\Mail\ValidationAppointment;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Region;
use App\Models\Specialty;
use App\Models\Timetable;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class DoctorContorller extends Controller
{
    public function __construct()
    {
        $this->middleware('doctor');
    }


    public function index()
    {
        $info = Auth::user()->doctorTime;
        $information = Auth::user()->doctorInformation;
        if ($information == false) {

            $cities = Region::all();
            $specialties = Specialty::all();
        } else {
            $cities = '';
            $specialties = '';
        }
        $data = Appointment::where('doctor_id', "=", Auth::id())->with(['patient'])
            ->get();
           

        return view('doctor.doctor', [
            'info' => $info,
            'information' => $information,
            'cities' => $cities,
            'specialties' => $specialties,
            'data' => $data,
        ]);
    }
    public function fullCalender()
    {
        // $data = Appointment::where('doctor_id', "=", Auth::id())
        //     ->get(['id', 'title', 'start', 'end', 'state', 'gender', 'raisonsSymptômes']);


        return response()->json();
    }
    public function timeTable()
    {
        $data = Timetable::where('doctor_id', '=', Auth::id())->first();
        return view('doctor.timeTable', [
            'data' => $data
        ]);
    }
    public function timeTableStore(timetableRequest $request)
    {
        $timetableCreate = Timetable::create([
            'doctor_id' => Auth::id(),
            'isAvailableOnMonday' => $request->input('isAvailableOnMonday'),
            'mondayStartingTime' => $request->input('mondayStartingTime'),
            'mondayClosingTime' => $request->input('mondayClosingTime'),

            'isAvailableOnTuesday' => $request->input('isAvailableOnTuesday'),
            'tuesdayStartingTime' => $request->input('tuesdayStartingTime'),
            'tuesdayClosingTime' => $request->input('tuesdayClosingTime'),

            'isAvailableOnWednesday' => $request->input('isAvailableOnWednesday'),
            'wednesdayStartingTime' => $request->input('wednesdayStartingTime'),
            'wednesdayClosingTime' => $request->input('wednesdayClosingTime'),

            'isAvailableOnThursday' => $request->input('isAvailableOnThursday'),
            'thursdayStartingTime' => $request->input('thursdayStartingTime'),
            'thursdayClosingTime' => $request->input('thursdayClosingTime'),

            'isAvailableOnFriday' => $request->input('isAvailableOnFriday'),
            'fridayStartingTime' => $request->input('fridayStartingTime'),
            'fridayClosingTime' => $request->input('fridayClosingTime'),

            'isAvailableOnSaturday' => $request->input('isAvailableOnSaturday'),
            'saturdayStartingTime' => $request->input('saturdayStartingTime'),
            'saturdayClosingTime' => $request->input('saturdayClosingTime'),

            'isAvailableOnSunday' => $request->input('isAvailableOnSunday'),
            'sundayStartingTime' => $request->input('sundayStartingTime'),
            'sundayClosingTime' => $request->input('sundayClosingTime'),

            'timeConsultation' => $request->input('timeConsultation')
        ]);
        $update = User::find(Auth::id());
        $update->doctorTime = 1;
        $update->save();
        Alert::success('créer avec succès', '');
        return redirect()->route('doctor');
    }
    public function timeTablePut(timetableRequest $request)
    {

        $update = Timetable::where('doctor_id', '=', Auth::id())->first();
        // die($update);
        $update->isAvailableOnMonday =  $request->input('isAvailableOnMonday');

        $update->mondayStartingTime =  $request->input('mondayStartingTime');
        $update->mondayClosingTime = $request->input('mondayClosingTime');

        $update->isAvailableOnTuesday = $request->input('isAvailableOnTuesday');
        $update->tuesdayStartingTime = $request->input('tuesdayStartingTime');
        $update->tuesdayClosingTime = $request->input('tuesdayClosingTime');

        $update->isAvailableOnWednesday = $request->input('isAvailableOnWednesday');
        $update->wednesdayStartingTime = $request->input('wednesdayStartingTime');
        $update->wednesdayClosingTime = $request->input('wednesdayClosingTime');

        $update->isAvailableOnThursday = $request->input('isAvailableOnThursday');
        $update->thursdayStartingTime = $request->input('thursdayStartingTime');
        $update->thursdayClosingTime = $request->input('thursdayClosingTime');

        $update->isAvailableOnFriday = $request->input('isAvailableOnFriday');
        $update->fridayStartingTime = $request->input('fridayStartingTime');
        $update->fridayClosingTime = $request->input('fridayClosingTime');

        $update->isAvailableOnSaturday = $request->input('isAvailableOnSaturday');
        $update->saturdayStartingTime = $request->input('saturdayStartingTime');
        $update->saturdayClosingTime = $request->input('saturdayClosingTime');

        $update->isAvailableOnSunday = $request->input('isAvailableOnSunday');
        $update->sundayStartingTime = $request->input('sundayStartingTime');
        $update->sundayClosingTime = $request->input('sundayClosingTime');

        $update->timeConsultation = $request->input('timeConsultation');
        $update->save();
        Alert::success('la modification a été effectuée', '');
        return redirect()->route('doctorTimeTable');
    }
    public function doctorInfo()
    {
        $data = Doctor::where('doctor_id', '=', Auth::id())->first();
        $cities = Region::all();
        $specialties = Specialty::all();
        return view('doctor.informations', [
            'data' => $data,
            'cities' => $cities,
            'specialties' => $specialties
        ]);
    }
    public function doctorInfoStore(doctorInformationRequest $request)
    {
        $image = $request->file('profilePhoto');
        $profilePhoto = Storage::disk('public')->put(Auth::user()->name, $image);
        $doctorInfo = Doctor::create([
            'doctor_id' => Auth::id(),
            'speciality' => $request->input('speciality'),
            'ville' => $request->input('ville'),
            'numeroTel' => $request->input('numeroTel'),
            'tarif' => $request->input('tarif'),
            'profilePhoto' => $profilePhoto,
        ]);
        $update = User::find(Auth::id());
        $update->doctorInformation = 1;
        $update->save();
        Alert::success('créer avec succès', '');
        return redirect()->route('doctor');
    }
    public function doctorInfoUpdate(doctorInformationRequest $request)
    {
        $update = Doctor::where('doctor_id', '=', Auth::id())->first();
        if ($request->hasFile('profilePhoto')) {
            // die('hello');
            Storage::deleteDirectory(Auth::user()->name);
            $image = $request->file('profilePhoto');
            $saveimage = Storage::disk('public')->put(Auth::user()->name, $image);
            $update->profilePhoto = $saveimage;
        }
        $update->speciality =  $request->input('speciality');
        $update->ville = $request->input('ville');
        $update->numeroTel = $request->input('numeroTel');
        $update->tarif = $request->input('tarif');
        $update->save();
        Alert::success('la modification a été effectuée', '');
        return redirect()->route('doctorInfo');
    }

    public function validation()
    {
        $data = Appointment::where('doctor_id', "=", Auth::id())->where('start', '>=', date("Y-m-d"))->with(['patient'])->get();
        return view('doctor.validation', [
            'data' => $data,
        ]);
    }

    public function validateAppointment($id)
    {
        $appointment = Appointment::with('doctor', 'patient')->find($id);
        $appointment->state = !$appointment->state;
        Mail::to($appointment->patient->email)->send(new ValidationAppointment($appointment));
        $appointment->save();
        Alert::success('la modification a été effectuée', '');
        return redirect()->route('validation');
    }
    public function ArchivePatient()
    {
        $data = Appointment::where('doctor_id', "=", Auth::id())->where('end', '<=', date("Y-m-d"))->with(['patient'])->paginate('10');
        return view('doctor.archive', [
            'data' => $data,
        ]);
    }

    public function appointmentCompleteInfos($id)
    {
        $appointment = Appointment::with('patient')->findOrFail($id);
        return view('doctor.appointmentCompleteInfos',  [
            'appointment' => $appointment
        ]);
    }
    public function updateAppointmentCompleteInfos(Request $request, $id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->temperature =  $request->input('temperature');
        $appointment->tension = $request->input('tension');
        $appointment->poids = $request->input('poids');
        $appointment->detectionAllergies = $request->input('allergies');
        $appointment->medicaments = $request->input('medicaments');
        $appointment->save();
        Alert::success('la modification a été effectuée', '');
        return redirect()->route('doctor');
        
    }
}
