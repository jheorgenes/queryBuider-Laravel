<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Database\Query\Builder;
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


        // $results = DB::table('products')
        //             ->where([
        //                 ['price', '>', 50],
        //                 ['product_name', 'like', 'A%']
        //             ])->get();

        // Query mais complexa (usando varios operadores OU)
        // $results = DB::table('products')
        //             ->where('price', '>', '90')
        //             ->orWhere(function(Builder $query) {
        //                 $query->where('product_name', 'Banana')
        //                       ->orWhere('product_name', 'Cereja');
        //             })->get();

        // Buscando todos os produtos que não iniciam com a letra M
        // $results = DB::table('products')->where('product_name', 'not like', 'M%')->get();

        // Buscando todos os produtos que não iniciam com a letra M
        // $results = DB::table('products')->whereNot('product_name', 'like', 'M%')->get();

        // $results = DB::table('clients')
        //             ->whereAny(['client_name', 'email'], 'like', '%va%')->get();

        //between
        // $results = DB::table('products')
        //             ->whereBetween('price', [25,50])->get();

        // Ou usando a negativa do between
        // $results = DB::table('products')
        //             ->whereNotBetween('price', [25,50])->get();

        // Usando a clausula In
        // SELECT * FROM products WHERE id in (1,3,5);
        // $results = DB::table('products')
        //             ->whereIn('id', [1,3,5])->get();

        // $results = DB::table('products')
        //             ->whereNotIn('id', [1,3,5])->get();

        // $results = DB::table('clients')
        //             ->whereDate('created_at', '2032-01-25')->get();

        // $results = DB::table('clients')
        //             ->whereDay('created_at', '10')->get();


        // DADOS AGREGADOS
        // $count = DB::table('products')->count();
        // $max_price = DB::table('products')->max('price');
        // $min_price = DB::table('products')->min('price');
        // $avg_price = DB::table('products')->avg('price'); //Média
        // $sum_prices = DB::table('products')->sum('price');

        // echo '<pre>';
        // print_r([
        //     'count' => $count,
        //     'max_price' => $max_price,
        //     'min_price' => $min_price,
        //     'avg_price' => $avg_price,
        //     'sum_prices' => $sum_prices
        // ]);
        // echo '</pre>';

        // ordenando os produtos por preço decrecente
        // $results = DB::table('products')->orderBy('price', 'desc')->get();

        // ordenando os produtos por preço decrecente e buscando apenas 3 resultados
        $results = DB::table('products')
                        ->orderBy('price', 'desc')
                        ->limit(3)
                        ->get();

        $this->showDataTable($results);
        // $this->showRawData($results);
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
