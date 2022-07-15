<div class="modal fade myModal" id="modalEdit{{$data->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true" data-backdrop="false" style="background-color: rgba(0, 0, 0, 0.5);">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Inventaris</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('admin-inventory.update', $data->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama">Nama Barang</label>
                        <input class="form-control" type="text" id="nama" name="nama" value="{{$data->nama}}"
                            style="text-transform:capitalize">
                    </div>
                    <div class=" form-group">
                        <label for="jumlah">Jumlah </label>
                        <input class="form-control" type="number" id="jumlah" name="jumlah" value="{{$data->jumlah}}">
                    </div>
                    <div class="form-group">
                        <label for="satuan">Satuan </label>
                        <input class="form-control" type="text" id="satuan" name="satuan" value="{{$data->satuan}}"
                            style="text-transform:capitalize">
                    </div>
                    <div class="form-group">
                        <label for="kondisi">Kondisi</label>
                        <select name="kondisi" id="kondisi" class="form-control">
                            <option value="Baik" {{$data->kondisi == 'Baik' ? 'selected' : ''}}>Baik</option>
                            <option value="Kurang Baik" {{$data->kondisi == 'Kurang Baik' ? 'selected' : ''}}>
                                Kurang
                                Baik</option>
                            <option value="Rusak" {{$data->kondisi == 'Rusak' ? 'selected' : ''}}>Rusak</option>
                        </select>
                    </div>
                    <div class=" form-group">
                        <label for="kategori">Kategori</label>
                        <select name="id_kategori" id="kategori" class="form-control">
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ $category->id == $data->id_kategori ? 'selected' : '' }}>
                                {{$category->nama_kategori}}</option>
                            @endforeach
                        </select>
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