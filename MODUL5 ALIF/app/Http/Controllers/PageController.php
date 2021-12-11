<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vaccine;
use App\Models\Patient;

class PageController extends Controller
{
    public function PageHome()
    {
        return view('index');
    }

    public function PageVaccine()
    {
        $vaccines = Vaccine::all();
        return view('vaccine', compact('vaccines'));
    }

    public function PagePatient()
    {
        $patients = Patient::all();
        $vaccines = Vaccine::all();
        return view('patient', compact('patients'), compact('vaccines'));
    }

    public function PilihVaccine()
    {
        $vaccines = Vaccine::all();
        return view('vaccine', compact('vaccines'));
    }
}
