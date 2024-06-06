<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $categories = Category::all();
        $query = Product::query();

        if ($request->has('category') && $request->has('type')) {
            $categoryName = $request->category;
            $typeName = $request->type;

            $query->whereHas('category', function ($query) use ($categoryName, $typeName) {
                $query->where('name', $categoryName)->where('type', $typeName);
            });
        } elseif ($request->has('category')) {
            $categoryName = $request->category;

            $query->whereHas('category', function ($query) use ($categoryName) {
                $query->where('name', $categoryName);
            });
        } elseif ($request->has('type')) {
            $typeName = $request->type;

            $query->whereHas('category', function ($query) use ($typeName) {
                $query->where('type', $typeName);
            });
        }

        $products = $query->paginate(9);

        return view('products.index', compact('categories', 'products'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $categories = Category::all();
        $product = Product::findOrFail($id);

        return view('products.show', compact('product', 'categories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
