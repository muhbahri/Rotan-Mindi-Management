<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use Illuminate\Http\Request;

class InventarisController extends Controller
{
    public function index()
    {
        return view('inventaris.dashboard');
    }

    public function view_order()
    {
        $order = Orders::all();
        return view('manager.order', compact('order'));
    }
}
