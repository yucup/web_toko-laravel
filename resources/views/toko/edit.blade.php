<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-5 shadow rounded bg-white mt-5">
                <form action="{{route('toko.update', $post->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label">Merek</label>
                        <input type="text" class="form-control" name="merek_baju" value="{{old( 'merek_baju', $post->merek_baju )}}">
                    </div>
                    <div class=" mb-3">
                        <label class="form-label">Ukuran</label>
                        <input type="text" class="form-control" name="ukuran_baju" value="{{$post->ukuran_baju}}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Harga</label>
                        <input type="text" class="form-control" name="harga_baju" value="{{$post->harga_baju}}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Foto</label>
                        <input type="file" class="form-control" name="foto_baju">
                    </div>
                    <button class="btn btn-danger" type="submit">Submit</button>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5">
                <img src="{{asset('foto/'. $post->foto_baju)}}" alt="" width="50">
            </div>
        </div>
    </div>
</body>

</html>