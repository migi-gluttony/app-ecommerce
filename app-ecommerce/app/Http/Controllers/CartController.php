<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Afficher la page d'accueil avec la liste des produits
     */
    public function index()
    {
        $products = Product::all();
        return view('index', compact('products'));
    }
    
    /**
     * Afficher le panier
     */
    public function viewCart()
    {
        $products = Product::all();
        return view('cart', compact('products'));
    }
    
    /**
     * Ajouter un produit au panier
     */
    public function addToCart($id)
    {
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);
        
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "photo" => $product->image,
                "detail" => $product->detail
            ];
        }
        
        session()->put('cart', $cart);
        return response()->json(['success' => 'Produit ajouté au panier avec succès']);
    }
    
    /**
     * Supprimer un produit du panier
     */
    public function removeFromCart(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            return response()->json(['success' => 'Produit supprimé du panier']);
        }
    }
    
    /**
     * Vider le panier
     */
    public function clearCart()
    {
        session()->forget('cart');
        return redirect()->back();
    }
}