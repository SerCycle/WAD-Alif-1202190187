@extends('layout.layout')

@section('isi')

    <h1 class="text-center p-5">Register {{ $vaccines name }} Patient</h1>

    <form action="{{ route('AddDetail') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="pb-3">
            <label for="vaccine_id">Vaccine Id</label>
            <input class="form-control" type="text" name="vaccine_id" id="vaccine_id" value="{{ $vaccines->id }}" readonly>
        </div>
        <div class="pb-3">
            <label for="name">Patient Name</label>
            <input class="form-control" type="text" name="name" id="name">
        </div>
        <div class="pb-3">
            <label for="nik">NIK</label>
            <div class="input-group-prepend d-flex">
                <input class="form-control" type="text" name="nik" id="nik">
            </div>
        </div>
        <div class="pb-3">
            <label for="alamat">Alamat</label>
            <div class="input-group-prepend d-flex">
                <input class="form-control" type="text" name="alamat" id="alamat">
            </div>
        </div>
        <div class="pb-3">
            <label for="gambar">KTP</label>
            <input class="form-control" type="file" name="gambar" id="gambar">
        </div>
        <div class="pb-3">
            <label for="no_hp">No HP</label>
            <div class="input-group-prepend d-flex">
                <input class="form-control" type="text" name="no_hp" id="no_hp">
            </div>
        </div>
        <button class="btn btn-primary" type="submit" name="submit" style="">Register</button>
    </form>
@endsection