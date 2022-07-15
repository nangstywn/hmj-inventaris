@extends('layouts.cool')
@section('content')
@section('title', 'Tambah Peminjaman')
<div class="container product_section_container" style="padding: 30px;">
    <div class="row">
        <div class="col-md-12">
            <form action="{{route('peminjam.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="tanggal_pinjam">Tanggal Pinjam</label>
                    <input type="" name="tgl_pinjam" class="form-control" value="{{ date('Y/m/d',time()) }}" readonly>
                </div>
                <div class="form-group">
                    Apakah Anda Yakin Untuk Melanjutkan ??
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
                <a href="{{url()->previous()}}" class="btn btn-danger">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection