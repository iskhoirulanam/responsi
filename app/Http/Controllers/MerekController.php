<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Merek;
use App\User;

class MerekController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin = User::where('id', Auth::user()->id)->where('is_admin', 1)->first();
        $operator = User::where('id', Auth::user()->id)->where('is_admin', 0)->first();
        if(!$admin) {
            return view('layouts.forbidden', compact('admin', 'operator'));
        }
       $merek_produk = Merek::all();
        return view('admin.merek.index', compact('merek_produk', 'admin'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function tambah()
    {
        return view('admin.merek.tambah');
    }

    public function insert(Request $request)
    {
        $this->validate($request, [
            'nama_merek'=> 'required',
        ]);
     
     
        Merek::create([
            'nama_merek' => $request->nama_merek
        ]);
        return redirect('/admin/merek')->with('sukses', 'Data Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $merek_produk = DB::table('merek')->where('id',$id)->get();
        return view('admin.merek.edit', compact('merek_produk'));
    }

    public function update(Request $request, $id)
    {
        $merek_produk= Merek::find($id);
        $merek_produk->nama_merek = $request->nama_merek;
        $merek_produk->update();
        return redirect('/admin/merek')->with('sukses', 'Data Berhasil Update');
    }

    public function hapus($id)
    {
        $merek_produk = Merek::where('id',$id)->delete();
        return redirect('admin/merek')->with('sukses', 'Data Berhasil Dihapus');
    }
}
