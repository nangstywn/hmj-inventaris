<!-- Modal -->
<div class="modal fade myModal" id="modalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
    data-backdrop="false" style="background-color: rgba(0, 0, 0, 0.5);">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Inventaris</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('admin-inventory.store')}}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama">Nama Barang</label>
                        <input class="form-control" type="text" id="nama" name="nama" placeholder="Nama Barang"
                            style="text-transform:capitalize">
                    </div>
                    <div class=" form-group">
                        <label for="jumlah">Jumlah </label>
                        <input class="form-control" type="number" id="jumlah" name="jumlah" placeholder="Jumlah">
                    </div>
                    <div class="form-group">
                        <label for="satuan">Satuan </label>
                        <input class="form-control" type="text" id="satuan" name="satuan" placeholder="Satuan"
                            style="text-transform:capitalize">
                    </div>
                    <div class="form-group">
                        <label for="kondisi">Kondisi</label>
                        <select name="kondisi" id="kondisi" class="form-control">
                            <option value="">
                                Pilih Kondisi
                            </option>
                            <option value="Baik"> Baik </option>
                            <option value="Kurang Baik"> Kurang Baik </option>
                            <option value="Rusak"> Rusak </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="kategori">Kategori</label>
                        <select name="id_kategori" id="kategori" class="form-control">
                            <option value="">
                                Pilih Kategori
                            </option>
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->nama_kategori}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success"> <i class="fa fa-btn fa-save text"></i> Save
                    </button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>