<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\View\View;

use App\Models\Product;
use App\Models\Category;

use Illuminate\Support\Facades\Route;

class ProductController extends Controller
{
    public function index(Request $request) {
        $products = Product::with('category')->get();
        $categories = Category::get();

        return view('products', ['products' => $products, 'categories' => $categories]);
    }

    public function product(Request $request) {
        $product_id = Route::current()->parameter('id');
        $product = Product::with('category')
            ->where('id', '=', $product_id)
            ->get();

        return view('product', ['product' => $product[0]]);
    }

    public function search(Request $request) {
        $name_search_query = $request->query('name');
        $price_search_query = $request->query('price');
        $cat_search_query = $request->query('category');

        $products_class = Product::with('category');

        if ($name_search_query) {
            $products_class = $products_class->where('name', 'like', '%'.$name_search_query.'%');
        }

        if ($cat_search_query) {
           $products_class = $products_class->where('category_id', '=', $cat_search_query);
        }

        
        if ($price_search_query) {
            $products_class = $products_class->where('price', '=', $price_search_query);
         }

        $products = $products_class->get();

        $xmlData = '<?xml version="1.0" encoding="UTF-8"?>';
        $xmlData .= '<products>';
    
        foreach ($products as $product) {
            $xmlData .= '<product>';
            $xmlData .= '<name>' . $product->name . '</name>';
            $xmlData .= '<price>' . $product->price . '</price>';
            $xmlData .= '<category>' . $product->category->name . '</category>';
            $xmlData .= '</product>';
        }
    
        $xmlData .= '</products>';
    
        return Response::make($xmlData, '200')->header('Content-Type', 'text/xml');
    }
}

