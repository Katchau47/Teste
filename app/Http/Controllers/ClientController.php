<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\carros;
use App\Models\pessoas;
use App\Models\revisaos;
use Illuminate\Support\Facades\DB;
class ClientController extends Controller
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
        $pessoas=pessoas::all();
        return view('pessoas',array('pessoas' => $pessoas));
    }
   

    public function tabclient()
    {
        $Med = DB::table('pessoas')->select(
                DB::raw('sexo'),
                DB::raw('count(*) AS N'),
                DB::raw('(SUM(Data_de_nascimento)/count(*)) as sum'))
            ->groupBy('sexo')
            ->get();

        $pesm= DB::table('pessoas')->where('sexo','Masculino')
        ->select(
            DB::raw('sexo'),
            DB::raw('a_name'),
            DB::raw('Data_de_nascimento'))
            ->orderBy('sexo')   
            ->get(); 

            $pesf= DB::table('pessoas')->where('sexo','Feminino')
        ->select(
            DB::raw('sexo'),
            DB::raw('a_name'),
            DB::raw('Data_de_nascimento'))
            ->orderBy('sexo')   
            ->get();         
        return view('tabpessoas', compact('Med','pesm','pesf'));
    }

    public function Grafico()
    {
        $data= DB::table('pessoas')->select(
                DB::raw('sexo AS sex'),
                DB::raw('count(*) AS N'),
                DB::raw('(SUM(Data_de_nascimento)/count(*)) as med'))
            ->groupBy('sexo')
            ->get();

        return view('Graficos.Gráficopes', ['med' => $data]);

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
            'a_name'=>'required',
            'n_cpf'=>'required',
            'email'=>'required',
            'sexo'=>'required',
            'Data_de_nascimento'=>'required',
            'Telefone'=>'required',
        ]);
        
        $pes = new pessoas;

        $pes->a_name = $request->input ('a_name');
        $pes->n_cpf = $request->input ('n_cpf');
        $pes->email = $request->input ('email');
        $pes->sexo = $request->input ('sexo');
        $pes->Data_de_nascimento = $request->input ('Data_de_nascimento');
        $pes->Telefone = $request->input ('Telefone');

        $pes->save();

        return redirect('clientes');
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
        //recupera cliente pelo id
        $pessoas=$this->objpessoa->find($id);
        return view('editapessoa', compact('pessoas'));
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
        $this->objpessoa->where(['id'=>$id])->update([
            'a_name'=>$request->a_name,
            'n_cpf'=>$request->n_cpf,
            'email'=>$request->email,
            'sexo'=>$request->sexo,
            'Data_de_nascimento'=>$request->Data_de_nascimento,
            'Telefone'=>$request->Telefone
        ]);

        return redirect('clientes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del=$this->objpessoa->destroy($id);
        return($del)?"sim":"não";
    }
}
