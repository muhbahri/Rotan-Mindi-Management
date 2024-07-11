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
                                    <p class="title-page">Edit Data Barang</p>
                                </div>
                                <div style="border-radius:20px">
                                    <form class="forms-sample" action="{{ url('/update_product', $product->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group cs-rl">
                                            <label for="exampleInputName1">Nama Barang</label>
                                            <input type="text" class="form-control" name="product_name" id="exampleInputName1" placeholder="Nama Barang" value="{{ $product->product_name }}">
                                        </div>
                                        <div class="form-group cs-rl">
                                            <label for="exampleInputName1">Harga</label>
                                            <input type="number" class="form-control" name="harga" min="0" id="exampleInputName1" placeholder="Harga" value="{{ $product->price }}">
                                        </div>
                                        @if ($product->image)
                                            <div class="mb-2">
                                                <img id="currentImage" class="img-padding-left" style="max-width: 50px; max-height:50px" src="/order/{{ $product->image }}" alt="">
                                            </div>
                                        @endif
                                        <div class="form-group cs-rl">
                                            <label for="formFile" class="form-label">File upload</label>
                                            <input class="form-control" type="file" id="formFile" name="image" accept="image/*" onchange="previewImage(event)">
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

    <script>
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('currentImage');
                output.src = reader.result;
                output.style.display = 'block';
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
</body>

</html>
