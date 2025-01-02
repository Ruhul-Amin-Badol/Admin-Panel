<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Carbon\Carbon;
use App\Models\Product;

class DashboardController extends Controller
{


    public function dashboard()
    {
        $todayOrders = Order::whereNotIn('order_status_id', [5, 6, 8])->whereDate('created_at', Carbon::today())->count();
        $totalOrders = Order::whereNotIn('order_status_id', [5, 6, 8])->count();
        // $totalOrders = 150000000;
        $todaySales = Order::whereDate('created_at', Carbon::today())->whereNotIn('order_status_id', [5, 7, 8])->sum('total');
        $totalSales = Order::whereNotIn('order_status_id', [5, 6, 8])->sum('total');

        // $totalSales =1500000;
        $pendingOrders = Order::where('order_status_id', 1)->count();
        $completeOrders = Order::where('order_status_id', 7)->count();
        $recentProducts = Product::latest()
            ->limit(10)
            ->with('pages')
            ->get(['bangla_name', 'current_price', 'thumb_image'])
            ->map(function ($product) {
                return [
                    'bangla_name' => $product->bangla_name,
                    'current_price' => $product->current_price,
                    'thumb_image' => $product->thumb_image,
                ];
            });
        $lowStockProducts = Product::where('stock', '<', 10)
            ->take(10)
            ->get(['bangla_name', 'current_price', 'stock', 'thumb_image'])
            ->map(function ($product) {
                return [
                    'bangla_name' => $product->bangla_name,
                    'current_price' => $product->current_price,
                    'stock' => $product->stock,
                    'thumb_image' => $product->thumb_image,
                ];
            });
        $currentYear = date('Y');
        // Retrieve monthly sales and orders in one query
        $monthlyData = Order::selectRaw('MONTH(created_at) as month, SUM(total) as total_sales, COUNT(*) as total_orders')
            ->whereYear('created_at', $currentYear)
            ->whereNotIn('order_status_id', [5, 6, 8])
            ->groupBy('month')
            ->orderBy('month')
            ->get()
            ->keyBy('month');
            
$monthlySales = [];
$monthlyOrders = [];

if ($monthlyData->isNotEmpty()) {
    $monthlySales = $monthlyData->mapWithKeys(function ($data) {
        return [$data->month => $data->total_sales ?? 0];
    })->toArray();

    $monthlyOrders = $monthlyData->mapWithKeys(function ($data) {
        return [$data->month => $data->total_orders ?? 0];
    })->toArray();
}


        // $monthlySales = $monthlyData->mapWithKeys(fn($data) => [$data->month => $data->total_sales])->toArray();
        // $monthlyOrders = $monthlyData->mapWithKeys(fn($data) => [$data->month => $data->total_orders])->toArray();

        return response()->json([
            'todayOrders' => $todayOrders,
            'totalOrders' => $totalOrders,
            'todaySales' => $todaySales,
            'totalSales' => $totalSales,
            'recentProducts' => $recentProducts,
            'lowStockProducts' => $lowStockProducts,
            'pendingOrders' => $pendingOrders,
            'completeOrders' => $completeOrders,
            'monthlySales' => $monthlySales,
            'monthlyOrders' => $monthlyOrders,
        ]);
    }



//    public function dashboard()
//    {
//        $todayOrders = Order::whereDate('created_at', Carbon::today())->count();
//        $totalOrders = Order::count();
//
//        $todaySales = Order::whereDate('created_at', Carbon::today())->sum('total');
//        $totalSales = Order::sum('total');
//        $pendingOrders = Order::where('order_status_id', 1)->count();
//        $completeOrders = Order::where('order_status_id', 7)->count();
//
//        $recentProducts = Product::latest()
//            ->limit(10)
//            ->with('pages')
//            ->get(['bangla_name', 'current_price', 'thumb_image'])
//            ->map(function ($product) {
//                return [
//                    'bangla_name' => $product->bangla_name,
//                    'current_price' => $product->current_price,
//                    'thumb_image' => $product->thumb_image,
//                ];
//            });
//
//        $lowStockProducts = Product::where('stock', '<', 10)
//            ->take(10)
//            ->get(['bangla_name', 'current_price', 'stock', 'thumb_image'])
//            ->map(function ($product) {
//                return [
//                    'bangla_name' => $product->bangla_name,
//                    'current_price' => $product->current_price,
//                    'stock' => $product->stock,
//                    'thumb_image' => $product->thumb_image,
//                ];
//            });
//
//        // Return JSON response
//        return response()->json([
//            'todayOrders' => $todayOrders,
//            'totalOrders' => $totalOrders,
//            'todaySales' => $todaySales,
//            'totalSales' => $totalSales,
//            'recentProducts' => $recentProducts,
//            'lowStockProducts' => $lowStockProducts,
//            'pendingOrders' => $pendingOrders,
//            'completeOrders' => $completeOrders,
//        ]);
//    }
}

