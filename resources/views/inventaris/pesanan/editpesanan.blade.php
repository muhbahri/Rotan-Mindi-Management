<!DOCTYPE html>
<html lang="en">

    <head>
        @include('inventaris.css')
    </head>

    <body>
        <div class="wrapper">
            @include('inventaris.sidebar')

            <div class="main">
                @include('inventaris.navbar')

                <main class="content">
                    <div class="container-fluid p-0">
                        <div class="container">
                            <div style="border-radius:30px" class="card shadow-lg p-3 rounded-pill-4">
                                <div class="container-fluid">
                                    <div class="py-3">
                                        <p class="title-page">Edit Data Pesanan</p>
                                    </div>
                                    <div style="border-radius:20px">
                                        <form class="forms-sample" action="{{ url('/update_pesanan', $order->id) }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group cs-rl">
                                                <label for="exampleInputName1">Nama Barang</label>
                                                <input type="text" class="form-control" name="product_name"
                                                    id="exampleInputName1" placeholder="Nama Barang"
                                                    value="{{ $order->product_name }}" readonly>
                                            </div>
                                            <div class="form-group cs-rl">
                                                <label for="exampleInputEmail3">Ukuran</label>
                                                <input type="text" class="form-control" name="ukuran"
                                                    id="exampleInputEmail3" placeholder="Ukuran"
                                                    value="{{ $order->size }}" readonly>
                                            </div>
                                            <div class="form-group cs-rl">
                                                <label for="exampleInputPassword4">Kuantitas</label>
                                                <input type="number" class="form-control" name="kuantitas"
                                                    id="exampleInputtext4" placeholder="Kuantitas"
                                                    value="{{ $order->quantity }}" readonly>
                                            </div>
                                            <div class="form-group cs-rl">
                                                <label for="exampleInputName1">Harga</label>
                                                <input type="number" class="form-control" name="harga" min="0"
                                                    id="exampleInputName1" placeholder="Harga"
                                                    value="{{ $order->price }}" readonly>
                                            </div>
                                            <div class="form-group cs-rl">
                                                <label for="exampleInputName1">Batas Waktu</label>
                                                <input type="date" class="form-control" name="deadline" min="0"
                                                    id="exampleInputName1" placeholder="Batas Waktu"
                                                    value="{{ $order->deadline }}" readonly>
                                            </div>
                                            <div class="form-group cs-rl">
                                                <label for="exampleInputName1">Progress</label>
                                                <input type="number" class="form-control" name="progress" min="0"
                                                    id="exampleInputName1" placeholder="Progress"
                                                    value="{{ $order->progress }}">
                                            </div>
                                            <div class="form-group cs-rl">
                                                <label for="produk">Nama</label>
                                                <select class="form-control" name="subkontraktor" id="subkontraktor">
                                                    <option value="{{ $order->subkontraktor_name }}">Pilih Nama</option>
                                                    @foreach ($subkontraktor as $subkontraktor)
                                                        <option value="{{ $subkontraktor->subkontraktor_name }}">{{ $subkontraktor->subkontraktor_name }}</option>
                                                        @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group cs-rl">
                                                <label>Foto Barang</label>
                                                @if ($order->image)
                                                <div class="mb-2">
                                                    <img class="img-padding-left" style="max-width: 50px; max-height:50px" src="/order/{{ $order->image }}" alt="">
                                                </div>
                                            @endif
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
                    @include('inventaris.footer')
                </footer>
            </div>
        </div>

        @include('inventaris.js')

    </body>

</html>
