<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;
use App\Models\Stock;
use Illuminate\Support\Facades\Auth;


class StockController extends Controller
{
    public function index() {

        return view('stock.index');
    }

    public function create() {

        $categories = Category::all();
        $suppliers = Supplier::all();

        return view('stock.create', ['categories' => $categories, 'suppliers' => $suppliers]);
    }

    public function supplier(Request $request) {

        $supplier = new Supplier;

        $supplier->name = $request->new_supplier;

        $supplier->save();

        return redirect()->back();

    }

    public function store(Request $request) {

        $product = Product::create([
            'name' => $request->name,
            'categories_id' => $request->categories,
            'unit' => $request->unit,
            'refference_value' => $request->refference_value,
            'maximum_stock_level' => $request->maximum_stock_level,
            'minimum_stock_level' => $request->minimum_stock_level,
            'balance' => 0,
        ]);

        $stock = Stock::findOrFail(Auth::user()->id);

        $product->stocks()->attach($stock->id);

        for($i = 0; $i < count($request->suppliers); $i++) {

            $supplier = Supplier::findOrFail($request->suppliers[$i]);

            $product->suppliers()->attach($supplier->id);
        }


        return redirect('/stock');
    }
}
