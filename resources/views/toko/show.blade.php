<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Show</title>
</head>

<body>
    <div class="container shadow rounded bg-white mt-5">
        <div class="row">
            <div class="col-md5">
                <button class="btn btn-waring">{{$gass->merek_baju}}</button>
                <button class="btn btn-waring">{{$gass->harga_baju}}</button>
                <button class="btn btn-waring">{{$gass->ukuran_baju}}</button>
                <img src="{{asset('foto/' . $gass->foto_baju)}}" alt="">

                <a href="{{route('toko.index')}}" class="btn btn-danger">Back</a>
            </div>
        </div>
    </div>
</body>

</html>