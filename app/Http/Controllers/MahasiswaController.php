<?php

namespace App\Http\Controllers;

use App\Models\KelasModel;
use App\Models\MahasiswaModel;
use App\Models\MatkulMahasiswaModel;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mhs=MahasiswaModel::all();
        return view('pertemuan7.mahasiswa.mahasiswa')
            ->with('mhs',$mhs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelas=KelasModel::all();
        return view('pertemuan7.mahasiswa.create_mahasiswa')
            ->with('url_form',url('/mahasiswa'))
            ->with('kelas',$kelas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'nim' => 'required|string|max:10|unique:mahasiswa,nim',
            'nama' => 'required|string|max:50',
            'jk' => 'required',
            'tempat_lahir' => 'required|string|max:50',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string|max:255',
            'hp' => 'required|string|max:15',
        ]);

        $data = $request->all();

        if($request->file('foto')){
            $image_name = $request->file('foto')->store('images', 'public');
            $data['foto'] = $image_name;

        }

        MahasiswaModel::create($data);
        return redirect ('/mahasiswa')
            ->with('success','Mahasiswa berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MahasiswaModel  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = MahasiswaModel::find($id);
        $khs = MatkulMahasiswaModel::where('mahasiswa_id',$id)->get();
        return view('pertemuan7.mahasiswa.show_mahasiswa')
            ->with('data',$data)
            ->with('khs',$khs);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MahasiswaModel  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kelas=KelasModel::all();
        $mhs = MahasiswaModel::find($id);
        return view('pertemuan7.mahasiswa.create_mahasiswa')
            ->with('mhs',$mhs)
            ->with('url_form',url('/mahasiswa/'.$id))
            ->with('kelas',$kelas);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MahasiswaModel  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nim' => 'required|string|max:10|unique:mahasiswa,nim,'.$id,
            'nama' => 'required|string|max:50',
            'jk' => 'required',
            'tempat_lahir' => 'required|string|max:50',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string|max:255',
            'hp' => 'required|string|max:15',
        ]);

        $data = MahasiswaModel::where('id','=',$id)->first();
        $dataUpdate = $request->except('_token','_method');
        if($request->file('foto')){
            if($data->foto && file_exists(storage_path('app/public/'.$data->foto))){
                \Storage::delete('public/'.$data->foto);
            }
            $image_name = $request->file('foto')->store('images', 'public');
            $dataUpdate['foto'] = $image_name;
        }
        $data->update($dataUpdate);
//        $data = MahasiswaModel::where('id','=',$id)->update($request->except('_token','_method'));
        return redirect ('/mahasiswa')
            ->with('success','data Mahasiswa berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MahasiswaModel  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        MahasiswaModel::where('id','=',$id)->delete();
        return redirect ('/mahasiswa')
            ->with('success','data Mahasiswa berhasil dihapus');
    }

    public function cetak_khs($id)
    {
        $data = MahasiswaModel::find($id);
        $khs = MatkulMahasiswaModel::where('mahasiswa_id',$id)->get();
        $pdf = PDF::loadView('pertemuan7.mahasiswa.mahasiswa_pdf',compact('data','khs'));
        return $pdf->stream();
    }
}
