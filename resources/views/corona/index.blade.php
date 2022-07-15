@extends('layouts.cool')
@section('content')
@section('title', 'Corona')
<div class="container product_section_container" style="padding: 30px;">
    <div class="row" style="margin-bottom: 30px;">
        <div class="col-md-12">

        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-hover text-dark" id="datatable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Provinsi</th>
                        <th>Kasus</th>
                        <th>Sembuh</th>
                        <th>Meninggal</th>
                        <th>Dirawat</th>
                    </tr>
                </thead>
                <tbody>
                    @php $i = 1; @endphp
                    @foreach($json->list_data as $data)
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $data->key }}</td>
                        <td>{{ $data->jumlah_kasus }}</td>
                        <td>{{ $data->jumlah_sembuh }}</td>
                        <td>{{ $data->jumlah_meninggal }}</td>
                        <td>{{ $data->jumlah_dirawat }}</td>
                    </tr>
                    @php $i++; @endphp
                    @endforeach
                </tbody>
            </table>
            <div class="row">
                <div class="col-md-12">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
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