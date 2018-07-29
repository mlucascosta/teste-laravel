<?php

namespace App\Http\Controllers;

use App\Sintegra;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AppController extends Controller
{

    private $app;

    public function __construct(Sintegra $app){
        $this->app = $app;
    }

    public function index(){
        return view('app.home');
    }

    public function curlExec($url, $post = NULL, array $header = array()){
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        if(count($header) > 0) {
            curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        }
        if($post !== null) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        }
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $data = curl_exec($ch);
        curl_close($ch);
        return $data;
    }

    public function consulta($cnpj){
        $resultado = $this->curlExec("http://receitaws.com.br/v1/cnpj/".$cnpj);
        return $resultado;
    }

    public function store(Request $request){
        $id_usuario = $request->input('id_usuario');
        $cnpj = $request->input('cnpj');
        $json = json_decode($this->consulta($cnpj));

        $dados = ['id_usuario' => $id_usuario, 'cnpj' => $cnpj, 'json' => json_encode($json)];


        Sintegra::create($dados);
        return redirect()->route('app.listar');
    }

    public function listar(){
        $empresas = $this->app->paginate(10);
        return view('app.listar', compact('empresas'));
    }

    public function destroy($id){
        $this->app->find($id)->delete();
        return redirect()->route('app.listar');
    }


}
