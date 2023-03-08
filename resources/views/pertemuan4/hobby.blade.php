@extends('layout.template')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Hobby</th>
            <th scope="col">Alasan</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($hobby as $no => $h)
            <tr>
                <th scope="row">{{ $no+1 }}</th>
                <td>{{ $h->hobby}}</td>
                <td>{{ $h->alasan }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection

