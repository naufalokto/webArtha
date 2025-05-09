<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = \App\Models\Product::all()->groupBy('category');
    return view('products', compact('products'));
    }
}