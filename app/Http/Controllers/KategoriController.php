<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Kategori;
use App\User;

class KategoriController extends Controller
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
            return view('layouts.forbidden', compact('admin', 'operator'))->with('gagak', 'Data tidak dapat diakses');
        }
      
       $kategori_produk = Kategori::all();
        return view('admin.kategori.index', compact('kategori_produk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function tambah()
    {
        return view('admin.kategori.tambah');
    }

    public function insert(Request $request)
    {
        $this->validate($request, [
            'nama_kategori'=> 'required',
        ]);
     
     
        Kategori::create([
            'nama_kategori' => $request->nama_kategori
        ]);
        return redirect('/admin/kategori')->with('sukses', 'Data Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $kategori_produk = DB::table('kategori')->where('id',$id)->get();
        return view('admin.kategori.edit', compact('kategori_produk'));
    }

    public function update(Request $request, $id)
    {
        $kategori_produk= Kategori::find($id);
        $kategori_produk->nama_kategori = $request->nama_kategori;
        $kategori_produk->update();
        return redirect('/admin/kategori')->with('sukses', 'Data Berhasil Update');
    }

    public function hapus($id)
    {
        $kategori_produk = Kategori::where('id',$id)->delete();
        return redirect('admin/kategori')->with('sukses', 'Data Berhasil Dihapus');
    }
}
