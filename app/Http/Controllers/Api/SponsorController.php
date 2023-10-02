<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Doctor;
use App\Models\User;
use App\Models\Specialization;

class SponsorController extends Controller
{
    public function index()
    {
        $data_attuale = date('Y-m-d');

        $sponsorDoctorData = DB::table('sponsor_doctor')
            ->join('doctors', 'doctors.id', '=', 'sponsor_doctor.doctor_id')
            ->join('users', 'users.id', '=', 'doctors.user_id')
            ->join('specialization_doctor', 'specialization_doctor.doctor_id', '=', 'doctors.id')
            ->join('specializations', 'specializations.id', '=', 'specialization_doctor.specialization_id')
            ->select('users.name', 'users.surname', 'doctors.id as doctor_id', 'doctors.picture')
            ->distinct()
            ->addSelect(DB::raw('GROUP_CONCAT(specializations.name) as specialization_names'))
            ->addSelect('sponsor_doctor.expire_date')
            ->where('sponsor_doctor.expire_date', '>', $data_attuale)
            ->groupBy('doctors.id', 'users.name', 'users.surname', 'doctors.picture', 'sponsor_doctor.expire_date')
            ->get();

        return response()->json($sponsorDoctorData);
    }
}
