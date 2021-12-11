@extends('layout.layout')

@section('isi')
    
    @if (count($vaccines) === 0)
    <div class="container text-center">
        <p class="text-muted pt-5">There is no data...</p>
    </div>
    <div class="container d-flex justify-content-center">
        <a class="btn btn-primary" href="AddVaccine">Add Vaccine</a>
    </div>

    @elseif (count($vaccines) > 0)
    <h2 class="text-center p-4">List Vaccine</h2>
    <div class="container pb-4">
        <a class="btn btn-primary" href="AddVaccine">Add Vaccine</a>
    </div>
    <div class="container">
        <table class="table table-bordered table-striped table-primary shadow">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Price</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $number = 1 ?>
                @foreach ($vaccines as $index => $vaccine)
                <tr>
                    <td>{{ $number }}</td>
                    <td>{{ $vaccine->name }}</td>
                    <td>Rp. {{ $vaccine->price }}</td>
                    <td class="d-flex">
                        <a class="btn btn-warning" href="{{ route('UpdateVaccine', $vaccine->id ) }}">edit</a>
                        &nbsp;&nbsp
                        <form action="{{ route('delete') }}" method="POST">
                            @csrf
                            <input type="hidden" value="{{ $vaccine->id }}" name="id">
                            <button class="btn-danger btn">Delete</button>
                        </form>
                    </td>
                </tr>
                <?php $number++ ?>
                @endforeach
            </tbody>
        </table>
    </div>

    @endif
@endsection