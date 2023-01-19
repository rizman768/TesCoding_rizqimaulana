<?php

namespace App\Http\Controllers;
use App\Models\Tiket;

use Illuminate\Http\Request;

class TiketController extends Controller
{
    public function dashboard(){
        return view('tiket.dashboard');
    }

    public function tiket(){
        $tiket = Tiket::first();
        return view('tiket.tiket', compact('tiket'));
    }


    public function pendaftaran(Request $request){
        $request->validate([
            'nama' => 'required',
            'hp' => 'required'
        ],
        [
            'nama.required' => 'Nama Lengkap Harus Diisi',
            'hp.required' => 'No Hp Harus Diisi',    
        ]);
        
        Tiket::create([
            'nama' => $request->nama,
            'hp' => $request->hp,
        ]);

        return redirect('tiket');
    }

    public function admin(){
        $tiket = Tiket::all();
        return view('tiket.module_admin.admin', compact('tiket'));
    }

    public function edit_tiket($id){
        $tiket = Tiket::where('id', $id)->first();
        return view('tiket.module_admin.edit_tiket', compact('tiket'));
    }

    public function update_tiket(Request $request)
    {        
        $request->validate([
            'nama' => 'required',
            'hp' => 'required',
        ],
        [
            'nama.required' => 'Kolom Tidak Bolek Kosong',
            'hp.required' => 'Kolom Tidak Boleh Kosong',  
        ]);

        $tiket = Tiket::where('id', $request->id)->update([
            'nama' => $request->nama,
            'hp' => $request->hp,
        ]);
           
        return redirect('admin')->with('success','Berhasil Terupdate');
    }

    public function delete($id)
    {
        $tiket = Tiket::where('id', $id)->delete();

        return redirect('admin')->with('success','Tiket telah Terhapus');
    }


    public function check_in(){
        return view('tiket.module_checkin.cari_tiket');
    }

    public function cekin(Request $request){
        $tiket = Tiket::where('id', $request->id)->update([
            'status' => $request->status
        ]);
           
        return redirect('check-in');
    }

    public function search(Request $request){
        $cari = $request->cari;
        $tiket = Tiket::where('id', 'like', "%".$request->cari."%")->paginate();

        // mengambil data terakhir dan pagination 10 list
        return view('tiket.module_checkin.tampil_tiket', compact('tiket'))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    public function laporan(){
        $tiket = Tiket::all();
        return view('tiket.modul_laporan', compact('tiket'));
    }
}
