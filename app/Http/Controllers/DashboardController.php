<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $stats = [
            'total' => Order::count(),
            'belum_bayar' => Order::where('payment_status', 'belum_bayar')->count(),
            'diproses' => Order::where('laundry_status', 'diproses')->count(),
            'selesai' => Order::where('laundry_status', 'selesai')->count(),
            'sudah_diambil' => Order::where('laundry_status', 'sudah_diambil')->count(),
        ];

        return view('dashboard', compact('stats'));
    }
}
