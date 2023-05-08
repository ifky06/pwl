@extends('layout.template')

@section('content')
    <form action="{{$url_form}}" method="post">
        @csrf
        {!! (isset($mhs))? method_field('PUT'):'' !!}
        <div class="form-group">
            <label for="nim">NIM</label>
            <input type="text" name="nim" id="nim" class="form-control" value="{{isset($mhs)?$mhs->nim:old('nim')}}">
            @error('nim')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div>
            <label for="kelas_id">Kelas</label>
            <select name="kelas_id" id="kelas_id" class="form-control">
                @foreach($kelas as $row)
                    <option value="{{$row->id}}" @isset($mhs) @selected($mhs->kelas_id == $row->id) @endisset>{{$row->nama_kelas}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" name="nama" id="nama" class="form-control" value="{{isset($mhs)?$mhs->nama:old('nama')}}">
            @error('nama')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="jk">Jenis Kelamin</label>
            <select name="jk" id="jk" class="form-control">
                <option value="L" @isset($mhs) @selected($mhs->jk == 'L') @endisset>Laki-laki</option>
                <option value="P" @isset($mhs) @selected($mhs->jk == 'P') @endisset>Perempuan</option>
            </select>
        </div>
        <div class="form-group">
            <label for="tempat_lahir">Tempat Lahir</label>
            <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" value="{{isset($mhs)?$mhs->tempat_lahir:old('tempat_lahir')}}">
            @error('tempat_lahir')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="tanggal_lahir">Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" value="{{isset($mhs)?$mhs->tanggal_lahir:old('tanggal_lahir')}}">
            @error('tanggal_lahir')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="hp">HP</label>
            <input type="text" name="hp" id="hp" class="form-control" value="{{isset($mhs)?$mhs->hp:old('hp')}}">
            @error('hp')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" name="alamat" id="alamat" class="form-control" value="{{isset($mhs)?$mhs->alamat:old('alamat')}}">
            @error('alamat')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
