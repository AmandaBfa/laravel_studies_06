<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $results = Product::all()->toArray();

        // // buscar todos os dados dos produtos
        // $results = Product::all(); // SELLECT * FROM products;
        // echo "<pre>";
        // print_r($results);


        // echo $results[0]->product_name;

        // foreach ($results as $product) {
        //     echo $product->product_name . "<br>";
        // }


        // // buscar todos os dados com um array associativo
        // $results = Product::all()->toArray(); // SELLECT * FROM products;
        // echo "<pre>";
        // print_r($results);

        // // retornar os resultados como um array de objetos stdClass
        // $results = $this->ArrayOfObject(Product::all()->toArray());
        // $this->showData($results);

        // // buscar produtos ordernados por nome alfabéticamente
        // $results = Product::orderBy('product_name')->get()->toArray();
        // $this->showData($results);

        // // buscar os tres primeiros produtos
        // $results = Product::limit(3)->get()->toArray();
        // $this->showData($results);

        // // buscar um produto pelo seu ID
        // $results = Product::find(10)->toArray();
        // $this->showData($results);

        $this->showData($results);
    }

    private function showData($data)
    {
        echo "<pre>";
        print_r($data);
    }

    private function ArrayOfObject($data)
    {
        $tmp = [];
        foreach ($data as $key => $value) {
            $tmp[] = (object) $value; // converte o array associativo em um objeto
        }
        return $tmp;
    }
}
