<!DOCTYPE html>
<html lang="en">

<head>
    @include('manager.css')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
</head>

<body>
    @include('sweetalert::alert')
    <div class="wrapper">
        @include('manager.sidebar')
        <div class="main">
            @include('manager.navbar')
            <main class="content">
                <div class="container-fluid p-0">
                    <div class="container-fluid py-1">
                        <div class="container">
                            <div class="card shadow-lg p-3 rounded-pill-4" style="border-radius:30px;">
                                <div class="container-fluid">
                                    <div class="card-body">
                                        <div class="container">
                                            <div class="py-3">
                                                <p class="title-page">Data Pesanan</p>
                                            </div>
                                            <div class="btn-i d-flex justify-content-between align-items-center mb-3">
                                                <a style="border-radius:10px; padding:8px"
                                                class="btn btn-secondary btn-sm" href="{{ url('view_addorder') }}"><i
                                                    class="fa-solid fa-plus" data-feather="plus">></i> Tambah
                                                Data</a>
                                                <div class="dropdown">
                                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                                        Tampilkan Kolom
                                                    </button>
                                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <li><label class="dropdown-item"><input type="checkbox" id="toggle-all"> Semua</label></li>
                                                        <li><label class="dropdown-item"><input type="checkbox" class="column-toggle" data-column="progress-column"> Progress</label></li>
                                                        <li><label class="dropdown-item"><input type="checkbox" class="column-toggle" data-column="subkontraktor-column"> Sub-Kontraktor</label></li>
                                                        <li><label class="dropdown-item"><input type="checkbox" class="column-toggle" data-column="status-column"> Status</label></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>Nama Produk</th>
                                                            <th>Gambar</th>
                                                            <th>Ukuran</th>
                                                            <th>Kuantitas</th>
                                                            <th>Harga</th>
                                                            <th>Total</th>
                                                            <th>Batas Waktu</th>
                                                            <th class="progress-column hidden">Progress</th>
                                                            <th class="subkontraktor-column hidden">Sub-Kontraktor</th>
                                                            <th class="status-column hidden">Status</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($orders as $item)
                                                            <tr>
                                                                <td>{{ $item->product_name }}</td>
                                                                <td><img src="{{ url('order') . '/' . $item->image }}" alt=""></td>
                                                                <td>{{ $item->size }}</td>
                                                                <td>{{ $item->quantity }}</td>
                                                                <td>@currency($item->price)</td>
                                                                <td>@currency($item->total_price)</td>
                                                                <td>{{ $item->deadline }}</td>
                                                                <td class="progress-column hidden">{{ $item->progress ?? 'kosong' }}</td>
                                                                <td class="subkontraktor-column hidden">{{ $item->subkontraktor_name ?? 'kosong' }}</td>
                                                                <td class="status-column hidden">
                                                                    {!! $item->status == 'Selesai'
                                                                        ? '<span class="badge bg-success">Selesai</span>'
                                                                        : ($item->status == 'Diproses'
                                                                            ? '<span class="badge bg-warning">Belum Selesai</span>'
                                                                            : $item->status ?? 'kosong') !!}
                                                                </td>
                                                                <td>
                                                                        <a class="btn-edit" href='{{ url('edit_order', $item->id) }}' title="Edit"><i class="fa-regular fa-pen-to-square" data-feather="edit"></i></a>
                                                                        <a onclick="confirmation(event)" class="btn-hapus" href="{{ url('delete_order', $item->id) }}" title="Delete"><i class="fa-solid fa-trash" data-feather="trash-2"></i></a>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- Pagination Links -->
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
            </main>
            <footer class="footer">
                @include('manager.footer')
            </footer>
        </div>
    </div>
    @include('manager.js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toggleAll = document.getElementById('toggle-all');
            const columnToggles = document.querySelectorAll('.column-toggle');

            toggleAll.addEventListener('change', function() {
                const checked = toggleAll.checked;
                columnToggles.forEach(toggle => {
                    toggle.checked = checked;
                    document.querySelectorAll(`.${toggle.dataset.column}`).forEach(col => {
                        col.classList.toggle('hidden', !checked);
                    });
                });
            });

            columnToggles.forEach(toggle => {
                toggle.addEventListener('change', function() {
                    document.querySelectorAll(`.${toggle.dataset.column}`).forEach(col => {
                        col.classList.toggle('hidden', !toggle.checked);
                    });
                });
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: "btn btn-success",
                cancelButton: "btn btn-danger"
            },
            buttonsStyling: false
        });

        function confirmation(event) {
            event.preventDefault();
            const urlToRedirect = event.currentTarget.getAttribute('href');

            swalWithBootstrapButtons.fire({
                title: "Yakin ingin menghapus data ini?",
                text: "Data tidak dapat dikembalikan!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Ya, hapus!",
                cancelButtonText: "Batal",
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    // Mengonfirmasi penghapusan
                    swalWithBootstrapButtons.fire(
                        'Dihapus!',
                        'Data telah dihapus.',
                        'Berhasil'
                    ).then(() => {
                        // Redirect setelah penghapusan dikonfirmasi
                        window.location.href = urlToRedirect;
                    });
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    // Batal menghapus
                    swalWithBootstrapButtons.fire(
                        'Cancelled',
                        'Data batal dihapus :)',
                        'error'
                    );
                }
            });
        }
    </script>
</body>

</html>
