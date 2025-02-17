<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Produk;
use App\Models\User;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('user')->get();
        return view('order.index', compact('orders'));
    }

    public function create()
    {
        $produks = Produk::all();
        $users = User::all();
        return view('order.create', compact('produks', 'users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'status' => 'required|string',
            'tanggal_sewa' => 'required|date',
            'tanggal_kembali' => 'required|date|after:tanggal_sewa',
            'durasi_sewa' => 'required|integer',
            'biaya_total' => 'required|numeric',
            'produk_id' => 'required|array',
            'jumlah' => 'required|array',
            'harga' => 'required|array',
        ]);

        $orderData = $request->only(['user_id', 'status', 'tanggal_sewa', 'tanggal_kembali', 'durasi_sewa', 'biaya_total']);
        $order = Order::create($orderData);

        foreach ($request->produk_id as $key => $value) {
            OrderItem::create([
                'order_id' => $order->order_id,
                'produk_id' => $request->produk_id[$key],
                'jumlah' => $request->jumlah[$key],
                'harga' => $request->harga[$key],
            ]);
        }

        return redirect()->route('order.index');
    }

    public function edit(Order $order)
    {
        $produks = Produk::all();
        $users = User::all();
        return view('order.edit', compact('order', 'produks', 'users'));
    }

    public function update(Request $request, Order $order)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'status' => 'required|string',
            'tanggal_sewa' => 'required|date',
            'tanggal_kembali' => 'required|date|after:tanggal_sewa',
            'durasi_sewa' => 'required|integer',
            'biaya_total' => 'required|numeric',
            'produk_id' => 'required|array',
            'jumlah' => 'required|array',
            'harga' => 'required|array',
        ]);

        $orderData = $request->only(['user_id', 'status', 'tanggal_sewa', 'tanggal_kembali', 'durasi_sewa', 'biaya_total']);
        $order->update($orderData);
        $order->orderItem()->delete();

        foreach ($request->produk_id as $key => $value) {
            OrderItem::create([
                'order_id' => $order->order_id,
                'produk_id' => $request->produk_id[$key],
                'jumlah' => $request->jumlah[$key],
                'harga' => $request->harga[$key],
            ]);
        }

        return redirect()->route('order.index');
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('order.index');
    }
}
