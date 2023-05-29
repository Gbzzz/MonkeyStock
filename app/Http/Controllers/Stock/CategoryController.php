<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function store(Request $request) {

        $category = Category::create([

            'name' => $request->new_category,
        ]);

        return redirect()->back();
    }
}
