<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderStatusHistory;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class OrderController extends Controller
{
    public function adminIndex(): View
    {
        $orders = Order::query()
            ->with('user')
            ->orderByDesc('order_date')
            ->paginate(20);

        return view('orders.admin-index', compact('orders'));
    }

    public function myOrders(Request $request): View
    {
        $orders = Order::query()
            ->where('user_id', $request->user()->id)
            ->orderByDesc('order_date')
            ->paginate(20);

        return view('orders.my-orders', compact('orders'));
    }

    public function history(Request $request): View
    {
        $orders = Order::query()
            ->where('user_id', $request->user()->id)
            ->whereIn('laundry_status', ['selesai', 'sudah_diambil'])
            ->orderByDesc('order_date')
            ->paginate(20);

        return view('orders.history', compact('orders'));
    }

    public function create(): View
    {
        $users = User::query()->orderBy('name')->get(['id', 'name', 'phone', 'email']);

        return view('orders.create', compact('users'));
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'user_id' => ['required', 'exists:users,id'],
            'customer_name' => ['required', 'string', 'max:150'],
            'customer_phone' => ['required', 'string', 'max:30'],
            'service_type' => ['required', 'string', 'max:100'],
            'quantity' => ['required', 'numeric', 'min:0.01'],
            'price' => ['required', 'numeric', 'min:0'],
            'payment_status' => ['required', 'in:sudah_bayar,belum_bayar'],
            'laundry_status' => ['required', 'in:diproses,selesai,sudah_diambil'],
        ]);

        Order::query()->create($data);

        return redirect()->route('admin.orders.index');
    }

    public function updateStatus(Request $request, Order $order): RedirectResponse
    {
        $data = $request->validate([
            'payment_status' => ['required', 'in:sudah_bayar,belum_bayar'],
            'laundry_status' => ['required', 'in:diproses,selesai,sudah_diambil'],
            'note' => ['nullable', 'string'],
        ]);

        DB::transaction(function () use ($request, $order, $data) {
            $oldPayment = $order->payment_status;
            $oldLaundry = $order->laundry_status;

            $order->update([
                'payment_status' => $data['payment_status'],
                'laundry_status' => $data['laundry_status'],
            ]);

            OrderStatusHistory::query()->create([
                'order_id' => $order->id,
                'changed_by_user_id' => $request->user()->id,
                'old_payment_status' => $oldPayment,
                'new_payment_status' => $data['payment_status'],
                'old_laundry_status' => $oldLaundry,
                'new_laundry_status' => $data['laundry_status'],
                'note' => $data['note'] ?? null,
                'changed_at' => now(),
            ]);
        });

        return back();
    }
}
