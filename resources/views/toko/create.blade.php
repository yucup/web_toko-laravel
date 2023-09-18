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
        <div class="col-md-5 shadow rounded bg-white mt-5">

        <!-- cara error 1 -->
            
        @if($errors->any())

            @foreach($errors->all() as $error)

            <div class="alert alert-warning">
                <h5>Pesan : {{$error}}</h5>
            </div>

            @endforeach
            @endif

            <form action="{{route('toko.store')}}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Merek</label>
                    <input type="text" class="form-control" name="merek_baju">

                    <!-- cara error 2 -->

                    <!-- memberikan pringatan error apabila belum terisi -->
                    <!-- @error('merek_baju')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror -->

                </div>
                <div class="mb-3">
                    <label class="form-label">Ukuran</label>
                    <input type="text" class="form-control" name="ukuran_baju">

                    <!--  memberikan pringatan error apabila belum terisi      -->
                    <!-- @error('ukuran_baju')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror -->

                </div>
                <div class="mb-3">
                    <label class="form-label">Harga</label>
                    <input type="text" class="form-control" name="harga_baju">

                    <!-- memberikan pringatan error apabila belum terisi -->
                    <!-- @error('harga_baju')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror -->

                </div>
                <div class="mb-3">
                    <label class="form-label">Foto</label>
                    <input type="file" class="form-control" name="foto_baju">

                    <!-- @error('foto_baju')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror -->

                </div>
                <button class="btn btn-danger" type="submit">Submit</button>
            </form>
        </div>
    </div>
</body>

</html>