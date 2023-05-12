<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class StockController extends Controller
{
    public function index() {

        return view('stock.index');
    }

    public function create() {

        $categories = Category::all();

        return view('stock.create', ['categories' => $categories]);
    }

    public function store(Request $request) {

        $product = new Product;

        $product->name = $request->name;
        $product->unit = $request->unit;
        $product->refference_value = $request->refference_value;
        $product->categories_id = $request->categories;

        $product->save();

        return redirect('/stock');
    }
}
