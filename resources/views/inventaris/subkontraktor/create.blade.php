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
                                    <p class="title-page">Tambah Data SubKontraktor</p>
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
                                    <form class="forms-sample" action="{{ url('/add_subkontraktor') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group cs-rl">
                                            <label for="exampleInputEmail3">Nama</label>
                                            <input type="text" class="form-control" name="nama" id="nama"
                                                placeholder="Masukan Nama Sub Kontraktor">
                                        </div>
                                        <div class="form-group cs-rl">
                                            <label for="exampleInputEmail3">Kontak</label>
                                            <input type="tel" class="form-control" name="kontak" id="kontak"
                                                placeholder="Masukan Kontak">
                                        </div>
                                        <div class="form-group cs-rl">
                                            <label for="exampleInputPassword4">Pekerja</label>
                                            <input type="number" class="form-control" name="pekerja" id="pekerja"
                                                placeholder="Masukan Jumlah Pekerja">
                                        </div>
                                        <div class="form-group cs-rl">
                                            <label for="exampleInputName1">Bahan Baku</label>
                                            <input type="text" class="form-control" id="bahan" name="bahan"
                                                placeholder="Masukan Jumlah Bahan Baku Tersedia">
                                        </div>
                                        <div class="btn-i">
                                            <button type="submit" class="btn btn-dark">Simpan</button>
                                            <a class="btn btn-abu me-2" href="{{ url('show_kontraktor') }}">Batal</a>
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
