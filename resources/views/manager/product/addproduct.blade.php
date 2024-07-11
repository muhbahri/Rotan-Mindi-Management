<!DOCTYPE html>
<html lang="en">

    <head>
        @include('manager.css')
    </head>

    <body>
        <div class="wrapper">
            @include('manager.sidebar')

            <div class="main">
                @include('manager.navbar')

                <main class="content">
                    <div class="container-fluid p-0">
                        <div class="container">
                            <div style="border-radius:30px" class="card shadow-lg p-3 rounded-pill-4">
                                <div class="container-fluid">
                                    <div class="py-3">
                                        <p class="title-page">Tambah Data Barang</p>
                                    </div>
                                    <div style="border-radius:20px">
                                        @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                        <form class="forms-sample" action="{{ url('/add_product') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group cs-rl">
                                                <label for="exampleInputName1">Nama Barang</label>
                                                <input type="text" class="form-control" name="product_name"
                                                    id="exampleInputName1" placeholder="Nama Barang" >
                                            <div class="form-group cs-rl">
                                                <label for="exampleInputName1">Harga</label>
                                                <input type="number" class="form-control" name="harga" min="0"
                                                    id="exampleInputName1" placeholder="Harga">
                                            </div>
                                            <div for="formFile" class="form-label cs-rl">
                                                <label>File upload</label>
                                                <img class="img-padding-left" id="preview" src="#" alt="Preview gambar" style="display:none; max-width: 100px; margin-bottom: 10px;">
                                                <input class="form-control" type="file" name="image" id="imageInput" accept="image/*">
                                            </div>
                                            <div class="btn-i">
                                            <button type="submit" class="btn btn-dark">Simpan</button>
                                            <button class="btn btn-abu me-2" onclick="goBack()">Batal</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                </main>

                <footer class="footer">
                    @include('manager.footer')
                </footer>
            </div>
        </div>

        @include('manager.js')

    </body>

</html>
