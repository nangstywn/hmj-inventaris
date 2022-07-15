<div class="modal fade myModal" id="modalLihat{{$data->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true" data-backdrop="false" style="background-color: rgba(0, 0, 0, 0.5);">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header ">
                <h5 class="modal-title " id="exampleModalLabel">Detail Inventaris</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <div class="judul"><b>{{ucfirst($data->nama)}}</b></div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><b>Id : </b>{{$data->id}}</li>
                        <li class="list-group-item"><b>Satuan : </b>{{ucfirst($data->satuan)}}</li>
                        <li class="list-group-item"><b>Jumlah : </b>{{$data->jumlah}}</li>
                        <li class="list-group-item"><b>Kondisi : </b>{{$data->kondisi}}</li>
                        <li class="list-group-item"><b>Kategori : </b>{{$data->kategori->nama_kategori}}</li>
                    </ul>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>