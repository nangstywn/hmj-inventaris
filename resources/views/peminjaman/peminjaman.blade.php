@extends('layouts.cool')
@section('content')
@section('title', 'Daftar Barang')
<div class="container product_section_container" style="padding: 30px;">
    <div class="row" style="margin-bottom: 30px;">
        <div class="col-sm-12 col-md-3">
            @if(auth()->user()->level=='user')
            <a href="{{route('peminjam.create')}}" class="btn btn-success">
                <i class="fa fa-plus"></i>
                Tambah Peminjaman
            </a>
            @endif
        </div>
        <div class="col-sm-12 col-md-3">
        </div>
        <div class="col-sm-12 col-md-3">
        </div>

    </div>
    <div class="row">
        <div class="col-md-12">
            @if($detail->isEmpty())
            <div class="alert alert-danger">
                <strong>Maaf !</strong> Tidak Ada Peminjaman Ditemukan.
            </div>
            @else
            <table class="table table-hover text-dark" id="datatable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Jumlah </th>
                        <th>Tgl Pinjam</th>
                        <th>Tgl Kembali</th>
                        <th>Status Pinjam</th>
                        <th>Peminjam</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $i = 1; @endphp
                    @foreach($detail as $details)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <!--$detail->perPage()*($detail->currentPage()-1)+$i-->
                        <td>{{ ucfirst($details->inventaris->nama) }}</td>
                        <td>{{ ($details->jumlah)}}</td>
                        <td>{{ $details->peminjaman->tgl_pinjam }}</td>
                        <td>@if($details->peminjaman->status_pinjam == 'Menunggu' ||
                            $details->peminjaman->status_pinjam == 'Dipinjam' ||
                            $details->peminjaman->status_pinjam == 'Bermasalah') Belum Dikembalikan
                            @elseif($details->peminjaman->status_pinjam == 'Dikembalikan') Menunggu Konfirmasi
                            @elseif($details->peminjaman->status_pinjam == 'Ditolak') Batal Dipinjam @else
                            {{ $details->peminjaman->tgl_kembali }} @endif </td>
                        @if($details->peminjaman->status_pinjam == 'Selesai')
                        <td><button class="btn btn-success btn-sm"
                                style="border-radius:50px; pointer-events: none">{{ $details->peminjaman->status_pinjam }}</button>
                        </td>
                        @elseif($details->peminjaman->status_pinjam == 'Menunggu')
                        <td><button class="btn btn-secondary btn-sm text-white"
                                style="border-radius:50px; pointer-events: none">{{ $details->peminjaman->status_pinjam }}</button>
                        </td>

                        @elseif($details->peminjaman->status_pinjam == 'Ditolak')
                        <td><button class="btn btn-danger btn-sm"
                                style="border-radius:50px; pointer-events: none">{{ $details->peminjaman->status_pinjam }}</button>
                        </td>
                        @elseif($details->peminjaman->status_pinjam == 'Dikembalikan')
                        <td><button class="btn btn-primary btn-sm"
                                style="border-radius:50px; pointer-events: none">{{ $details->peminjaman->status_pinjam }}</button>
                        </td>
                        @elseif($details->peminjaman->status_pinjam == 'Dipinjam')
                        <td><button class="btn btn-warning btn-sm text-white"
                                style="border-radius:50px; pointer-events: none">{{ $details->peminjaman->status_pinjam }}</button>
                        </td>
                        @elseif($details->peminjaman->status_pinjam == 'Bermasalah')
                        <td><button class="btn btn-dark btn-sm text-white"
                                style="border-radius:50px; pointer-events: none">{{ $details->peminjaman->status_pinjam }}</button>
                        </td>
                        @endif
                        <td>{{ $details->peminjaman->user->name }}</td>
                        @if(auth()->user()->level!='user')
                        <td>
                            @if($details->peminjaman->status_pinjam == 'Menunggu')
                            <a href="{{ route('peminjam.acceptPinjam',$details->peminjaman->id) }}"
                                class="btn btn-success"><i class="fa fa-check"></i> Terima</a>
                            <a href="{{ route('peminjam.tolakPinjam',$details->peminjaman->id) }}"
                                class="btn btn-danger"><i class="fa fa-times"></i> Tolak</a>
                            @elseif($details->peminjaman->status_pinjam == 'Dikembalikan')
                            <a href="{{ route('peminjam.kembali',$details->peminjaman->id) }}"
                                class="btn btn-success"><i class="fa fa-check"></i> Terima</a>
                            <a href="{{ route('peminjam.tolakKembali',$details->peminjaman->id) }}"
                                class="btn btn-danger"><i class="fa fa-times"></i> Tolak</a>
                            @endif
                        </td>
                        @endif
                        @if(auth()->user()->level=='user')
                        <td>
                            <!--div class="btn-group-sm"-->
                            @if($details->peminjaman->status_pinjam == 'Dipinjam')
                            <a href="{{ route('peminjam.requestKembali', $details->peminjaman->id) }}"
                                class="btn btn-primary btn-sm"><i class="fa fa-check"></i> Kembalikan</a>
                            @endif
                            <form class="btn-group" action="{{ route('peminjam.destroy',[$details->peminjaman->id]) }}"
                                method="post">
                                <a href="" class="btn btn-warning btn-sm"><i class="fa fa-eyedropper"></i></a>
                                @method("delete")
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                            </form>

                        </td>
                        @endif
                    </tr>

                    @endforeach
                    @php $i++; @endphp
                    @endif
                </tbody>
            </table>
            <div class="row">
                <div class="col-md-12">
                    <!--!! $detail->links-->
                </div>
            </div>
        </div>
    </div>
</div>
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
</script>

@endsection