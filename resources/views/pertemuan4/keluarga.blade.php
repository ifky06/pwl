@extends('layout.template')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Relasi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($keluarga as $no => $k)
                <tr>
                    <th scope="row">{{ $no+1 }}</th>
                    <td>{{ $k->nama}}</td>
                    <td>{{ $k->relasi }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
