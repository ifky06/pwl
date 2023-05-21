<!DOCTYPE html>
<html>
<head>
    <title>Membuat Laporan PDF Dengan DOMPDF Laravel</title>
</head>
<body>
<style type="text/css">
    table tr td,
    table tr th{
        font-size: 9pt;
    }
</style>
<center>
    <h4>JURUSAN TEKNOLOGI INFORMASI - POLITEKNIK NEGERI MALANG</h4>
    <h3>KARTU HASIL STUDI (KHS)</h3>
</center>
<p><span class="font-weight-bold">Nama:</span> {{$data->nama}}</p>
<p><span class="font-weight-bold">NIM:</span> {{$data->nim}}</p>
<p><span class="font-weight-bold">Kelas:</span> {{$data->kelas->nama_kelas}}</p>
<table class="table table-striped">
    <thead>
    <tr>
        <th>MataKuliah</th>
        <th>SKS</th>
        <th>Semester</th>
        <th>Nilai</th>
    </tr>
    </thead>
    <tbody>
    @if($khs->count() > 0)
        @foreach($khs as $row)
            <tr>
                <td>{{ $row->matkul->nama }}</td>
                <td>{{ $row->matkul->sks }}</td>
                <td>{{ $row->matkul->semester }}</td>
                <td>{{ $row->nilai}}</td>
            </tr>
        @endforeach
    @else
        <tr>
            <td colspan="6" class="text-center">Data tidak ada</td>
        </tr>
    @endif

    </tbody>
</table>
</body>
</html>
