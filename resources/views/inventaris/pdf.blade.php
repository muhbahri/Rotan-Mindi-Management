<!-- resources/views/orders/pdf.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Data Pesanan</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: center;
        }
    </style>
</head>
<body>
    <h2>Data Pesanan</h2>
    <table>
        <thead>
            <tr>
                <th>Kode</th>
                <th>Ukuran</th>
                <th>Kuantitas</th>
                <th>Harga</th>
                <th>Total</th>
                <th>Batas Waktu</th>
                <th>Progress</th>
                <th>Sub-Kontraktor</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
            <tr>
                <td>{{ $order->product_name }}</td>
                <td>{{ $order->size }}</td>
                <td>{{ $order->quantity }}</td>
                <td>@currency($order->price)</td>
                <td>@currency($order->total_price)</td>
                <td>{{ $order->deadline }}</td>
                <td>{{ $order->progress ?? 'kosong' }}</td>
                <td>{{ $order->subkontraktor_name ?? 'kosong' }}</td>
                <td>
                    {!! $order->status == 'Selesai' ? '<span class="badge bg-success">Selesai</span>' : ($order->status == 'Belum Selesai' ? '<span class="badge bg-warning">Belum Selesai</span>' : ($order->status ?? 'kosong')) !!}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
