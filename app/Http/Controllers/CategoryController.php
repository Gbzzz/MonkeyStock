<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function store(Request $request) {

        $category = Category::create([

            'name' => $request->new_category,
            'stock_id' => Auth::user()->id,
        ]);

        return redirect()->back();
    }

    public function destroy($id) {

        Category::findOrFail($id)->delete();

        return redirect()->back();
    }
}
