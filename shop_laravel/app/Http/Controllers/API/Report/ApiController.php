<?php

namespace App\Http\Controllers\API\Report;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class ApiController extends Controller
{
    // Метод для отображения списка всех категорий с товарами
    public function getCategoriesWithProducts()
    {
        $categories = Category::with(['products', 'descendants.products'])->whereNull('parent_id')->get();
        return response()->json($categories);
    }
    // Метод сортировки продуктов
    public function sortProducts(Request $request)
    {
        $sortBy = $request->input('sort_by', 'name');
        $order = $request->input('order', 'asc');

        $products = Product::orderBy($sortBy, $order)->get();
        return response()->json($products);
    }

    // Метод составления отчёта продаж
    public function generatePurchaseReport(Request $request)
    {
        $format = $request->input('format', 'json');
        $startDate = Carbon::now()->subMonth()->startOfDay();
        $endDate = Carbon::now()->endOfDay();

        $purchases = Order::whereBetween('created_at', [$startDate, $endDate])
            ->select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as total'))
            ->groupBy('date')
            ->get();

        if ($format === 'csv') {
            $csv = "Date,Total\n";
            foreach ($purchases as $purchase) {
                $csv .= "{$purchase->date},{$purchase->total}\n";
            }
            return response($csv, 200)
                ->header('Content-Type', 'text/csv')
                ->header('Content-Disposition', 'attachment; filename="purchase_report.csv"');
        } else {
            return response()->json($purchases);
        }
    }

    public function moveProduct(Request $request, Product $product)
    {
        $validator = Validator::make($request->all(), [
            'category_id' => 'required|exists:categories,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ], 422);
        }

        $product->category_id = $request->input('category_id');
        $product->save();

        return response()->json([
            'success' => true,
            'message' => 'Успешно!',
            'product' => $product
        ]);
    }
}