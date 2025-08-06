<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Phone;
use App\Models\Product;

class MainController extends Controller
{
    public function index()
    {
        echo "Eloquent Relacionships";
    }

    public function OneToOne()
    {
        // // buscar o telefone de um cliente
        // $client1 = Client::find(12)->phone; // supondo que o cliente com ID 12 exista
        // echo "Telefone do cliente ID: " . $client1->client_id . " é: " . $client1->phone_number;
        // echo "<hr>";

        // // todos os dados do cliente e o telefone dele 
        // $client2 = Client::find(12); // supondo que o cliente com ID 12 exista
        // $phone = $client2->phone->phone_number;
        // echo "<br>";
        // echo "Nome do cliente: " . $client2->client_name . "<br>";
        // echo "Telefone do cliente: " . $phone;
        // echo "<hr>";

        // // todos os dados do cliente e o telefone dele 
        // $client3 = Client::with("phone")->find(12);
        // echo "<br>";
        // echo "Nome do cliente: " . $client3->client_name . "<br>";
        // echo "Telefone do cliente: " . $client3->phone->phone_number;
        // echo "<hr>";

        // se quisermos ir buscar um conjunto de clientes e os seus telefones
        // $clients = Client::with("phone")->get();
        // foreach ($clients as $client) {
        //     echo "<br>";
        //     echo "Nome do cliente: " . $client->client_name . " - ";
        //     echo "Telefone do cliente: " . $client->phone->phone_number;
        //     echo "<br>";
        // }
    }

    public function OneToMany()
    {
        // // buscar o id e o nome do cliente e todos os seus telefones
        // $client1 = Client::find(10); // supondo que o cliente com ID 12 exista
        // $phones = $client1->phones; // pega todos os telefones do cliente
        // echo "Cliente: " . $client1->client_name . "<br>";
        // echo "Telefone(s): <br>";
        // foreach ($phones as $phone) {
        //     echo " - " . $phone->phone_number . "<br>";
        // }

        // // outra forma é usando o método with()
        // $client2 = Client::with('phones')->find(12);
        // echo "<br>";
        // echo "Cliente: " . $client2->client_name . "<br>";
        // echo "Telefone: <br>";
        // foreach ($client2->phones as $phone) {
        //     echo $phone->phone_number . "<br>";
        // }

        // buscar todos os clientes e os seus telefones
        // $clients = Client::with('phones')->get();
        // foreach ($clients as $client) {
        //     echo "<br>";
        //     echo "Cliente: " . $client->client_name . "<br>";
        //     echo "Telefone: <br>";
        //     foreach ($client->phones as $phone) {
        //         echo $phone->phone_number . "<br>";
        //     }
        // }
    }

    public function BelongsTo()
    {
        // // neste método vamos pegar no telefone e descobrir a quem pertence
        // $phone1 = Phone::find(10);
        // $client = $phone1->client;
        // echo "Telefone: " . $phone1->phone_number . "<br>";
        // echo "Pertence ao cliente: " . $client->client_name . "<br>";

        // // outra forma é usando o método with()
        // $phone2 = Phone::with('client')->find(10);
        // echo "<br>";
        // echo "Telefone: " . $phone2->phone_number . "<br>";
        // echo "Pertence ao cliente: " . $phone2->client->client_name . "<br>";

    }

    public function ManyToMany()
    {
        // // buscar um cliente e todos os produtos que ele comprou
        // $client1 = Client::find(1);
        // $products = $client1->products; // pega todos os produtos do cliente
        // echo "Cliente: " . $client1->client_name . "<br>";
        // echo "Produtos comprados: <br>";
        // foreach ($products as $product) {
        //     echo " - " . $product->product_name . "<br>";
        // }
        // echo "<hr>";

        // // buscar todos os clientes que compraram um produto específico
        // $product1 = Product::find(1);
        // $clients = $product1->clients; // pega todos os clientes que compraram o produto
        // echo "Produto: " . $product1->product_name . "<br>";
        // echo "Clientes que compraram: <br>";
        // foreach ($clients as $client) {
        //     echo " - " . $client->client_name . "<br>";
        // }
        // echo "<hr>";
    }

    public function SameResults()
    {
        // // vamos buscar os mesmos resultados, mas sem usar as relações, vamos buscar um cliente e os seus telefones
        // // $client1 = Client::find(1);
        // $phones = Phone::where('client_id', $client1->id)->get(); // pega todos os telefones do cliente
        // echo "Cliente: " . $client1->client_name . "<br>";
        // echo "Telefone(s): <br>";
        // foreach ($phones as $phone) {
        //     echo " - " . $phone->phone_number . "<br>";
        // }
        // echo "<hr>";

        // // vamos buscar todos os produtos que um cliente comprou
        // $client2 = Client::find(1);
        // $products = Product::join('orders', 'products.id', '=', 'orders.product_id')
        //     ->where('orders.client_id', $client2->id)
        //     ->get(); // pega todos os produtos do cliente
        // echo "Cliente: " . $client2->client_name . "<br>";
        // echo "Produtos comprados: <br>";
        // foreach ($products as $product) {
        //     echo " - " . $product->product_name . " - " . $product->price .  "<br>";
        // }
    }

