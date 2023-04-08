@extends('layout.template')

@section('content')
    <a href="{{url('mahasiswa/create')}}" class="btn btn-sm btn-success my-2">Tambah Data</a>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>No</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>HP</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @if($mhs->count() > 0)
            @foreach($mhs as $no => $row)
                <tr>
                    <td>{{ $no+1 }}</td>
                    <td>{{ $row->nim }}</td>
                    <td>{{ $row->nama }}</td>
                    <td>{{ $row->jk }}</td>
                    <td>{{$row->hp }}</td>
                    <td>
                        <a href="{{url('/mahasiswa/'.$row->id.'/edit')}}" class="btn btn-sm btn-primary">edit</a>
                        <form action="{{url('/mahasiswa/'.$row->id)}}" method="post" style="display: inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
{{--                    <td>--}}
{{--                        <a href="{{ route('mahasiswa.edit', $row->id) }}" class="btn btn-warning">Edit</a>--}}
{{--                        <form action="{{ route('mahasiswa.destroy', $row->id) }}" method="post" style="display: inline">--}}
{{--                            @csrf--}}
{{--                            @method('DELETE')--}}
{{--                            <button type="submit" class="btn btn-danger">Delete</button>--}}
{{--                        </form>--}}
{{--                    </td>--}}
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="6" class="text-center">Data tidak ada</td>
            </tr>
        @endif

        </tbody>
    </table>
@endsection
