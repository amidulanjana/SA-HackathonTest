<?php

namespace App\Http\Controllers;

use App\Amila;
use BS_layer\AmilaReg;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\View;
use Symfony\Component\HttpFoundation\Response;

class AmilaController extends Controller
{

    private static $amilaReg;
    function __construct()
    {
        self::$amilaReg = new AmilaReg();
    }

    public function viewAmila(Request $request){
        $name["QQQ"] = self::$amilaReg->getName();
        $name['EEE'] = self::$amilaReg->getAge();

        for($i=0;$i<10;$i++){
            $temp["n_".$i] = 10*$i;
        }
        $name["keys"] = $temp;



       return View::make('amila',$name);
    }

    public function insertToAmila(Request $request){
        $user_1 = new Amila();
        $user_1->name = "DDDD";
        $user_1->address = "dfdfdf";
        $user_1->save();



        return response("OK");
    }

    public function getData(Request $request){
        $user_1 = Amila::find($request->id);
        $data['user'] = $user_1;
        return response()->json($data);
    }

    public function updateAmila(Request $request){
        $user_1=  Amila::whereName($request->name)->first();
        $user_1->delete();

        return response("OK");
    }
}
