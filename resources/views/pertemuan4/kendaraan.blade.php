@extends('layout.template')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nopol</th>
                <th scope="col">Merk</th>
                <th scope="col">Jenis</th>
                <th scope="col">Tahun Buat</th>
                <th scope="col">Warna</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kendaraan as $no => $k)
                <tr>
                    <th scope="row">{{ $no+1 }}</th>
                    <td>{{ $k->nopol}}</td>
                    <td>{{ $k->merk }}</td>
                    <td>{{ $k->jenis }}</td>
                    <td>{{ $k->tahun_buat }}</td>
                    <td>{{ $k->warna }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
