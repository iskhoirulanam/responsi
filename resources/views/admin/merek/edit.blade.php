@extends('layouts.admin')

@section('konten')
<div class="container-fluid p-4">
    @if(session('sukses'))
    <div class="alert alert-success">
        {{session('sukses')}}
    </div>
    @endif
    <h3>Edit Merek</h3>

    <div class="mb-3">
        <a href="{{ url('admin/merek') }}">Kembali</a>
    </div>

    <div class="col-md-6">
        @foreach($merek_produk as $m)
        <form action="/admin/merek/update-merek/{{$m->id}}" method="POST">
            {{csrf_field()}}
            <div class="form-group">
                <label for="nama_merek">MerekProduk</label>
                <input type="text" name="nama_merek" class="form-control" placeholder="Nama Merek"
                    value="{{$m->nama_merek}}">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        @endforeach
    </div>
</div>
@endsection