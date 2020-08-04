@extends('layouts.admin')

@section('konten')
<div class="container-fluid p-4">
    <h3>Edit Produk</h3>

    <div class="mb-3">
        <a href="{{ url('admin/produk') }}">Kembali</a>
    </div>

    <div class="col-md-6">
        @foreach ($produk as $p)
        <form action="/admin/produk/update-produk/{{$p->id}}k" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
           
            <div class="form-group">
                <label for="nama_produk">Nama Produk</label>
                 @foreach ($produk as $p)
                <input type="text" name="nama_produk" required="required" class="form-control"
                    placeholder="Nama Produk" value="{{$p->nama_produk}}">
                      @endforeach
            </div>
          
            <div class="form-group">
                <label for="kategori">Kategori</label>
                <select class="form-control" id="" name="kategori_id">
                    <option selected disabled>Pilih Kategori
                    </option>
                    @foreach ($kategori_produk as $k)
                    <option value="{{$k->id}}">{{ $k->nama_kategori }}</option>
                    @endforeach
                </select>
            </div>

          <div class="form-group">
                <label for="merek">Merek</label>
                <select class="form-control" id="" name="merek_id">
                    <option selected disabled>Pilih Merek
                    </option>
                    @foreach ($merek_produk as $m)
                    <option value="{{$m->id}}">{{ $m->nama_merek }}</option>
                    @endforeach
                </select>
            </div>
           
            <div class="form-group">
                <label for="harga_produk">Harga Produk</label>
                @foreach ($produk as $p)
                <input type="number" name="harga_produk" required="required" class="form-control" value="{{$p->harga_produk}}">
                  @endforeach
            </div>
           

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
         @endforeach
    </div>
</div>
@endsection