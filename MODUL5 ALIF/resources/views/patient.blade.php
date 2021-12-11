@extends('layout.layout')

@section('isi')
    
    @if (count($patients) === 0)
    <div class="container text-center">
        <p class="text-muted pt-5">There is no data...</p>
    </div>
    <div class="container d-flex justify-content-center">
        <a class="btn btn-primary" href="AddPatient">Register Patient</a>
    </div>

    @elseif (count($patients) > 0)
    <h2 class="text-center p-4">List Patient</h2>
    <div class="container pb-4">
        <a class="btn btn-primary" href="AddPatient">Register Patient</a>
    </div>
    <div class="container">
        <table class="table table-bordered table-striped table-primary shadow">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Vaccine</th>
                    <th scope="col">Nama</th>
                    <th scope="col">NIK</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">No HP</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $number = 1 ?>
                @foreach ($patients as $index => $patient)
                <tr>
                    <td>{{ $number }}</td>
                    <td>
                        @foreach ($vaccines as $nv)
                        @if ($nv->id === $patient->vaccine_id)
                            {{ $nv->name }}
                        @endif
                        @endforeach
                    </td>
                    <td>{{ $patient->name }}</td>
                    <td>{{ $patient->nik }}</td>
                    <td>{{ $patient->alamat }}</td>
                    <td>{{ $patient->no_hp }}</td>
                    <td class="d-flex">
                        <a class="btn btn-warning" href="{{ route('UpdatePatient', $patient->id ) }}">edit</a>
                        &nbsp;&nbsp
                        <form action="{{ route('BuangOrang') }}" method="POST">
                            @csrf
                            <input type="hidden" value="{{ $patient->id }}" name="id">
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