<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; // qui importo il modello Product

class ProductController extends Controller
{
    //
    public function index() {
        $products = Product::all();
        return view('products.index', compact('products'));
    }
    
}
