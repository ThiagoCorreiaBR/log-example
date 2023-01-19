<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
     try{  //tenta executar isso 
        $num1=5;
        $num2=10;
        logger()->debug('Aqui é um log!');

        $soma=$num1+$num2;
        logger()->info('A soma ficou: ',compact('soma'));

        $sub= $num1-$num2;
        logger()->warning('A subtração ficou: ', compact('num1','num2','sub'));

        if($sub<0){
            logger()->error('Valor negativo', compact('sub'));
        }else{
            logger()->critical('Valor positivo');
        }
        return 'Hello world!';
        } catch(Exception $e){// se nao executar faz isso

            logger()->error($e);
            abort(500);
        }
    }

    public function soma($num1,$num2){
        $soma=$num1+$num2;
        logger()->info('Soma feita');

        return $soma;
    }

    public function sub($num1,$num2){
        $sub=$num1-$num2;
        logger()->debug('Sub feita',['num1' => $num1, 'num2' => $num2, 'sub' => $num1-$num2]);
        return $sub;
    }

    public function div($num1,$num2){
        if($num2==0){
            logger()->error('Divisor zero!');
            return "erro";
        }else{
            $div=$num1/$num2;
            logger()->info('Div feita');
            return $div;
        }
    }

    public function mult($num1,$num2){
        if(($num1<0)or($num2<0)){
            logger()->warning('Negativo');
            return 'Neg';
        }else{
            return 'Hello world';
        }
        
    }
}
