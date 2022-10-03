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
            $data = Pertelaan::select('*');
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
        if ($request->hasFile('scan_imb')) {
            if (Storage::exists('public/scan_imb/'.$request->emp_scan_imb)) {
                // dd('exist');
                Storage::delete('public/scan_imb/'.$request->emp_scan_imb);
            }
            $image = $request->file('scan_imb');
            // $destinationPath = 'public/scan_imb/';
            $fileName = date('YmdHis') . "." . $image->getClientOriginalExtension();
            // $image->move($destinationPath, $profileImage);
            $image->storeAs('public/scan_imb', $fileName);
            // dd($image);
            // $filename = "$profileImage";
        }else {
            $fileName = $request->emp_scan_imb;
        }

        if ($request->hasFile('scan_gambar_imb')) {
            if (Storage::exists('public/scan_gambar_imb/'.$request->emp_scan_gambar_imb)) {
                Storage::delete('public/scan_gambar_imb/'.$request->emp_scan_gambar_imb);
            }
            $image1 = $request->file('scan_gambar_imb');
            $fileName1 = date('YmdHis') . "." . $image1->getClientOriginalExtension();
            $image1->storeAs('public/scan_gambar_imb', $fileName1);
        }else {
            $fileName1 = $request->emp_scan_gambar_imb;
        }

        if ($request->hasFile('scan_zoning')) {
            if (Storage::exists('public/scan_zoning/'.$request->emp_scan_zoning)) {
                // dd('exist');
                Storage::delete('public/scan_zoning/'.$request->emp_scan_zoning);
            }
            $image2 = $request->file('scan_zoning');
            // $destinationPath = 'public/scan_imb/';
            $fileName2 = date('YmdHis') . "." . $image2->getClientOriginalExtension();
            // $image->move($destinationPath, $profileImage);
            $image2->storeAs('public/scan_zoning', $fileName2);
        }else {
            $fileName2 = $request->emp_scan_zoning;
        }

        Pertelaan::updateOrCreate([
        // Product::update([
            'gid' => $request->gid
        ],
        [
            'provider' => $request->provider,
            'tipe_tower' => $request->tipe_tower,
            'tinggi_tower' => $request->tinggi_tower,
            'sk_imb' => $request->sk_imb,
            'alamat_pemohon' => $request->alamat_pemohon,
            'alamat_tower' => $request->alamat_tower,
            'kelurahan' => $request->kelurahan,
            'kecamatan' => $request->kecamatan,
            'scan_imb' => $fileName,
            'scan_gambar_imb' => $fileName1,
            'scan_zoning' => $fileName2,
            'jenis_data' => $request->jenis_data,
        ]);        

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
}
