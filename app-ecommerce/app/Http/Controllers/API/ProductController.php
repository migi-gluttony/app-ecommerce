<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Product::query();
        
        // Filtrage par nom de produit
        if ($search = $request->search) {
            $query->where('name', 'LIKE', "%{$search}%");
        }
        
        // Filtrage par prix
        if ($min_price = $request->min_price) {
            $query->where('price', '>=', $min_price);
        }
        
        if ($max_price = $request->max_price) {
            $query->where('price', '<=', $max_price);
        }
        
        // Filtrage par stock
        if ($min_stock = $request->min_stock) {
            $query->where('stock', '>=', $min_stock);
        }
        
        if ($max_stock = $request->max_stock) {
            $query->where('stock', '<=', $max_stock);
        }
        
        $products = $query->paginate(10);
        
        return response()->json($products);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'companyid' => 'required|numeric',
        ]);
        
        $input = $request->all();
        
        if ($image = $request->file('image')) {
            $path = $image->store('products', 'public');
            $input['image'] = $path;
        }
        
        $product = Product::create($input);
        
        return response()->json([
            'success' => true,
            'message' => 'Product created successfully',
            'product' => $product
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return response()->json($product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'companyid' => 'required|numeric',
        ]);
        
        $input = $request->all();
        
        if ($image = $request->file('image')) {
            // Supprimer l'ancienne image si elle existe
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            
            $path = $image->store('products', 'public');
            $input['image'] = $path;
        } else {
            unset($input['image']);
        }
        
        $product->update($input);
        
        return response()->json([
            'success' => true,
            'message' => 'Product updated successfully',
            'product' => $product
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        // Supprimer l'image si elle existe
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }
        
        $product->delete();
        
        return response()->json([
            'success' => true,
            'message' => 'Product deleted successfully'
        ]);
    }
}