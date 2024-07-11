<?php

namespace App\Http\Controllers;

use Log;
use App\Models\Orders;
use Illuminate\Http\Request;
use App\Models\Subcontractors;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class InventarisController extends Controller
{

    public function index()
    {
        $order = Orders::all();
        $orders = DB::table('orders')->get();

        // Hitung total pesanan
        $totalOrders = $orders->count();
        // Menghitung total produksi dari tabel orders
        $totalProduction = DB::table('orders')->sum('progress');
        // Menghitung total produk dari tabel products
        $totalProducts = DB::table('products')->count();
        // Menghitung total subkontraktor dari tabel subcontractors
        $totalSubcontractors = DB::table('subcontractors')->count();
        // Mengambil tiga produk terpopuler
        $topProducts = DB::table('orders')
            ->select('product_name', DB::raw('SUM(progress) as total_quantity'))
            ->groupBy('product_name')
            ->orderByDesc('total_quantity')
            ->limit(3)
            ->get();
        // Menghitung total pesanan per bulan
        $monthlyOrders = DB::table('orders')
            ->select(DB::raw('MONTH(created_at) as month'), DB::raw('COUNT(*) as total_orders'))
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->pluck('total_orders', 'month');

        // Mengirimkan data ke view
        return view('inventaris.dashboard', compact('order','totalOrders', 'totalProduction', 'totalProducts', 'totalSubcontractors', 'topProducts', 'monthlyOrders'));
    }

    public function show_order(Request $request)
{
    $subkontraktors = Orders::select('subkontraktor_name')->distinct()->get();
    $query = Orders::query();

    if ($request->has('subkontraktor') && $request->subkontraktor != '') {
        $query->where('subkontraktor_name', $request->subkontraktor);
    }

    $orders = $query->paginate(5); 

    return view('inventaris.pesanan.order', compact('orders', 'subkontraktors'));
}


    public function edit_pesanan($id)
    {
        $order = Orders::find($id);
        $subkontraktor = Subcontractors::all();
        return view('inventaris.pesanan.editpesanan', compact('order', 'subkontraktor'));
    }

    public function update_pesanan(Request $request, $id)
    {
        $order = Orders::find($id);
        $order->product_name = $request->product_name;
        $order->size = $request->ukuran;
        $order->quantity = $request->kuantitas;
        $order->price = $request->harga;
        $order->total_price = $order->quantity * $order->price;
        $order->deadline = $request->deadline;
        $order->progress = $request->progress;
        $order->subkontraktor_name = $request->subkontraktor;

        // Update status to 'Selesai' if progress equals quantity
        if ($request->progress == $request->kuantitas) {
            $order->status = 'Selesai';
        } 

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $image->move('order', $imagename);
            $order->image = $imagename;
        }

        $order->save();

        return Redirect::to('/show_order')->with('success', 'Order updated successfully');
    }

    public function exportPDF(Request $request)
{
    $query = Orders::query();

    if ($request->has('subkontraktor') && $request->subkontraktor != '') {
        $query->where('subkontraktor_name', $request->subkontraktor);
    }

    $orders = $query->get();

    $pdf = Pdf::loadView('inventaris.pdf', compact('orders'));
    return $pdf->download('orders.pdf');
}

    // SECTION SUB-KONTRAKTOR

    public function show_kontraktor()
    {
        $subkontraktors = Subcontractors::paginate(4);
        return view('inventaris.subkontraktor.index', compact('subkontraktors'));
    }

    public function show_subkontraktor()
    {
        $subkontraktor = Subcontractors::all();
        return view('inventaris.subkontraktor.create', compact('subkontraktor'));
    }

    public function add_subkontraktor(Request $request)
{
    $messages = [
        'nama.required' => 'Nama subkontraktor harus diisi.',
        'kontak.required' => 'Kontak harus diisi.',
        'pekerja.required' => 'Jumlah pekerja harus diisi.',
        'pekerja.integer' => 'Jumlah pekerja harus berupa angka.',
        'bahan.required' => 'Stok bahan harus diisi.',
    ];

    $request->validate([
        'nama' => 'required',
        'kontak' => 'required',
        'pekerja' => 'required|integer',
        'bahan' => 'required',
    ], $messages);

    $subkontraktor = new Subcontractors();
    $subkontraktor->subkontraktor_name = $request->nama;
    $subkontraktor->contact = $request->kontak;
    $subkontraktor->employee = $request->pekerja;
    $subkontraktor->stock = $request->bahan;

    $subkontraktor->save();

    return Redirect::to('/show_kontraktor')->with('success', 'Subkontraktor berhasil ditambahkan');
}


    public function edit_sub($id)
    {
        $subkontraktor = Subcontractors::find($id);
        return view('inventaris.subkontraktor.edit', compact('subkontraktor'));
    }

    public function update_sub(Request $request, $id)
    {
        $messages = [
            'pekerja.integer' => 'Jumlah pekerja harus berupa angka.',
        ];
    
        $request->validate([
            'pekerja' => 'integer',
        ], $messages);
    
        $subkontraktor = new Subcontractors();
        $subkontraktor->subkontraktor_name = $request->nama;
        $subkontraktor->contact = $request->kontak;
        $subkontraktor->employee = $request->pekerja;
        $subkontraktor->stock = $request->bahan;
    
        $subkontraktor->save();

        return Redirect::to('/show_order')->with('success', 'Order updated successfully');
    }
}
