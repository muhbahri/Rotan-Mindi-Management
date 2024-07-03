<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Console\View\Components\Alert;

class HomeController extends Controller
{
    public function index()
    {
        return view('manager.dashboard');
    }

    public function view_order()
    {
        $order = Orders::all();
        return view('manager.order', compact('order'));
    }

    public function view_addorder()
    {
        $dataorder = Orders::all();
        return view('manager.addorder', compact('dataorder'));
    }

    public function add_order(Request $request)
    {
        $order = new Orders;
        $order->code = $request->kode;
        $order->size = $request->ukuran;
        $order->quantity = $request->kuantitas;
        $order->price = $request->harga;
        $order->total_price = $request->kuantitas * $request->harga;
        $order->deadline = $request->deadline;
        $image = $request->image;
        $imagename = time() . '.' . $image->getClientOriginalExtension();
        $request->image->move('order', $imagename);
        $order->image = $imagename;


        $order->save();
        //Alert::success('Berhasil', 'Produk Telah Berhasil Ditambahkan');
        return Redirect::to('/view_order')->with('success', 'Order updated successfully');
    }

    public function edit_order($id)
{
    $order = Orders::find($id);
    return view('manager.showedit', compact('order'));
}

public function update_order(Request $request, $id)
{
    $order = Orders::find($id);
    $order->code = $request->kode;
    $order->size = $request->ukuran;
    $order->quantity = $request->kuantitas;
    $order->price = $request->harga;
    $order->total_price = $order->quantity * $order->price;
    $order->deadline = $request->deadline;

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imagename = time() . '.' . $image->getClientOriginalExtension();
        $image->move('order', $imagename);
        $order->image = $imagename;
    }

    $order->save();

    return Redirect::to('/view_order')->with('success', 'Order updated successfully');
}

public function delete_order($id)
    {
        $order = Orders::where('id', $id)->first();
        File::delete(public_path('order' . '/' . $order->image));

        Orders::where('id', $id)->delete();
        //Alert::success('Berhasil', 'Hapus Data Produk Berhasil');
        return redirect()->back()->with('success', 'Berhasil hapus data');
    }

}
