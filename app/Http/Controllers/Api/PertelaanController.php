<?php

namespace App\Http\Controllers\Api;

use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Pertelaan;
use DataTables;
use Storage;
use File;

class PertelaanController extends Controller
{
    public function json(Request $request){
        if ($request->ajax()) {
            $data = Pertelaan::select('*')->limit(10000);
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($data){
                        // $gid = $data->gid;
                        // dd($gid);
                        $view = route('show', $data);
                        $btn = '<input type="hidden" name="gid" id="gid" value="'.$data->gid.'">';
                        $btn = $btn . '<a href="'.$view.'" target="_blank" data-gid="'.$data->gid.'" class="edit btn btn-info btn-sm mr-2 mb-2">
                        View
                        </a>';
                        $btn = $btn . '<a href="javascript:void(0)" onclick="edit_json('.$data->gid.')" data-gid="'.$data->gid.'" data-toggle="modal" data-target="#modal-lg" class="edit btn btn-primary btn-sm mr-2 mb-2">
                        Update
                        </a>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('home1');
    }
    public function show_json($gid)
    {
        $aspects = Pertelaan::find($gid);
        // dd($aspects);
        return response()->json($aspects);
    }
    public function store_json(Request $request)
    {
        // $data = Tower::find($request->gid);
        // dd($request->scan_imb);
        // dd($data);
        // dd($request->hasFile('scan_imb'));
        if ($request->hasFile('file_sk_pertelaan')) {
            if (Storage::exists('public/file_sk_pertelaan/'.$request->emp_file_sk_pertelaan)) {
                Storage::delete('public/file_sk_pertelaan/'.$request->emp_file_sk_pertelaan);
            }
            $image = $request->file('file_sk_pertelaan');
            $fileName = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->storeAs('public/file_sk_pertelaan', $fileName);
        }else {
            $fileName = $request->emp_file_sk_pertelaan;
        }
        if ($request->hasFile('file_perstek')) {
            if (Storage::exists('public/file_perstek/'.$request->emp_file_perstek)) {
                Storage::delete('public/file_perstek/'.$request->emp_file_perstek);
            }
            $image2 = $request->file('file_perstek');
            $fileName2 = date('YmdHis') . "." . $image2->getClientOriginalExtension();
            $image2->storeAs('public/file_perstek', $fileName2);
        }else {
            $fileName2 = $request->emp_file_perstek;
        }
        if ($request->hasFile('file_gambar_pertelaan')) {
            if (Storage::exists('public/file_gambar_pertelaan/'.$request->emp_file_gambar_pertelaan)) {
                Storage::delete('public/file_gambar_pertelaan/'.$request->emp_file_gambar_pertelaan);
            }
            $image3 = $request->file('file_gambar_pertelaan');
            $fileName3 = date('YmdHis') . "." . $image3->getClientOriginalExtension();
            $image3->storeAs('public/file_gambar_pertelaan', $fileName3);
        }else {
            $fileName3 = $request->emp_file_gambar_pertelaan;
        }
        if ($request->hasFile('file_gambar_as_build')) {
            if (Storage::exists('public/file_gambar_as_build/'.$request->emp_file_gambar_as_build)) {
                Storage::delete('public/file_gambar_as_build/'.$request->emp_file_gambar_as_build);
            }
            $image4 = $request->file('file_gambar_as_build');
            $fileName4 = date('YmdHis') . "." . $image4->getClientOriginalExtension();
            $image4->storeAs('public/file_gambar_as_build', $fileName4);
        }else {
            $fileName4 = $request->emp_file_gambar_as_build;
        }

        if (Pertelaan::where('gid', $request->gid)->exists()) {
            $pertelaan = Pertelaan::findOrFail($request->gid);
            $pertelaan->no_sk_pertelaan = $request->no_sk_pertelaan;
            $pertelaan->tgl_pertelaan = $request->tgl_pertelaan;
            $pertelaan->jenis_pertelaan = $request->jenis_pertelaan;
            $pertelaan->nama_bangunan = $request->nama_bangunan;
            $pertelaan->no_persetujuan_teknis = $request->no_persetujuan_teknis;
            $pertelaan->tgl_persetujuan_teknis = $request->tgl_persetujuan_teknis;
            $pertelaan->nama_pemohon_pertelaan = $request->nama_pemohon_pertelaan;
            $pertelaan->permohonan_bangunan_pertelaan = $request->permohonan_bangunan_pertelaan;
            $pertelaan->kelurahan = $request->kelurahan;
            $pertelaan->kecamatan = $request->kecamatan;
            $pertelaan->no_imb = $request->no_imb;
            $pertelaan->tgl_imb = $request->tgl_imb;
            $pertelaan->atas_nama = $request->atas_nama;
            $pertelaan->nama_pemohon_imb = $request->nama_pemohon_imb;
            $pertelaan->alamat_persil_imb = $request->alamat_persil_imb;
            $pertelaan->penggunaan_bangunan = $request->penggunaan_bangunan;
            $pertelaan->luas_bangunan = $request->luas_bangunan;
            $pertelaan->jumlah_lantai = $request->jumlah_lantai;
            $pertelaan->file_sk_pertelaan = $fileName;
            $pertelaan->file_perstek = $fileName2;
            $pertelaan->file_gambar_pertelaan = $fileName3;
            $pertelaan->file_gambar_as_build = $fileName4;
            $pertelaan->save();
        }else {
            Pertelaan::create([
            'gid' => Helper::IDGenerator(new Pertelaan,'gid',5),
            'no_sk_pertelaan' => $request->no_sk_pertelaan,
            'tgl_pertelaan' => $request->tgl_pertelaan,
            'jenis_pertelaan' => $request->jenis_pertelaan,
            'nama_bangunan' => $request->nama_bangunan,
            'no_persetujuan_teknis' => $request->no_persetujuan_teknis,
            'tgl_persetujuan_teknis' => $request->tgl_persetujuan_teknis,
            'nama_pemohon_pertelaan' => $request->nama_pemohon_pertelaan,
            'permohonan_bangunan_pertelaan' => $request->permohonan_bangunan_pertelaan,
            'kelurahan' => $request->kelurahan,
            'kecamatan' => $request->kecamatan,
            'no_imb' => $request->no_imb,
            'tgl_imb' => $request->tgl_imb,
            'atas_nama' => $request->atas_nama,
            'nama_pemohon_imb' => $request->nama_pemohon_imb,
            'alamat_persil_imb' => $request->alamat_persil_imb,
            'penggunaan_bangunan' => $request->penggunaan_bangunan,
            'luas_bangunan' => $request->luas_bangunan,
            'jumlah_lantai' => $request->jumlah_lantai,
            'file_sk_pertelaan' => $fileName,
            'file_perstek' => $fileName2,
            'file_gambar_pertelaan' => $fileName3,
            'file_gambar_as_build' => $fileName4,
            ]);
        }
        return response()->json(['success'=>'Data Tower saved successfully.']);
    }
    public function delete_json($gid)
    {
        $data = Pertelaan::find($gid);
        // \File::delete('public/scan_imb/'.$data->scan_imb);
        // dd($data->scan_imb);
        if (Storage::exists('public/scan_imb/'.$data->scan_imb)) {
            // dd('exist');
            Storage::delete('public/scan_imb/'.$data->scan_imb);
        }
        // else {
        //     dd('not exist');
        // }
        // Storage::delete('public/scan_imb/'.$data->scan_imb);
        // dd(File::delete(public_path('scan_imb/'.$data->scan_imb)));
        Tabg::find($gid)->delete();
        return response()->json(['success'=>'Data Tower deleted successfully.']);
    }
    public function search_json(Request $request){
        // dd($request->all());
        if ($request->ajax()) {
            // dd($request->kolom);
            $data = Pertelaan::select('*')->limit(10000);
            if ($request->kolom != '' && $request->nilai != '') {
                // dd($data->where("'$request->kolom'" == 1));
                // $data = $data->where($request->kolom, $request->nilai);
                $data = $data->where($request->kolom, 'LIKE', '%' . $request->nilai . '%');
                $count = $data->count();
                // dd($count);
            }
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($data){
                        // $gid = $data->gid;
                        // dd($gid);
                        $view = route('show', $data);
                        $btn = '<input type="hidden" name="gid" id="gid" value="'.$data->gid.'">';
                        $btn = $btn . '<a href="'.$view.'" target="_blank" onclick="show_json('.$data->gid.')" data-gid="'.$data->gid.'" class="edit btn btn-info btn-sm mr-2 mb-2">
                        View
                        </a>';
                        $btn = $btn . '<a href="javascript:void(0)" onclick="edit_json('.$data->gid.')" data-gid="'.$data->gid.'" data-toggle="modal" data-target="#modal-lg" class="edit btn btn-primary btn-sm mr-2 mb-2">
                        Update
                        </a>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        // return view('home2');
        return response()->json(['success'=>'Data Ditemukan.']);
    }
}
