<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\carros;
use App\Models\pessoas;
use App\Models\revisaos;
use Illuminate\Support\Facades\DB;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $objpessoa;
    private $objcarro;
    private $objrevisao;

    public function __construct()
    {
        $this->objpessoa=new pessoas();
        $this->objcarro=new carros();
        $this->objrevisao=new revisaos();
    }

     
    public function index()

    {
        $cliente=$this->objpessoa->all();
        $carros=$this->objcarro->all();
        return view('carros',compact('carros'), compact('cliente'));
    }
   

    public function tabcarros()
    {
        $carros = DB::table('carros')
            ->join('pessoas', 'proprietario', '=', 'n_cpf')
            ->select('pessoas.a_name', 'pessoas.sexo','carros.placa','carros.modelo')
            ->orderBy('pessoas.a_name')
            ->get();

            $masculino = DB::table('pessoas')->where('sexo','Masculino')
            ->join('carros', 'n_cpf', '=', 'proprietario')
            ->select('pessoas.sexo','carros.modelo')
            ->get();

            $nm=count($masculino);

            $feminino = DB::table('pessoas')->where('sexo','Feminino')
            ->join('carros', 'n_cpf', '=', 'proprietario')
            ->select('pessoas.sexo','carros.modelo')
            ->get();

            $nf=count($feminino);
            
            $marca=DB::table('carros')
            ->selectRaw('count(*) AS N, n_fabricante')
            ->groupBy('carros.n_fabricante')
            ->orderBy('N','DESC')
            ->get();

            return view('tabcarros',compact('nm','carros', 'nf','feminino','marca'));
        
    }

    public function tab2carros()
    {
        $marcaf=DB::table('pessoas')->where('sexo','Feminino')
            ->join('carros', 'n_cpf', '=', 'proprietario')
            ->select(
                DB::raw('count(*) AS N'),
                DB::raw('n_fabricante'))
            ->groupBy('carros.n_fabricante')
            ->orderBy('N','DESC')
            ->get();

            $marcam=DB::table('pessoas')->where('sexo','Masculino')
            ->join('carros', 'n_cpf', '=', 'proprietario')
            ->select(
                DB::raw('count(*) AS N'),
                DB::raw('n_fabricante'))
            ->groupBy('carros.n_fabricante')
            ->orderBy('N','DESC')
            ->get();



        return view('tab2carros' , compact('marcaf','marcam'));
    }

    public function Grafico()
    {
        $data= DB::table('carros')
        ->join('pessoas','proprietario', '=', 'n_cpf')
        ->select(
            DB::raw('count(*) as N'),
            DB::raw('a_name as a_name'))

        ->groupBy('a_name')
        ->get();
        $array[]=['a_name', 'N'];
        foreach($data as $key => $value)
        {
            $array[++$key]=[$value->a_name, $value->N];
        }

        return view('Graficos.Gráfico1')->with('pessoa',json_encode($array));
    }


    public function Grafico2()
    {
        $data= DB::table('carros')
        ->join('pessoas','proprietario', '=', 'n_cpf')
        ->select(
            DB::raw('count(*) as N'),
            DB::raw('sexo as sexo'))

        ->groupBy('sexo')
        ->get();

        $array[]=['sexo', 'N'];
        foreach($data as $key => $value)
        {
            $array[++$key]=[$value->sexo, $value->N];
        }

        return view('Graficos.Gráfico2')->with('sexo',json_encode($array));
    }

    public function Grafico3()
    {
        $data= DB::table('carros')
        ->select(
            DB::raw('count(*) as N'),
            DB::raw('n_fabricante as marca'))

        ->groupBy('marca')
        ->get();

        $array[]=['marca', 'N'];
        foreach($data as $key => $value)
        {
            $array[++$key]=[$value->marca, $value->N];
        }

        return view('Graficos.Gráfico3')->with('marca',json_encode($array));
    }

    public function Grafico4()
    {
        $data=DB::table('pessoas')->where('sexo','Masculino')
            ->join('carros', 'n_cpf', '=', 'proprietario')
            ->select(
                DB::raw('count(*) AS N'),
                DB::raw('n_fabricante as marca'))
            ->groupBy('carros.n_fabricante')
            ->get();

        $array[]=['marca', 'N'];
        foreach($data as $key => $value)
        {
            $array[++$key]=[$value->marca, $value->N];
        }

        return view('Graficos.Gráfico4')->with('marca',json_encode($array));
    }

    public function Grafico5()
    {
        $data=DB::table('pessoas')->where('sexo','Feminino')
            ->join('carros', 'n_cpf', '=', 'proprietario')
            ->select(
                DB::raw('count(*) AS N'),
                DB::raw('n_fabricante as marca'))
            ->groupBy('carros.n_fabricante')
            ->get();

        $array[]=['marca', 'N'];
        foreach($data as $key => $value)
        {
            $array[++$key]=[$value->marca, $value->N];
        }

        return view('Graficos.Gráfico5')->with('marca',json_encode($array));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'proprietario'=>'required',
            'placa'=>'required',
            'modelo'=>'required',
            'ano'=>'required',
            'n_fabricante'=>'required',
            'Renavan'=>'required',
        ]);
        $car = new carros;

        $car->proprietario = $request->input ('proprietario');
        $car->placa = $request->input ('placa');
        $car->modelo = $request->input ('modelo');
        $car->ano = $request->input ('ano');
        $car->n_fabricante = $request->input ('n_fabricante');
        $car->Renavan = $request->input ('Renavan');

        $car->save();

        return redirect('carros')->with('Cadastrado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $carros=$this->objcarro->find($id);
        $pessoas=$this->objpessoa->all();
        return view('editacarro', compact('carros','pessoas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->objcarro->where(['id'=>$id])->update([
            'proprietario'=>$request->proprietario,
            'placa'=>$request->placa,
            'modelo'=>$request->modelo,
            'ano'=>$request->ano,
            'n_fabricante'=>$request->n_fabricante,
            'Renavan'=>$request->Renavan
        ]);

        return redirect('carros');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del=$this->objcarro->destroy($id);
        return($del)?"sim":"não";
    }
}
