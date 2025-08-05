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


        // ------------------------------------------------------------------------

        // // usar a cláusula where para filtrar os produtos
        // $results = Product::where('price', '>=', 70)->get()->toArray();

        // // buscar apenas o primerio resultado
        // $results = Product::where('price', '>=', 70)->first()->toArray();

        // // buscar apenas o primerio elemento se ele existir, caso contrário retornar um array vazio
        // $results = Product::where('price', '>=', 190)
        //     ->firstOr(function () {
        //         return [];
        //     });

        // // buscar apenas o primerio elemento se ele existir, caso contrário retornar um array vazio
        // $results = Product::where('price', '>=', 190)
        //     ->firstOr(function () {
        //         return [];
        //     });
        // $this->showData($results);


        // ------------------------------------------------------------------------

        // $product = Product::find(10); // busca o produto com ID 10
        // echo "Nome do produto: " . $product->product_name . "<br>";
        // echo "Preço do produto: " . $product->price . "<br>";

        // echo "<br>";

        // $product->price = 200; // define um novo preço apenas no código, não no banco de dados
        // echo "Novo preço do produto: " . $product->price . "<br>";

        // echo "<br>";

        // $product->refresh(); // volta ao preço original do produto no banco de dados
        // echo "Preço origianl do produto: " . $product->price . "<br>";


        // ------------------------------------------------------------------------

        $product = Product::find(10); // busca o produto com ID 10
        echo " 1. Nome do produto: " . $product->product_name . "<br>";
        echo "<hr>";

        $product = Product::where('price', '>=', 70)->first();
        echo " 2. " . $product->product_name . ' tem um preço de ' . $product->price . '<br>';
        echo "<hr>";

        $product = Product::firstWhere('price', '>=', 60);
        echo " 3. " . $product->product_name . ' tem um preço de ' . $product->price . '<br>';
        echo "<hr>";

        $product = Product::findOr(100, function () {
            echo " 4. Produto não encontrado!<br>";
        });
        if ($product) {
            echo " 4. " . $product->product_name . ' tem um preço de ' . $product->price . '<br>';
        }
        echo "<hr>";

        $product = Product::findOrFail(20);
        echo " 5. " . $product->product_name . ' tem um preço de ' . $product->price . '<br>';
        echo "<hr>";

        $total_products = Product::count();
        $produc_max_price = Product::max('price');
        $product_min_price = Product::min('price');
        $product_avg_price = Product::avg('price');
        $product_sum_price = Product::sum('price');

        $results = [
            'total_products' => $total_products,
            'produc_max_price' => $produc_max_price,
            'product_min_price' => $product_min_price,
            'product_avg_price' => $product_avg_price,
            'product_sum_price' => $product_sum_price,
        ];
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
