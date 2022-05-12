<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Session;

class ApiController extends Controller
{

    public function show($id)
    {

        $response = Http::get('https://jason.dev.br/testecusto');
        $dados = $response->json();
        $valor1 = $dados["data"][0]["price"][$id];
        $valor2 = $dados["data"][1]["price"][$id];
        $valor3 = $dados["data"][2]["price"][$id];

        $menor_valor = min($valor1, $valor2, $valor3);

        if($menor_valor == $valor1){
            $opcao = $dados["data"][0]["label"];
        } elseif($menor_valor == $valor2){
            $opcao = $dados["data"][1]["label"];
        } elseif($menor_valor == $valor3){
            $opcao = $dados["data"][2]["label"];
        }

        echo "O menor preço para " . $id . " unidades é: " . $menor_valor. " (Fornecedor: " . $opcao . ")";  

    }

}
