<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Vaccine;

class PatientController extends Controller
{
    public function NewPatient()
    {
        $vaccines = Vaccine::all();
        return view('partPatient.CardVaccine', compact('vaccines'));
    }

    public function GiveIdVaccine(Request $request)
    {
        $vaccines = Vaccine::find(request('id'));
        return view('partPatient.AddPatient', compact('vaccines'));
    }

    public function AddDetail(Request $request)
    {
        if ($files = $request->file('gambar')) {
            $destinationPath = 'StorageImage';
            $file = $request->file('gambar');
            $profileImage = "ktpPict" . rand(100, 200) . "." . $files->getClientOriginalExtension();
            $imgPath = $file->storeAs('', $profileImage);
            $files->move($destinationPath, $profileImage);
        }

        $patients = new Patient();
        $patients->vaccine_id = $request->vaccine_id;
        $patients->name = $request->name;
        $patients->nik = $request->nik;
        $patients->alamat = $request->alamat;
        $patients->image_ktp = $imgPath;
        $patients->no_hp = $request->no_hp;

        $patients->save();
        return redirect(route('PagePatient'));
    }

    public function BuangOrang(Request $request)
    {
        $patients = Patient::find($request->id);
        $patients->delete();

        return redirect(route('PagePatient'));
    }

    public function editpatient($id)
    {
        $patients = Patient::find($id);
        $vaccines = Vaccine::all();
        return view('partPatient.Updatepatient', compact('patients'), compact('vaccines'));
    }

    public function AddUpdatePatient($id, Request $request)
    {
        if ($files = $request->file('gambar')) {
            $destinationPath = 'StorageImage';
            $file = $request->file('gambar');
            $profileImage = "ktpPict" . rand(100, 200) . "." . $files->getClientOriginalExtension();
            $imgPath = $file->storeAs('', $profileImage);
            $files->move($destinationPath, $profileImage);
        }

        $patients = Patient::find($id);
        $patients->vaccine_id = $request->vaccine_id;
        $patients->name = $request->name;
        $patients->nik = $request->nik;
        $patients->alamat = $request->alamat;
        $patients->image_ktp = $imgPath;
        $patients->no_hp = $request->no_hp;

        $patients->save();
        return redirect(route('PagePatient'));
    }
}
