@extends('layout.layout')

@section('isi')
    <h1 class="text-center p-5">Edit Vaccine</h1>

    <form action="{{ route('SubmitUpdateVaccine', $vaccines->id) }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="pb-3">
            <label for="name">Vaccine Name</label>
            <input class="form-control" type="text" name="name" id="name" value="{{ $vaccines->name }}">
        </div>
        <div class="pb-3">
            <label for="price">Price</label>
            <div class="input-group-prepend d-flex">
                <span class="input-group-text">Rp</span>
                <input class="form-control" type="text" name="price" id="price" value="{{ $vaccines->price }}">
            </div>
        </div>
        <div class="pb-3">
            <label for="description">Description</label>
            <textarea class="form-control" name="description" id="description">{{ $vaccines->description }}</textarea>
        </div>
        <div class="pb-3">
            <label for="gambar">Image</label>
            <input class="form-control" type="file" name="gambar" id="gambar">
        </div>
        <button class="btn btn-primary" type="submit" name="submit" style="">Submit</button>
    </form>
@endsection