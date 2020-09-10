<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\carros;
use App\Models\pessoas;
use App\Models\revisaos;
use Illuminate\Support\Facades\DB;

class SiteController extends Controller
{

    public function home(Request $request)
    {
        $data= DB::table('pessoas')
        ->select(
            DB::raw('sexo as sexo'),
            DB::raw('count(*) as N'))
        ->groupBy('sexo')
        ->get();
        $array[]=['sexo', 'N'];
        foreach($data as $key => $value)
        {
            $array[++$key]=[$value->sexo, $value->N];
        }

        return view('welcome')->with('sexo',json_encode($array));
    }
    

}
