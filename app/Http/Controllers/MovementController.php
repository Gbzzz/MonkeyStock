<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Stock;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class MovementController extends Controller
{
    public function index() {

        $products = Stock::findOrFail(Auth::user()->id)->products;

        return view('movements.index', ['products' => $products]);
    }

    public function create() {

        return view('movements.create');

    }
}
