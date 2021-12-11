@extends('layout.layout')

@section('isi')

    @if (count($vaccines) === 0)
        <div class="container text-center">
            <p class="pt-5">Vaccine nya blom ada boss, monggo di add duls</p>
        </div>
        <div class="container d-flex justify-content-center">
            <a class="btn btn-primary" href="AddVaccine">Add Vaccine</a>
        </div>
        
    @elseif (count($vaccines) > 0)
        <h2 class="text-center p-4">List Vaccine</h2>
        <div class="container pb-4 d-flex justify-content-around">
            @foreach ($vaccines as $index => $vaccine)
                <div class="card m-1" style="width:18rem;">
                    <img src="StorageImage/{{ $vaccine->image }}" alt="gambar" class="card-img-top">
                    <div class="card-body">
                        <h4 class="card-title">{{ $vaccine->name }}</h4>
                        <p class="">Rp. {{ $vaccine->price }}</p>
                        <p class="">{{ $vaccine->description }}</p>
                    </div>
                    <div class="card-footer d-flex justify-content-around">
                        <form action="{{ route('GiveIdVaccine') }}" method="POST">
                            @csrf
                            <input type="hidden" value="{{ $vaccine->id }}" name="id">
                            <button class="btn btn-primary" type="submit">Vaccine Now</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

    
@endsection