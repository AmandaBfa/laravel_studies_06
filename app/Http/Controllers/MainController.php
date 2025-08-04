<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $products = Product::all()->toArray();
        echo "<pre>";
        print_r($products);
        echo "</pre>";
    }
}
