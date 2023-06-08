<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Stock;
use App\Models\Product;
use App\Models\Movement;
use App\Models\Supplier;
use Illuminate\Support\Facades\Auth;

class MovementController extends Controller
{
    public function index() {

        $products = Stock::findOrFail(Auth::user()->id)->products;

        $movements = Movement::all();

        return view('movements.index', ['products' => $products, 'movements' => $movements]);
    }

    public function create() {

        $products = Stock::findOrFail(Auth::user()->id)->products;

        $suppliers_list = array();

        foreach($products as $i) {
            $product_suppliers = array();
            $product = Product::findOrFail($i->id);
            $suppliers = $product->suppliers;
            foreach($suppliers as $supplier) {
                array_push($product_suppliers, $supplier->name);
            }
            array_push($suppliers_list, $product_suppliers);
        }

        return view('movements.create', ['products' => $products, 'suppliers' => $suppliers, 'suppliers_list' => $suppliers_list]);

    }

    public function store(Request $request) {

        $product = Product::find($request->product);

        $movement = Movement::create([
            'type' => $request->type,
            'product_id' => $request->product,
            'product_name' => $product->name,
            'quantity' => $request->quantity,
            'value' => $request->value,
            'description' => $request->description,
            'date' => $request->date,
        ]);

        for($i = 0; $i < count($request->suppliers); $i++) {

            $supplier = Supplier::findOrFail($request->suppliers[$i]);

            $movement->suppliers()->attach($supplier->id);
        }

        if ($request->type == 1) {

            $product->update(['balance' => ($product->balance + $request->quantity)]);

        } else {

            $product->update(['balance' => ($product->balance - $request->quantity)]);
        }
        
        return redirect('/movements');
    }
}
