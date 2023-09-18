<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md">
                <h2>table data</h2>
                <table class="table table-bordered">
                    <tr>
                        <td>No</td>
                        <td>Merek</td>
                        <td>Ukuran</td>
                        <td>Harga</td>
                        <td>Foto</td>
                        <td>Aksi</td>
                    </tr>
                    
                    <!-- $baju diambil dari index() di BajuController -->
                    @forelse ($baju as $klambi)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$klambi->merek_baju}}</td>
                        <td>{{$klambi->ukuran_baju}}</td>
                        <td>Rp. {{$klambi->harga_baju}}</td>
                        <td><img src="{{asset('foto/'.$klambi->foto_baju)}}" width="50"></td>
                        <td>
                            <form action="{{route('toko.destroy', $klambi->id)}}" method="POST">

                            <!-- untuk pengambilan data diharuskan menggunakan "id" -->
                                <a href="{{route('toko.edit', $klambi->id)}}" class="btn btn-success">Edit</a>
                                <a href="{{route('toko.show', $klambi->id)}}" class="btn btn-warning">Show</a>
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">-</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <div class="btn btn-danger mb-3">
                        <h5>data belum diisi</h5>
                    </div>
                    @endforelse
                </table>
                <a href="{{route('toko.create')}}" class="btn btn-warning">+tambah</a>
            </div>
        </div>
    </div>
</body>

</html>