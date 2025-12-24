<?php

namespace App\Http\Controllers;

use App\Models\DeliverySchedule;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CalendarController extends Controller
{
    public function index(): View
    {
        $schedules = DeliverySchedule::with('order')
            ->orderBy('delivery_date')
            ->orderBy('delivery_time')
            ->get();

        $orders = Order::where('payment_status', 'sudah_bayar')
            ->where('laundry_status', '!=', 'selesai')
            ->whereDoesntHave('deliverySchedule')
            ->get();

        return view('calendar', compact('schedules', 'orders'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'order_id' => 'required|exists:orders,id',
            'delivery_date' => 'required|date|after_or_equal:today',
            'delivery_time' => 'required|date_format:H:i',
            'customer_address' => 'required|string|max:255',
            'customer_phone' => 'required|string|max:20',
            'notes' => 'nullable|string|max:500',
        ]);

        DeliverySchedule::create($validated);

        return redirect()->route('calendar')->with('success', 'Jadwal pengiriman berhasil ditambahkan');
    }

    public function updateStatus(Request $request, DeliverySchedule $schedule)
    {
        $validated = $request->validate([
            'status' => 'required|in:scheduled,in_progress,completed,cancelled',
        ]);

        $schedule->update($validated);

        return redirect()->route('calendar')->with('success', 'Status pengiriman berhasil diperbarui');
    }
}
