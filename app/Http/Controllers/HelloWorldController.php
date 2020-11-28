<?php
#controller é para fluxo de dados. Interação entre view e models.
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloWorldController extends Controller
{
    public function index(){
        $helloWorld = 'Olá Mundo! Meu primeiro exemplo em Lavarel! Controllers';
        return view(
            'hello_word.index',
            compact('helloWorld')
        );
    }
}
