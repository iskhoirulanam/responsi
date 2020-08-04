@extends('layouts.admin')

@section('konten')

<div class="container-fluid p-4">
    @if(session('sukses'))
    <div class="alert alert-success">
        {{session('sukses')}}
    </div>
    @endif
    <h3>List Produk</h3>
    <div class="mb-3">
        <a href="{{ url('admin/produk/tambah-produk') }}">+ Tambah Produk</a>
    </div>
    <table class="table table-bordered">
        <tr class="text-center">
            <th>No.</th>
            <th>Nama Produk</th>
            <th>Kategori</th>
            <th>Merek</th>
            <th>Harga Produk</th>
            <th>Aksi</th>
            
        </tr>

        @foreach ($produk as $p)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{$p->nama_produk }}</td>
            <td>{{$p->kategori->nama_kategori}}</td>
            <td>{{$p->merek->nama_merek}}</td>
            <td>Rp. {{ number_format($p->harga_produk) }}</td>
            
            <td class="text-center">
                <a href="/admin/produk/edit-produk/{{$p->id}}" class="fas fa-edit text-success mr-3"></a>
                <a href="/admin/produk/hapus-produk/{{$p->id}}" class="fas fa-trash text-danger"
                    onclick="return confirm('Hapus Produk?');"></a>
            </td>
        </tr>
        @endforeach
    </table>
    <br />
   
</div>
@endsection