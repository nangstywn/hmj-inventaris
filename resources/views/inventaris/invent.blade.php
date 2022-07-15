<style>
.col-md-12 p {
    font-size: 30px;
    font-weight: bold;
    position: relative;
    top: 50%;
    transform: translateY(-50%);
    margin-left: 60px;
}
</style>
@extends('layouts.cool')
@section('content')
@section('title', 'Daftar Barang')
<div class="container product_section_container" style="padding: 30px;">
    <div class="row" style="margin-bottom: 30px;">
        @if(auth()->user()->level!='user')
        <div class="col-md-12">
            <a href="#" data-toggle="modal" data-target="#modalTambah" class="btn btn-success tambah">
                <i class="fa fa-plus"></i>
                Tambahkan Barang
            </a>
        </div>
        @elseif(auth()->user()->level=='user')
        @if(url()->current() == route('ti.index'))
        <div class="col-md-12">
            <img src="{{URL::asset('assets/images/hmjti.png')}}" width="60px"
                style="float:left; margin-right:10  px;" />
            <p>Inventaris HMJ Teknik Informatika</p>
        </div>
        @elseif(url()->current() == route('si.index'))
        <div class="col-md-12">
            <img src="{{URL::asset('assets/images/si.png')}}" width="50px" style="float:left" />
            <p>Inventaris HMJ Sistem Informasi</p>
        </div>
        @elseif(url()->current() == route('tk.index'))
        <div class="col-md-12">
            <img src="{{URL::asset('assets/images/tk.png')}}" width="50px" style="float:left" />
            <p>Inventaris HMJ Teknik Komputer</p>
        </div>
        @elseif(url()->current() == route('mi.index'))
        <div class="col-md-12">
            <img src="{{URL::asset('assets/images/mi.png')}}" width="50px" style="float:left" />
            <p>Inventaris HMJ Manajemen Informatika</p>
        </div>
        @elseif(url()->current() == route('ka.index'))
        <div class="col-md-12">
            <img src="{{URL::asset('assets/images/ka.png')}}" width="50px" style="float:left" />
            <p>Inventaris HMJ Komputerisasi Akuntansi</p>
        </div>
        @endif
        @endif
    </div>
    <div class="row">
        <div class="col-md-12">
            @if($inventory->isEmpty())
            <div class="alert alert-danger">
                <strong>Maaf !</strong> Tidak Ada Inventaris Ditemukan.
            </div>
            @else
            <table class="table table-hover text-dark" id="datatable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Satuan</th>
                        <th>Jumlah</th>
                        <th>Kondisi</th>
                        <th>Kategori</th>
                        @if(auth()->user()->level!='user')
                        <th>Action</th>
                        @endif

                    </tr>
                </thead>
                <tbody>
                    @php $i = 1; @endphp
                    @foreach($inventory as $inventaris)
                    <tr>
                        <td>{{$inventory ->perPage()*($inventory->currentPage()-1)+$i}}</td>

                        <td>{{ ucfirst($inventaris->nama) }}</td>
                        <td>{{ ucfirst($inventaris->satuan) }}</td>
                        <td>{{ $inventaris->jumlah }}</td>
                        @if($inventaris->kondisi == 'Baik')
                        <td><button class="btn btn-success btn-sm"
                                style="border-radius:50px; pointer-events: none">{{ $inventaris->kondisi }}</button>
                        </td>
                        @elseif($inventaris->kondisi == 'Kurang Baik')
                        <td><button class="btn btn-warning btn-sm text-white"
                                style="border-radius:50px; pointer-events: none">{{ $inventaris->kondisi }}</button>
                        </td>

                        @elseif($inventaris->kondisi == 'Rusak')
                        <td><button class="btn btn-danger btn-sm"
                                style="border-radius:50px; pointer-events: none">{{ $inventaris->kondisi }}</button>
                        </td>
                        @endif
                        <td>{{ $inventaris->kategori->nama_kategori }}</td>
                        @if(Auth::user()->level!='user')
                        <td>

                            <form class="btn-group" action="{{route('admin-inventory.destroy', $inventaris->id)}}"
                                data-id="{{$inventaris->id}}" method="POST">

                                <a href="#" data-toggle="modal" data-target="#modalLihat{{$inventaris->id}}"
                                    class="btn btn-success lihat"><i class="fa fa-eye"></i></a>
                                <a href="#" data-toggle="modal" data-target="#modalEdit{{$inventaris->id}}"
                                    class="btn btn-warning edit"><i class="fa fa-edit"></i></a>
                                @csrf
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger delete"
                                    data-nama="{{ ucfirst($inventaris->nama) }}" value="Delete"><i
                                        class="fa fa-trash"></i></button>
                            </form>
                        </td>
                        @endif
                    </tr>
                    @php $i++; @endphp
                    @endforeach
                    @endif
                </tbody>
            </table>
            <div class="row">
                <div class="col-md-12">
                </div>
            </div>
        </div>
    </div>
</div>
@foreach($inventory as $data)
@include('inventaris.invent-edit')
@include('inventaris.invent-show')
@endforeach
@include('inventaris.invent-create')
<script>
$(document).ready(function() {
    $('#datatable').DataTable({
        columnDefs: [{
            targets: [0, ],
            visible: true,
            searchable: false,
            orderable: false,
        }],
        pageLength: 5,
        lengthMenu: [
            [5, 10, 25, 50, -1],
            [5, 10, 25, 50, 'All']
        ],
    });
});
$('.myModal').on('hidden.bs.modal', function() {
    $('.header-desktop').css('zIndex', '2');
})
$('.edit,.tambah,.lihat').click(function() {
    $('.header-desktop').css('zIndex', '1');
})
$('.delete').click(function(e) {
    let form = $(this).closest("form");
    let name = $(this).attr("name");
    let nama = $(this).attr("data-nama");
    e.preventDefault();
    Swal.fire({
        title: 'Yakin ?',
        text: "Ingin menghapus " + nama + "",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Tidaaak!!',
        confirmButtonText: 'Ya, hapus aja!!'
    }).then((result) => {
        if (result.isConfirmed) {
            form.submit();
        }
    })
});
</script>
@endsection