<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vaccine;

class VaccineController extends Controller
{
    public function tambah()
    {
        $vaccines = Vaccine::all();
        return view('partVaccine.AddVaccine');
    }

    public function AddVaccine(Request $request)
    {
        if ($files = $request->file('gambar')) {
            $destinationPath = 'StorageImage';
            $file = $request->file('gambar');
            $profileImage = "VaksinPict" . rand(100, 200) . "." . $files->getClientOriginalExtension();
            $imgPath = $file->storeAs('', $profileImage);
            $files->move($destinationPath, $profileImage);
        }

        $vaccines = new Vaccine();
        $vaccines->name = $request->name;
        $vaccines->price = $request->price;
        $vaccines->description = $request->description;
        $vaccines->image = $imgPath;

        $vaccines->save();
        return redirect(route('PageVaccine'));
    }

    public function delete(Request $request)
    {
        $vaccines = Vaccine::find($request->id);
        $vaccines->delete();

        return redirect(route('PageVaccine'));
    }

    public function editview($id)
    {
        $vaccines = Vaccine::find($id);
        return view('partVaccine.UpdateVaccine', compact('vaccines'));
    }

    public function AddUpdateVaccine($id, Request $request)
    {
        if ($files = $request->file('gambar')) {
            $destinationPath = 'StorageImage';
            $file = $request->file('gambar');
            $profileImage = "VaksinPict" . rand(100, 200) . "." . $files->getClientOriginalExtension();
            $imgPath = $file->storeAs('', $profileImage);
            $files->move($destinationPath, $profileImage);
        }

        $vaccines = Vaccine::find($id);
        $vaccines->name = $request->name;
        $vaccines->price = $request->price;
        $vaccines->description = $request->description;
        $vaccines->image = $imgPath;

        $vaccines->save();
        return redirect(route('PageVaccine'));
    }
}
