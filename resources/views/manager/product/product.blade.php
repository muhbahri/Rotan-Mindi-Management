<!DOCTYPE html>
<html lang="en">

    <head>
<<<<<<< HEAD
        @include('manager.css')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    </head>

    <body>
    @include('sweetalert::alert')
=======
        <style>
            td {
    text-align: center;
}
td img {
    display: block;
    margin: 0 auto; /* Untuk mengatur gambar agar terpusat secara horizontal */
}

        </style>
        @include('manager.css')

    </head>

    <body>
>>>>>>> 95dd6bdbf1e0abb2bf6938fb7769c0ccf3876764
        <div class="wrapper">
            @include('manager.sidebar')

            <div class="main">
                @include('manager.navbar')

                <main class="content">
                    <div class="container-fluid p-0">
                        <div class="container-fluid py-1">
                            <div class="container">
                                <div style="border-radius:30px" class="card shadow-lg p-3 rounded-pill-4">
                                    <div class="container-fluid">
                                        <div class="card-body">
                                            <div class="container">
                                                <div class="py-3">
                                                    <p class="title-page">Data Barang</p>
                                                </div>
                                                <div class="btn-i d-flex justify-content-between align-items-center mb-3">
                                                    <a style="border-radius:10px; padding:8px"
                                                    class="btn btn-secondary btn-sm" href="{{ url('view_addproduct') }}"><i
                                                        class="fa-solid fa-plus" data-feather="plus">></i> Tambah
                                                    Data</a>
                                                </div>
                                                <p></p>
                                            </div>
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>Nama Barang</th>
                                                            <th>Gambar</th>
                                                            <th>Harga</th>
                                                            <th colspan="">Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($products as $product)
                                                        <tr>
                                                            <td>{{ $product->product_name }}</td>
                                                            <td>
                                                                <img style="max-width: 50px; max-height:50px text-align:" class="img" src="{{ url('order') . '/' . $product->image }}" alt="">
                                                            </td>
                                                            <td>{{ $product->price }}</td>
                                                            <td>
                                                                    <a class="btn-edit" href='{{ url('edit_product', $product->id) }}' title="Edit"><i class="fa-regular fa-pen-to-square" data-feather="edit"></i></a>
                                                                    <a onclick="confirmation(event)" class="btn-hapus" href="{{ url('delete_product', $product->id)}}" title="Delete"><i class="fa-solid fa-trash" data-feather="trash-2"></i></a>                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- Pagination Links -->
                                            <div class="pagination">
                                                @if ($products->onFirstPage())
                                                    <span>&laquo;</span>
                                                @else
                                                    <a href="{{ $products->previousPageUrl() }}" rel="prev">&laquo;</a>
                                                @endif
                                        
                                                @php
                                                    $start = max(1, $products->currentPage() - 2);
                                                    $end = min($products->lastPage(), $products->currentPage() + 2);
                                                @endphp
                                        
                                                @if ($start > 1)
                                                    <a href="{{ $products->url(1) }}">1</a>
                                                    @if ($start > 2)
                                                        <span>...</span>
                                                    @endif
                                                @endif
                                        
                                                @for ($page = $start; $page <= $end; $page++)
                                                    @if ($page == $products->currentPage())
                                                        <a class="active">{{ $page }}</a>
                                                    @else
                                                        <a href="{{ $products->url($page) }}">{{ $page }}</a>
                                                    @endif
                                                @endfor
                                        
                                                @if ($end < $products->lastPage())
                                                    @if ($end < $products->lastPage() - 1)
                                                        <span>...</span>
                                                    @endif
                                                    <a href="{{ $products->url($products->lastPage()) }}">{{ $products->lastPage() }}</a>
                                                @endif
                                        
                                                @if ($products->hasMorePages())
                                                    <a href="{{ $products->nextPageUrl() }}" rel="next">&raquo;</a>
                                                @else
                                                    <span>&raquo;</span>
                                                @endif
                                            </div>
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
