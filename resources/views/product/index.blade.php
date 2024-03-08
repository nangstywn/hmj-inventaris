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
                        <th>Nama</th>
                        <th>Merk</th>
                        <th>Stock</th>
                    </tr>
                </thead>
                <tbody>
                    @php $i = 1; @endphp
                    @foreach($result as $data)
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $data->name}}</td>
                        <td>{{ $data->merk}}</td>
                        <td>{{ $data->stock}}</td>
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