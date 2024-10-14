<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function index() {
        // devolvendo todos os dados de uma tabela
        // $clients = DB::table('clients')->get();

        // Apresentar um array Associativo
        // $clients = DB::table('clients')->get()->toArray();

        // apresentar num array de arrays associativos
        // $result = DB::table('products')->get()->map(function($item) {
        //     // Transformando cada item em um array
        //     return (array) $item;
        // });

        // Apresentar os dados a partir dos resultados
        // $products = DB::table('products')->get();
        // foreach ($products as $product) {
        //     echo $product->product_name . '<br>';
        // }

        //Obter apenas algumas colunas
        // $results = DB::table('products')->get(['product_name', 'price']);

        //pluck = obter de forma simples os dados de uma coluna específica
        // $results = DB::table('products')->pluck('product_name');

        // desolver apenas a primeira linha de um resultado
        // $results = DB::table('products')->get()->first();

        // desolver apenas a ultima linha de um resultado
        // $results = DB::table('products')->get()->last();

        // devolver produto de acordo com o id
        // $results = DB::table('products')->find(10);

        // select com where
        // $results = DB::table('products')->where('id', 10)->first();

        // select com where utilizando operadores
        // $results = DB::table('products')->where('id', '>=' , 10)->get();

        // $results = DB::table('products')->select('product_name', 'price')->get();

        // $results = DB::table('products')->where('price', '>', 50)->get();

        // $results = DB::table('products')
        //             ->where('price', '>', 50)
        //             ->where('product_name', 'like', 'A%')
        //             ->get();

        // Usando o OU na clausura where
        // $results = DB::table('products')
        //             ->where('price', '>', 80)
        //             ->orWhere('product_name', 'like', 'A%')
        //             ->get();

        // $this->showDataTable($results);
        $this->showRawData($results);
    }

    private function showRawData($data)
    {
        echo '<pre>';
        print_r($data);
        echo '</pre>';
    }

    private function showDataTable($data) {
        echo '<table border="1">';
        echo '<tr>';
        foreach ($data[0] as $key => $value) {
            echo "<th>" . $key . "</th>";
        }
        echo '</tr>';
        foreach ($data as $row) {
            echo '<tr>';
            foreach ($row as $key => $value) {
                echo '<td>' . $value . '</td>';
            }
            echo '</tr>';
        }
        echo '</table>';
    }
}
