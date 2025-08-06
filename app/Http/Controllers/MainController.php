<?php

namespace App\Http\Controllers;

use App\Models\Client;

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
