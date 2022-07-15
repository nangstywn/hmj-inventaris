@extends('layouts.cool')
@section('content')
@section('title', 'Tambah Peminjaman')
<div class="container product_section_container" style="padding: 30px;">
    <div class="row">
        <div class="col-md-12">
            <form action="{{route('transaksi.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="tanggal_pinjam">Tanggal Pinjam</label>
                    <input type="date" name="tgl_pinjam" class="form-control" value="{{ date('Y-m-d',time()) }}"
                        readonly>
                </div>
                <div class="form-group">
                    <label for="kategori">Kategori</label>
                    <select name="id_kategori" id="id_kategori_ajax" class="form-control">
                        <option value="0">
                            Pilih Kategori
                        </option>
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->nama_kategori}}
                        </option>
                        @endforeach
                    </select>
                </div>
                <input type="hidden" name="id_peminjaman" id="id_peminjaman" value="{{$peminjaman->id}}"
                    class="form-control">
                <div class="form-group">
                    <div class="label">Jenis Barang</div>
                    <select name="id_inventaris" id="id_inventaris_ajax" class="form-control" disabled="disabled">
                        <option value="0">Pilih Inventaris</option>
                    </select>
                </div>
                <div class=" form-group">
                    <label for="jumlah">Jumlah</label>
                    <div id="jumlahInvent"></div>
                    <input type="number" disabled id="jumlah" name="jumlah" class="form-control">
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button type="submit" dusk="btn-save" class="btn btn-success">
                            <i class="fa fa-btn fa-save text"></i> Tambah Barang
                        </button>
                        <a href="{{url()->previous()}}" class="btn btn-danger">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection