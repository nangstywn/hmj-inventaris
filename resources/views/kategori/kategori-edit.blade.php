<div class="modal fade myModal" id="modalEdit--{{$data->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true" data-backdrop="false" style="background-color: rgba(0, 0, 0, 0.5);">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Kategori</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('admin-category.update', $data->id)}}" method="POST">
                <input name="_token" type="hidden" value="{{ csrf_token() }}" />
                {{ method_field('PUT') }}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama">Nama Kategori</label>
                        <input class="form-control" type="text" id="nama" name="nama_kategori"
                            value="{{$data->nama_kategori}}">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success"> <i class="fa fa-btn fa-save text"></i>
                            Save</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>