    public function RunningQueries()
    {
        // // vamos buscar um cliente e os seus telefones, mas so queremos os telefones que começa por 8
        // $client1 = Client::find(1);
        // $phones = $client1->phones()->where('phone_number', 'like', '8%')->get(); // pega todos os telefones que começam por 8
        // echo "Cliente: " . $client1->client_name . "<br>";
        // echo "Telefone(s) que começam por 8: <br>";
        // foreach ($phones as $phone) {
        //     echo " - " . $phone->phone_number . "<br>";
        // }

        // // buscar todos os produtos que um cliente comprou, mas so queremos os produtos que custam mais de 50
        // $client2 = Client::find(1);
        // $products = $client2->products()->where('price', '>', 50)->orderBy('product_name')->get(); // pega todos os produtos que custam mais de 50
        // echo "Cliente: " . $client2->client_name . "<br>";
        // echo "Produtos comprados que custam mais de 50: <br>";
        // foreach ($products as $product) {
        //     echo " - " . $product->product_name . " - Preço: " . $product->price . "<br>";
        // }
        // echo "<hr>";

        // vão aárecer produtos repetidos. para evitar isso, podemos usar o método distinct() e vamos ordenar por ordem alfabética do nome
        // $client2 = Client::find(1);
        // $products = $client2->products()
        //     ->where('price', '>', 50)
        //     ->distinct()
        //     ->orderBy('product_name')
        //     ->get();
        // echo "Cliente: " . $client2->client_name . "<br>";
        // echo "Produtos comprados que custam mais de 50: <br>";
        // foreach ($products as $product) {
        //     echo " - " . $product->product_name . " - Preço: " . $product->price . "<br>";
        // }
        // echo "<hr>";
    }

    public function Collections()
    {
        // $clients = Client::take(5)->get();
        // foreach ($clients as $client) {
        //     echo "Nome do cliente: " . $client->client_name . "<br>";
        // }

        //--------------------------------------------------------------------------------------------------------------------------

        // // APPEND - adiciona um método a cada cliente
        // $clients = Client::take(5)->get();
        // $clients->each->append(['client_name_uppercase', 'email_domain']); // adiciona o método client_name_uppercase a cada cliente
        // foreach ($clients as $client) {
        //     $client->client_name_uppercase = strtoupper($client->client_name); // converte o nome do cliente para maiúsculas
        //     $client->email_domain = explode("@", $client->email)[1]; // pega o domínio do email
        // }
        // foreach ($clients as $client) {
        //     echo "Nome do cliente: " . $client->client_name . "<br>";
        //     echo "Nome do cliente em maiúsculas: " . $client->client_name_uppercase . "<br>";
        //     echo "Domínio do email: " . $client->email_domain . "<br>";
        // }
        // echo "<hr>";

        //--------------------------------------------------------------------------------------------------------------------------

        // // CONTAINS
        // $clients = Client::take(5)->get();
        // $result = $clients->contains('client_name', 'Susana Ines Borges'); // verifica se existe um cliente com o nome João
        // var_dump($result);
        // echo "<hr>";

        //--------------------------------------------------------------------------------------------------------------------------

        // // DIFF
        // $clients1 = Client::take(5)->get();
        // $clients2 = Client::take(3)->get();
        // $result = $clients1->diff($clients2)->toArray(); // verifica a diferença entre os dois conjuntos de clientes
        // echo "Diferença entre os dois conjuntos de clientes: <br>";
        // $this->showData($result);
        // echo "<hr>";

        //--------------------------------------------------------------------------------------------------------------------------

        // // INTERSECT
        // $clients1 = Client::take(5)->get();
        // $clients2 = Client::where('id', '>', 3)->take(5)->get();
        // $results = $clients1->intersect($clients2)->toArray(); // verifica a interseção entre os dois conjuntos de clientes
        // echo "Interseção entre os dois conjuntos de clientes: <br>";
        // $this->showData($results);
        // echo "<hr>";

        //--------------------------------------------------------------------------------------------------------------------------

        // // MAKEHIDDEN
        // $clients = Client::take(15)->get();
        // $clients->makeHidden(['id', 'created_at', 'updated_at', 'deleted_at']); // esconde os campos email, created_at e updated_at de cada cliente
        // $this->showData($clients->toArray());

        //--------------------------------------------------------------------------------------------------------------------------
    }

    public function Serialization()
    {
        // // SERIALIZATION
        // $clients = Client::take(10)->get();
        // $clientes = $clients->toArray(); // converte a coleção de clientes em um array
        // $this->showData($clientes);

        // $clients = Client::take(10)->get()->toArray();
        // $this->showData($clients);

        // // converte a coleção de clientes em um array de objetos
        // $client = Client::find(100)->toArray(); // pega o cliente com ID 1 e converte em array
        // $this->showData($client);

        // $clients = Client::take(10)->get()->toJson(JSON_PRETTY_PRINT);
        // echo "<pre>";
        // echo $clients; // exibe o JSON


        // // escondendo campos específicos
        // $clients = Client::take(10)->get()->setHidden(['id', 'active', 'created_at', 'updated_at', 'deleted_at'])->toJson(JSON_PRETTY_PRINT);
        // echo "<pre>";
        // echo $clients; // exibe o JSON com os campos ocultos

        // // mostrando apenas campos específicos
        // $clients = Client::take(10)->get()->setVisible(['client_name', 'email'])->toJson(JSON_PRETTY_PRINT);
        // echo "<pre>";
        // echo $clients; // exibe o JSON com os campos ocultos



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
