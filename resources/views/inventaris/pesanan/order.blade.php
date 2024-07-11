<!DOCTYPE html>
<html lang="en">

<head>
    @include('inventaris.css')
    <style>
        .hidden {
            display: none;
        }
    </style>

</head>

<body>
    <div class="wrapper">
        @include('inventaris.sidebar')

        <div class="main">
            @include('inventaris.navbar')

            <main class="content" style="padding: 10px">
                <div class="container-fluid p-0">
                    <div class="container-fluid py-4">
                        <div class="container">
                            <div style="border-radius:30px" class="card shadow-lg p-3 rounded-pill-4">
                                <div class="container-fluid">
                                    <div class="card-body">
                                        <div class="container">
                                            <div class="py-3">
                                                <p class="title-page">Data Pesanan</p>
                                            </div>
                                            
                                            <div class="btn-i d-flex justify-content-between align-items-center mb-3">
                                                <!-- Dropdown for column visibility -->
                                                <div class="dropdown">
                                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                                        Tampilkan Kolom
                                                    </button>
                                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <li><label class="dropdown-item"><input type="checkbox" id="toggle-all"> Semua</label></li>
                                                        <li><label class="dropdown-item"><input type="checkbox" class="column-toggle" data-column="status-column"> Status</label></li>
                                                        <li><label class="dropdown-item"><input type="checkbox" class="column-toggle" data-column="image-column"> Gambar</label></li>
                                                        <li><label class="dropdown-item"><input type="checkbox" class="column-toggle" data-column="subkontraktor-column"> Sub-Kontraktor</label></li>
                                                    </ul>
                                                </div>

                                                <div class="d-flex justify-content-between align-items-center mb-3">
                                                    <!-- Dropdown filter untuk subkontraktor_name -->
                                                    <div>
                                                        <select class="form-control" id="subkontraktor" name="subkontraktor">
                                                            <option value="">Pilih Subkontraktor</option>
                                                            @foreach ($subkontraktors as $subkontraktor)
                                                                <option value="{{ $subkontraktor->subkontraktor_name }}">{{ $subkontraktor->subkontraktor_name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                
                                                    <!-- Tombol untuk export PDF -->
                                                    <div>
                                                        <button class="btn btn-secondary oi" id="exportPDF">Export PDF</button>
                                                    </div>
                                                </div>
                                                                                              
                                            </div>

                                            <div class="table-responsive">
                                                <table class="table" style="text-align: center">
                                                    <thead>
                                                        <tr>
                                                            <th>Kode</th>
                                                            <th class="image-column hidden">Gambar</th>
                                                            <th>Ukuran</th>
                                                            <th>Kuantitas</th>
                                                            <th>Harga</th>
                                                            <th>Total</th>
                                                            <th>Batas Waktu</th>
                                                            <th>Progress</th>
                                                            <th class="subkontraktor-column hidden">Sub-Kontraktor</th>
                                                            <th class="status-column hidden">Status</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($orders as $order)
                                                        <tr>
                                                            <td>{{ $order->product_name }}</td>
                                                            <td class="image-column hidden">
                                                                <img style="max-width: 50px; max-height:50px" class="img" src="{{ url('order').'/'.$order->image }}" alt="">
                                                            </td>
                                                            <td>{{ $order->size }}</td>
                                                            <td>{{ $order->quantity }}</td>
                                                            <td>@currency($order->price)</td>
                                                            <td>@currency($order->total_price)</td>
                                                            <td>{{ $order->deadline }}</td>
                                                            <td>{{ $order->progress ?? 'kosong' }}</td>
                                                            <td class="subkontraktor-column hidden">{{ $order->subkontraktor_name ?? 'kosong' }}</td>
                                                            <td class="status-column hidden">
                                                                {!! $order->status == 'Selesai' ? '<span class="badge bg-success">Selesai</span>' : ($order->status == 'Diproses' ? '<span class="badge bg-warning">Belum Selesai</span>' : ($order->status ?? 'kosong')) !!}
                                                            </td>
                                                            <td>
                                                                    <a class="btn-edit" href="{{ url('edit_pesanan',$order->id) }}" title="Edit"><i class="fa-regular fa-pen-to-square" data-feather="edit"></i></a>
                                                                    <a onclick="confirmation(event)" class="btn-hapus" href="{{ url('delete_order',$order->id) }}" title="Hapus"><i class="fa-solid fa-trash" data-feather="trash-2"></i></a>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            <br>
                                            <div class="pagination">
                                                @if ($orders->onFirstPage())
                                                    <span>&laquo;</span>
                                                @else
                                                    <a href="{{ $orders->previousPageUrl() }}" rel="prev">&laquo;</a>
                                                @endif
                                        
                                                @php
                                                    $start = max(1, $orders->currentPage() - 2);
                                                    $end = min($orders->lastPage(), $orders->currentPage() + 2);
                                                @endphp
                                        
                                                @if ($start > 1)
                                                    <a href="{{ $orders->url(1) }}">1</a>
                                                    @if ($start > 2)
                                                        <span>...</span>
                                                    @endif
                                                @endif
                                        
                                                @for ($page = $start; $page <= $end; $page++)
                                                    @if ($page == $orders->currentPage())
                                                        <a class="active">{{ $page }}</a>
                                                    @else
                                                        <a href="{{ $orders->url($page) }}">{{ $page }}</a>
                                                    @endif
                                                @endfor
                                        
                                                @if ($end < $orders->lastPage())
                                                    @if ($end < $orders->lastPage() - 1)
                                                        <span>...</span>
                                                    @endif
                                                    <a href="{{ $orders->url($orders->lastPage()) }}">{{ $orders->lastPage() }}</a>
                                                @endif
                                        
                                                @if ($orders->hasMorePages())
                                                    <a href="{{ $orders->nextPageUrl() }}" rel="next">&raquo;</a>
                                                @else
                                                    <span>&raquo;</span>
                                                @endif
                                            </div>
                                        
                                        </div>
                                    </div>
                                </div>
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
    <script>
        // JavaScript to toggle column visibility
        document.querySelectorAll('.column-toggle').forEach(function(checkbox) {
            checkbox.addEventListener('change', function() {
                var columnClass = this.getAttribute('data-column');
                var columns = document.querySelectorAll('.' + columnClass);
                columns.forEach(function(column) {
                    column.classList.toggle('hidden', !checkbox.checked);
                });
            });
        });

        // Toggle all columns visibility based on "Tampilkan Semua" checkbox
        document.getElementById('toggle-all').addEventListener('change', function() {
            var isChecked = this.checked;
            document.querySelectorAll('.column-toggle').forEach(function(checkbox) {
                checkbox.checked = isChecked;
                var columnClass = checkbox.getAttribute('data-column');
                var columns = document.querySelectorAll('.' + columnClass);
                columns.forEach(function(column) {
                    column.classList.toggle('hidden', !isChecked);
                });
            });
        });

        // Initial column visibility based on checkbox state
        document.querySelectorAll('.column-toggle').forEach(function(checkbox) {
            checkbox.checked = false; // All columns are hidden by default
            var columnClass = checkbox.getAttribute('data-column');
            var columns = document.querySelectorAll('.' + columnClass);
            columns.forEach(function(column) {
                column.classList.add('hidden');
            });
        });
    </script>

</body>

</html>
