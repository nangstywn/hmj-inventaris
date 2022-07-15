@foreach ($noti as $n => $notif)
<div class="mess__item">
    <div class='image img-cir img-40'>
        <img id="myPicture" name="myPicture">
        <script>
        var images = [],
            index = 0;
        // images[0] = "{{URL::asset('images/icon/ayla.png')}}"
        // images[1] = "{{URL::asset('images/icon/avatar-02.jpg')}}"
        // images[2] = "{{URL::asset('images/icon/rafly.png')}}"
        // images[3] = "{{URL::asset('images/icon/avatar-04.jpg')}}"
        // images[4] = "{{URL::asset('images/icon/avatar-05.png')}}"
        // images[5] = "{{URL::asset('images/icon/avatar-06.jpg')}}"
        // images[6] = "{{URL::asset('images/icon/haha.jpg')}}"
        images[0] = "{{URL::asset('images/icon/spongebob.png')}}"


        $('[name=\'myPicture\']').each(function() {
            var index = Math.floor(Math.random() * images.length);
            this.src = images[index];
        });
        </script>
    </div>
    <div class="content">
        <h6>{{$notif->user->name}}</h6>
        <p>Meminjam {{$notif->detail->jumlah}} {{$notif->detail->inventaris->nama}}</p>
        <small><span class="fas fa-clock"></span> {{$notif->created_at->diffForHumans()}} </small>
        <small>
            <a href="#" class="btn btn-info btn-sm pull-right btn-read" value="{{$notif->id}}">Read</a>
        </small>
    </div>
</div>
@endforeach