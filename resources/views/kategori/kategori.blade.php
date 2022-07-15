@extends('layouts.cool')
@section('content')
@section('title', 'Daftar Kategori')
<div class="container product_section_container" style="padding: 30px;">
    <div class="row" style="margin-bottom: 30px;">
        <div class="col-md-12">
            <a href="#" data-toggle="modal" data-target="#modalTambah" class="btn btn-success tambah">
                <i class="fa fa-plus"></i>
                Tambahkan Kategori
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-hover text-dark" id="datatable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kategori</th>
                        <th>slug</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $i = 1; @endphp
                    @foreach($categories as $category)
                    <tr>
                        <td>{{ $categories ->perPage()*($categories->currentPage()-1)+$i }}</td>
                        <td>{{ $category->nama_kategori }}</td>
                        <td>{{ $category->slug }}</td>
                        <td>{{ $category->created_at }}</td>
                        <td>
                            <form class="btn-group" action="{{route('admin-category.destroy', $category->id)}}"
                                method="POST">
                                <a href="#" data-toggle="modal" data-target="#modalLihat{{$category->id}}"
                                    class="btn btn-success lihat"><i class="fa fa-eye"></i></a>
                                <a href="#" data-toggle="modal" data-target="#modalEdit--{{$category->id}}"
                                    class=" btn btn-warning edit"><i class="fa fa-edit"></i></a>
                                @csrf
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger delete"
                                    data-nama="{{$category->nama_kategori}}"><i class="fa fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @php $i++; @endphp
                    @endforeach
                </tbody>
            </table>
            <div class="row">
                <div class="col-md-12">
                    {!! $categories->links() !!}
                </div>
            </div>
        </div>
    </div>
    @foreach($categories as $data)
    @include('kategori.kategori-edit')
    @include('kategori.kategori-show')
    @endforeach
</div>
@include('kategori.kategori-create')
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
    $('.header-desktop').css('zIndex', '3');
})
$('.edit,.tambah,.lihat').click(function() {
    $('.header-desktop').css('zIndex', '1');
})
$('.delete').click(function(e) {
    let form = $(this).closest('form');
    let name = $(this).attr('name');
    let nama = $(this).attr('data-nama');
    e.preventDefault();
    Swal.fire({
        title: 'Yakin ?',
        text: "Ingin menghapus kategori " + nama + "",
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