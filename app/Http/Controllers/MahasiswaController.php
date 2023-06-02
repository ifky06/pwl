<?php

namespace App\Http\Controllers;

use App\Models\KelasModel;
use App\Models\MahasiswaModel;
use App\Models\MatkulMahasiswaModel;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $mhs=MahasiswaModel::all();
        $kelas=KelasModel::all();
        return view('pertemuan7.mahasiswa.mahasiswa')
            ->with('kelas',$kelas);
//            ->with('mhs',$mhs);
    }

    public function data()
    {
        $mhs=MahasiswaModel::all();
        return DataTables::of($mhs)
            ->addColumn('kelas', function ($mhs) {
                return $mhs->kelas->nama_kelas;
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
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
//    public function store(Request $request)
//    {
//
//        $request->validate([
//            'nim' => 'required|string|max:10|unique:mahasiswa,nim',
//            'nama' => 'required|string|max:50',
//            'jk' => 'required',
//            'tempat_lahir' => 'required|string|max:50',
//            'tanggal_lahir' => 'required|date',
//            'alamat' => 'required|string|max:255',
//            'hp' => 'required|string|max:15',
//        ]);
//
//        $data = $request->all();
//
//        if($request->file('foto')){
//            $image_name = $request->file('foto')->store('images', 'public');
//            $data['foto'] = $image_name;
//
//        }
//
//        MahasiswaModel::create($data);
//        return redirect ('/mahasiswa')
//            ->with('success','Mahasiswa berhasil ditambahkan');
//    }

    public function store(Request $request)
    {
        $rule = [
            'nim' => 'required|string|max:10|unique:mahasiswa,nim',
            'nama' => 'required|string|max:50',
            'hp' => 'required|digits_between:6,15',
        ];

        $data = $request->all();
        $foto = $request->foto;

        $validator = Validator::make($data, $rule);
        if($validator->fails()){
            return response()->json([
                'status' => false,
                'modal_close' => false,
                'message' => 'Data gagal ditambahkan. ' .$validator->errors()->first(),
                'data' => $validator->errors()
            ]);
        }

        if($foto){
            $image_name = $foto->store('images', 'public');
            $data['foto'] = $image_name;
        }

        $mhs = MahasiswaModel::create($data);
        return response()->json([
            'status' => ($mhs),
            'modal_close' => false,
            'message' => ($mhs)? 'Data berhasil ditambahkan' : 'Data gagal ditambahkan',
            'data' => null
        ]);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MahasiswaModel  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['mahasiswa'] = MahasiswaModel::find($id);
        $data['mahasiswa']->kelas_id = $data['mahasiswa']->kelas->nama_kelas;
        $data['khs'] = MatkulMahasiswaModel::where('mahasiswa_id',$id)->get();
        $data['khs']->map(function ($item){
            $item->matkul_id = $item->matkul->nama;
            $item['sks'] = $item->matkul->sks;
            $item['semester'] = $item->matkul->semester;
            return $item;
        });
        return response()->json([
            'data' => $data['mahasiswa'],
            'khs' => $data['khs']
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MahasiswaModel  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
//        $kelas=KelasModel::all();
        $mhs = MahasiswaModel::find($id);
//        return view('pertemuan7.mahasiswa.create_mahasiswa')
//            ->with('mhs',$mhs)
//            ->with('url_form',url('/mahasiswa/'.$id))
//            ->with('kelas',$kelas);
        return response()->json($mhs);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MahasiswaModel  $mahasiswa
     * @return \Illuminate\Http\Response
     */

//        $request->validate([
//            'nim' => 'required|string|max:10|unique:mahasiswa,nim,'.$id,
//            'nama' => 'required|string|max:50',
//            'jk' => 'required',
//            'tempat_lahir' => 'required|string|max:50',
//            'tanggal_lahir' => 'required|date',
//            'alamat' => 'required|string|max:255',
//            'hp' => 'required|string|max:15',
//        ]);
//
//        $data = MahasiswaModel::where('id','=',$id)->first();
//        $dataUpdate = $request->except('_token','_method');
//        if($request->file('foto')){
//            if($data->foto && file_exists(storage_path('app/public/'.$data->foto))){
//                \Storage::delete('public/'.$data->foto);
//            }
//            $image_name = $request->file('foto')->store('images', 'public');
//            $dataUpdate['foto'] = $image_name;
//        }
//        $data->update($dataUpdate);
////        $data = MahasiswaModel::where('id','=',$id)->update($request->except('_token','_method'));
//        return redirect ('/mahasiswa')
//            ->with('success','data Mahasiswa berhasil diupdate');
    public function update(Request $request, $id)
    {
        $rule = [
            'nim' => 'required|string|max:10|unique:mahasiswa,nim,'.$id,
            'nama' => 'required|string|max:50',
            'hp' => 'required|digits_between:6,15',
        ];

        $data = $request->all();
        $foto = $request->foto;

        $validator = Validator::make($data, $rule);
        if($validator->fails()){
            return response()->json([
                'status' => false,
                'modal_close' => false,
                'message' => 'Data gagal diupdate. ' .$validator->errors()->first(),
                'data' => $validator->errors()
            ]);
        }

        $mhs = MahasiswaModel::where('id','=',$id)->first();
        if($foto){
            if($mhs->foto && file_exists(storage_path('app/public/'.$mhs->foto))){
                \Storage::delete('public/'.$mhs->foto);
            }
            $image_name = $foto->store('images', 'public');
            $data['foto'] = $image_name;
        }


        $mhs->update($data);
        return response()->json([
            'status' => ($mhs),
            'modal_close' => false,
            'message' => ($mhs)? 'Data berhasil diupdate' : 'Data gagal diupdate',
            'data' => null
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MahasiswaModel  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = MahasiswaModel::where('id','=',$id)->first();
        if($data->foto && file_exists(storage_path('app/public/'.$data->foto))){
            \Storage::delete('public/'.$data->foto);
        }
        $data->delete();
        return response()->json([
            'status' => ($data),
            'modal_close' => false,
            'message' => ($data)? 'Data berhasil dihapus' : 'Data gagal dihapus',
            'data' => null
        ]);
    }

    public function cetak_khs($id)
    {
        $data = MahasiswaModel::find($id);
        $khs = MatkulMahasiswaModel::where('mahasiswa_id',$id)->get();
        $pdf = PDF::loadView('pertemuan7.mahasiswa.mahasiswa_pdf',compact('data','khs'));
        return $pdf->stream();
    }
}
