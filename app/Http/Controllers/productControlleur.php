<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class productControlleur extends Controller
{
    //afficher la liste des prduits
    public function index()
    {//utilise la cache pour stocker les produits pendants 60 minutes
        $products = Cache::remember('products', 60, function () {
            return Product::all();
        });
        
        $expensiveProducts = collect($products)
            ->where('price', '>', 800)
            ->sortBy('price');

        return view('products.index2', compact('expensiveProducts'));
    }
     // Afficher le formulaire de création
     public function create()
     {
         return view('products.create');
     }
 
     // Enregistrer un nouveau produit
     public function store(Request $request)
     {
         $request->validate([
             'name' => 'required|string|max:255',
             'description' => 'nullable|string',
             'price' => 'required|numeric|min:0',
             'quantity' => 'required|integer|min:0',
         ]);
         //verifie les donnees avant de les enregistrer
         Product::create($request->all());
         
//supprime la clé prduct de la cache pur forcer une actualisation
         // Invalider la cache après l'ajout d'un nouveau produit
         Cache::forget('products');
 
         return redirect()->route('products.index')->with('success', 'Produit créé avec succès.');
     }
 
     // Afficher un produit spécifique
     public function show(Product $product)
     {
         return view('products.show', compact('product'));
     }
   // Afficher le formulaire d'édition
   public function edit(Product $product)
   {
       return view('products.edit', compact('product'));
   }

   // Mettre à jour un produit
   public function update(Request $request, Product $product)
   {
       $request->validate([
           'name' => 'required|string|max:255',
           'description' => 'nullable|string',
           'price' => 'required|numeric|min:0',
           'quantity' => 'required|integer|min:0',
       ]);

       $product->update($request->all());

       // Invalider la cache après la mise à jour
       Cache::forget('products');
       return redirect()->route('products.index2')->with('success', 'Produit mis à jour avec succès.');
    }

    // Supprimer un produit
    public function destroy(Product $product)
    {
        $product->delete();

        // Invalider la cache après la suppression
        Cache::forget('products');

        return redirect()->route('products.index2')->with('success', 'Produit supprimé avec succès.');
    }

}