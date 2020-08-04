<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use App\Produk;
use App\Kategori;
use App\Merek;
use App\User;
use Illuminate\Support\Facades\DB;
class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $admin = User::where('id', Auth::user()->id)->where('is_admin', 1)->first();
        // $operator = User::where('id', Auth::user()->id)->where('is_admin', 0)->first();
        // if(!$admin) {
        //     return view('layouts.forbidden', compact('admin', 'operator'));
        // }
      $produk = Produk::paginate(10);
    return view('admin/produk/index', compact('produk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function tambah()
    {
        $kategori_produk = Kategori::select('id', 'nama_kategori')->get();
        $merek_produk = Merek::select('id', 'nama_merek')->get();
        return view('admin.produk.tambah',  compact('kategori_produk', 'merek_produk'));
    }

    public function insert(Request $request)
    {
        $this->validate($request, [
            'nama_produk'=> 'required',
            'kategori_id'=> 'required',
            'merek_id'=> 'required',
            'harga_produk'=> 'required',
        ]);
     
     
        Produk::create([
            'nama_produk' => $request->nama_produk,
            'kategori_id'=> $request->kategori_id,
            'merek_id'=> $request->merek_id,
            'harga_produk'=> $request->harga_produk,
        ]);
        return redirect('/admin/produk')->with('sukses', 'Data Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $produk = DB::table('produk')->where('id',$id)->get();
        $kategori_produk = Kategori::select('id', 'nama_kategori')->get();
        $merek_produk = Merek::select('id', 'nama_merek')->get();;
        return view('admin.produk.edit', compact('kategori_produk', 'merek_produk', 'produk'));
    }

    public function update(Request $request, $id)
    {
        $produk= Produk::find($id);
       $produk->update($request->all());
        return redirect('/admin/produk')->with('sukses', 'Data Berhasil Update');
    }

    public function hapus($id)
    {
        $produk = Produk::where('id',$id)->delete();
        return redirect('admin/produk')->with('sukses', 'Data Berhasil Dihapus');
    }
}
