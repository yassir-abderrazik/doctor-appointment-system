<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Region;
use App\Models\Specialty;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $cities = Region::all();
        $specialties = Specialty::all();
        return view('welcome', [
            'cities' => $cities,
            'specialties' => $specialties
        ]);
    }

    public function getDoctor(Request $request)
    {
        if ($request->tarif == "inf250") {
            $doctors = Doctor::where('speciality', $request->speciality)->where('ville', $request->ville)
                ->where('tarif', '<=', '250')
                ->with('doctor')->get();
        }else if($request->tarif == "sup250"){
            $doctors = Doctor::where('speciality', $request->speciality)->where('ville', $request->ville)
            ->where('tarif', '>', '250')
            ->with('doctor')->get();
        }else {
            $doctors = Doctor::where('speciality', $request->speciality)
            ->with('doctor')->get();
        }
   
        $cities = Region::all();
        $specialties = Specialty::all();
        return view('doctorResults', [
            'doctors' => $doctors,
            'cities' => $cities,
            'specialties' => $specialties
        ]);
    }
    public function takeAppointment($id)
    {

        $doctor = User::with(['timeTable', 'doctor'])->find($id);
        return view('takeAppointment', [
            'doctor' => $doctor
        ]);
    }
    public function getHour($date, $id)
    {
        $start = strtotime($date);
        $start = date("Y-m-d", $start);
        $data = Appointment::where('start', 'like', $start . '%')->where('doctor_id', $id)->get();
        return response()->json($data);
    }
}
