<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        // You can fetch products from the database here if needed
        return view('products');
    }
}