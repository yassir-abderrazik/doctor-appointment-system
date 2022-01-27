<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Alert;
class AdminController extends Controller
{
    public function index()
    {
        $record = User::select(
            DB::raw('count(*) as number')
        )
            ->groupBy('type')
            ->get('value');
        $specialities = Doctor::select(
            DB::raw('speciality as speciality'),
            DB::raw('count(*) as number')
        )
            ->groupBy('speciality')
            ->get();

        $doctors = [];
        foreach ($specialities as $row) {
            $doctors['label'][] = $row->speciality;
            $doctors['data'][] =  $row->number;
        }
        $doctors['chart_data'] = json_encode($doctors);

        $data = [];
        foreach ($record as $row) {
            $data[] = $row->number;
        }
        $data = json_encode($data);
        return view('admin.admin', [
            'data' => $data,
            'doctors' => $doctors
        ]);
    }
    public function users()
    {
        $users = User::where('type', 'doctor')->orWhere('type', 'admin')->orderBy('created_at', 'desc')->paginate(5);
        return view('admin.users', [
            'users' => $users
        ]);
    }
    public function addUser(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'min:8'],
            'type' => ['required']
        ]);

        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'type' => $request->type,
        ]);
        Alert::success('créer avec succès', '');
        return redirect()->route('usersGestion');
    }
}
