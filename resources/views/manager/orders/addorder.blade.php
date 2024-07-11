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
                                    <p class="title-page">Tambah Data Pesanan</p>
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
                                    <form class="forms-sample" action="{{ url('/add_order') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group cs-rl">
                                            <label for="exampleInputName1">Nama Barang</label>
                                            <select class="form-control" name="produk" id="produk"
                                                onchange="changeValue(this.value)">
                                                <option value="">Pilih Produk</option>
                                                @foreach ($product as $prod)
                                                    <option value="{{ $prod->product_name }}">{{ $prod->product_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group cs-rl">
                                            <label for="exampleInputEmail3">Ukuran</label>
                                            <input type="text" class="form-control" name="ukuran" id="ukuran"
                                                placeholder="Ukuran">
                                        </div>
                                        <div class="form-group cs-rl">
                                            <label for="exampleInputPassword4">Kuantitas</label>
                                            <input type="number" class="form-control" name="kuantitas" id="kuantitas"
                                                placeholder="Kuantitas">
                                        </div>
                                        <div class="form-group cs-rl">
                                            <label for="exampleInputName1">Harga</label>
                                            <input type="number" class="form-control" id="harga" name="harga" min="0"
                                                placeholder="Harga">
                                        </div>
                                        <div class="form-group cs-rl">
                                            <label for="exampleInputName1">Batas Waktu</label>
                                            <input type="date" class="form-control" name="deadline" id="deadline"
                                                placeholder="Batas Waktu">
                                        </div>
                                        <div class="form-group cs-rl">
                                            <label>Gambar</label>
                                            <br>
                                            <img class="img-padding-left" id="preview" src="{{ asset('order/preview.jpeg') }}"
                                                style="max-width: 100px; max-height:100px">
                                        </div>
                                        <div class="btn-i">
                                            <button type="submit" class="btn btn-dark">Simpan</button>
                                            <a class="btn btn-abu me-2" href="{{ url('view_order') }}">Batal</a>
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
        function changeValue(productName) {
            @foreach ($product as $prod)
                if ("{{ $prod->product_name }}" == productName) {
                    document.getElementById('harga').value = "{{ $prod->price }}";
                    document.getElementById('preview').src = "{{ asset('order/'.$prod->image) }}";
                    // Ganti 'preview' dengan id yang sesuai untuk preview gambar di form
                }
            @endforeach
        }
    </script>
</body>

</html>
