@extends('layouts.admin')
@section('konten')

<div class="container-fluid p-4">
    @if(session('sukses'))
    <div class="alert alert-success">
        {{session('sukses')}}
    </div>
    @endif
    <h3>List Merek</h3>
    <div class="mb-3">
        <a href="{{ url('admin/merek/tambah-merek') }}">+ Tambah Merek</a>
    </div>
    <table class="table table-bordered">
        <tr class="text-center">
            <th>No.</th>
            <th>merekProduk</th>
            <th>Aksi</th>
        </tr>
        @foreach ($merek_produk as $m)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $m->nama_merek }}</td>
            <td class="text-center">
                <a href="/admin/merek/edit-merek/{{$m->id}}" class="fas fa-edit text-success"></a>
                <a href="/admin/merek/hapus-merek/{{$m->id}}" class="fas fa-trash text-danger"
                    onclick="return confirm('Hapus Merek?');"></a>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection