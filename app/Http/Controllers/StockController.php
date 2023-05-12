<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function index() {

        return view('stock.index');
    }

    public function create() {

        return view('stock.create');
    }

    public function store(Request $request) {
    }
}
