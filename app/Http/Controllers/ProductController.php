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

    public function create() {
        return view('products.create');
    }

    public function store(Request $request){

        //validazione dati 
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
        ]);

        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->stock = $request->stock;
        $product->save();
        return redirect('/products');

    }

    public function edit(Product $product){
        return view('products.edit', compact('product'));

    }

    public function update(Request $request, Product $product){
        //validazione dati 
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
        ]);

        $product->name = $request->name;
        $product->price = $request->price; 
        $product->description = $request->description;
        $product->stock = $request->stock;
        $product->save();
        return redirect('/products');

        
    }

    public function destroy(Product $product) {
        $product->delete(); 
        return redirect('/products');
    }
    
}
