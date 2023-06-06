<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Models\Fakultas;
use Illuminate\Support\Facades\DB;
use PDF;

class MahasiswaController extends Controller
{
    public function cari(Request $request)
	{
		$cari = $request->cari;
        
		$mhs = Mahasiswa::where('nama','like',"%".$cari."%")->paginate(10);
		return view('mhs.index',['mahasiswa' => $mhs]);
 
	}
    
    public function index()
    {
        $mhs = Mahasiswa::paginate(10);
        // print_r($mhs);
        return view('mhs.index', [
            'mahasiswa' => $mhs
        ]);
    }

    public function indexTambah()
    {
        $fakultas = Fakultas::all();
        return view('mhs.tambah',[
            'fakultas' => $fakultas,
        ]);
    }

    public function getProdi()
    {
        $data = Fakultas::find(request()->id);
        $prodi = $data->ProgramStudi;
        return response()->json($prodi);
    }

    public function store(Request $request)
    {
        Mahasiswa::create([
            'nama' => $request->nama,
            'nim' => $request->nim,
            'alamat' => $request->alamat,
            'jenis_kelamin'=> $request->jenis_kelamin,
            'fakultas_id'=> $request->fakultas_id,
            'program_studi_id'=> $request->program_studi_id
        ]);

        return redirect(route('mahasiswa.index'));
    }

    public function edit($id)
    {
        $mhsedit = Mahasiswa::where('id', $id)->first();
        return view('mhs.edit', [
            'mhs' => $mhsedit
        ]);
    }

    public function update(Request $request)
    {
        Mahasiswa::where('id', $request->id)->update([
            'nama' => $request->nama,
            'nim' => $request->nim,
            'alamat' => $request->alamat
        ]);

        return redirect(route('mahasiswa.index'));
    }

    public function delete($id)
    {
        $data = Mahasiswa::where('id', $id)->first();
        $data->delete();
        return redirect(route('mahasiswa.index'));
    }

    public function chart()
    {
        $mahasiswaData = Mahasiswa::select(DB::raw("COUNT(*) as count"))
        ->whereYear('created_at', date('Y'))
        ->groupBy(DB::raw("Month(created_at)"))
        ->pluck('count');


        return view('chart', compact('mahasiswaData'));
    }

    public function cetak_pdf()
    {
    	$mahasiswa = Mahasiswa::all();
 
    	$pdf = PDF::loadview('mahasiswa_pdf',['mahasiswa'=>$mahasiswa]);
    	return $pdf->stream('laporan-mahasiswa-pdf');
    }
}
