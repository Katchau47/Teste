<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\carros;
use App\Models\pessoas;
use App\Models\revisaos;
use Illuminate\Support\Facades\DB;

class RevController extends Controller
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
        $revisao=$this->objrevisao->all();
        $carros=$this->objcarro->all();
        $pessoas=$this->objpessoa->all();
        return view('revisao',compact('revisao'), compact('carros','pessoas'));
    }
   

    public function tabrevis()
    {
        $marca=DB::table('revisaos')
        ->join('carros','carro', '=','placa')    
        ->select(
                DB::raw('count(*) AS N'),
                DB::raw('n_fabricante as marca'))
            ->groupBy('marca')
            ->get();

        $proprietario=DB::table('revisaos')
            ->join('carros','carro', '=','placa')
            ->selectRaw('count(*) AS N, proprietario')
            ->groupBy('proprietario')
            ->orderBy('N','DESC')
            ->get();


        return view('tabrevis',compact('marca','proprietario'));
    }

    public function Grafico()
    {
        $data=DB::table('revisaos')
        ->join('carros','carro', '=','placa')    
        ->select(
                DB::raw('count(*) AS N'),
                DB::raw('n_fabricante as marca'))

            ->groupBy('marca')
            ->get();

        $array[]=['marca', 'N'];
        foreach($data as $key => $value)
        {
            $array[++$key]=[$value->marca, $value->N];
        }

        return view('Graficos.Gráficorev1')->with('marca',json_encode($array));

    }

    public function Grafico2()
    {
        $data=DB::table('revisaos')
        ->join('carros','carro', '=','placa')
        ->join('pessoas','proprietario', '=','n_cpf')
        ->select(
            DB::raw('count(*) AS N'),
            DB::raw('a_name AS name'),
            DB::raw('proprietario'))
        ->groupBy('proprietario')
        ->get();


        $array[]=['name', 'N'];
        foreach($data as $key => $value)
        {
            $array[++$key]=[$value->name, $value->N];
        }

        return view('Graficos.Gráficorev2')->with('pessoa',json_encode($array));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
            'carro'=>'required',
            'cpf'=>'required',
            'fabricante'=>'required',
            'preco'=>'required',
            'pneus'=>'required',
            'motor'=>'required',
            'freios'=>'required',
            'suspensao'=>'required',
            'iluminacao'=>'required',
        ]);
        $rev = new revisaos;

        $rev->carro = $request->input ('carro');
        $rev->cpf = $request->input ('cpf');
        $rev->fabricante = $request->input ('fabricante');
        $rev->motor = $request->input ('motor');
        $rev->freios = $request->input ('freios');
        $rev->suspensao = $request->input ('suspensao');
        $rev->iluminacao = $request->input ('iluminacao');
        $rev->pneus = $request->input ('pneus');
        $rev->preco = $request->input ('preco');

        $rev->save();

        return redirect('revisao')->with('Cadastrado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $revisao=$this->objrevisao->find($id);
        $carros=$this->objcarro->all();
        $pessoas=$this->objpessoa->all();
        return view('editarev', compact('revisao','carros', 'pessoas'));
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
        $this->objrevisao->where(['id'=>$id])->update([
            'carro'=>$request->carro,
            'cpf'=>$request->cpf,
            'fabricante'=>$request->fabricante,
            'pneus'=>$request->pneus,
            'motor'=>$request->motor,
            'freios'=>$request->freios,
            'suspensao'=>$request->suspensao,
            'iluminacao'=>$request->iluminacao,
            'preco'=>$request->preco,
        ]);

        return redirect('revisao');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del=$this->objrevisao->destroy($id);
        return($del)?"sim":"não";
    }
}
