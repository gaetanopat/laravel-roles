<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construt(){
      $this->middleware('permission:view_product');
      $this->middleware('permission:edit_product')->except(['index', 'show']);
    }

    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $rules = [
          'name' => 'required|unique:products|max:255',
          'description' => 'required',
          'price' => 'required|numeric|between:0,9999.99',
        ];
        $messages = [
          'name.required' => 'Inserisci il titolo del prodotto',
          'name.unique' => 'Hai già inserito questo prodotto',
          'description.required' => 'Inserisci la descrizione del prodotto',
          'price.required' => 'Inserisci il prezzo del prodotto',
          'price.numeric' => 'Il prezzo deve essere un numero',
          'price.between' => 'Il prezzo deve essere > 0'
        ];
        $validatedData = $request->validate($rules, $messages);

        $dati = $request->all();
        $new_product = new Product();
        $new_product->fill($dati);
        $new_product->save();
        return redirect()->route('products.index');
    }

    public function show(Product $product)
    {
        if(empty($product)){
          abort(404);
        }
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
      if(empty($product)){
        abort(404);
      }
      return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $rules = [
          'name' => 'required|max:255',
          'description' => 'required',
          'price' => 'required|numeric|between:0,9999.99',
        ];
        $messages = [
          'name.required' => 'Inserisci il titolo del prodotto',
          'description.required' => 'Inserisci la descrizione del prodotto',
          'price.required' => 'Inserisci il prezzo del prodotto',
          'price.numeric' => 'Il prezzo deve essere un numero',
          'price.between' => 'Il prezzo deve essere > 0'
        ];
        $validatedData = $request->validate($rules, $messages);

        $dati = $request->all();
        $product->fill($dati);
        $product->update();
        return redirect()->route('products.index');
    }

    public function destroy(Product $product)
    {
        if(empty($product)){
          abort(404);
        }
        $product->delete();
        return redirect()->route('products.index');
    }
}
