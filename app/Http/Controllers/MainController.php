<?php

namespace App\Http\Controllers;

// use App\Models\Product;

use App\Models\TesteModel;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $results = TesteModel::all()->toArray();
        echo "<pre>";
        print_r($results);
    }
}
