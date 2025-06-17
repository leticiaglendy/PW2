<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contato;
use Illuminate\Support\Facades\DB;

class ContatoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$contatos = Contato::all();

         //"chamou" a model exemplo
        //$contatos = Contato::all();        
        //$contatos = Contato::where('idContato',3)->get();
        //$contatos = Contato::where('idContato','>=',3)->get();
        //$contatos = Contato::where('emailContato','=','amaria@gmail.com')->get();
        //$contatos = Contato::where('idContato','>',0)->orderBy('emailContato','desc')->get();  
        $contatos = Contato::where('id_contato','>',0)->orderBy('email','asc')->get();

        return view('contato', compact('contatos'));
    }

    public function indexApi(){
        $contato = Contato::all();        
        return $contato;   
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
        //
        $contato = new Contato();
            $contato->nome = $request->txNome;
            $contato->email = $request->txEmail;
            $contato->telefone = $request->txTelefone;

            $contato ->save();

            return redirect('/contato');
    }
    // criando informações pelo postman
    public function storeApi(Request $request)
    {
        $contato = new Contato();
        $contato->nome = $request->nome;
        $contato->email = $request->email;
        $contato->telefone = $request->telefone;

        $contato ->save();
        
        return response()->json([
            'message'=> 'Contato criado com successo',
            'code'=>200]
        );        
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function destroyApi($id)
    {
        Contato::where('id_contato',$id)->delete();
        
        return response()->json([
            'message'=> "Contato removido com sucesso",
            'code'=>200]
        );        
    }

    //update
    public function updateapi(Request $request, $id)
    {
        Categoria::where('id_contato',$id)->update([
            'nome' => $request->nome,
            'email' => $request->email,
            'telefone' => $request->telefone,

        ]);
        
        return response()->json([
            'message'=> 'Dados alterados com sucesso',
            'code'=>200]
        );
    }

    public function totalContatos(){
        $sql = 'select count(*) quantidade from tbcontato'; //all
    
        $resposta = DB::select($sql);
    
        return $resposta;
    }

    public function listarContatoSql(){
        $sql = 'select * from tbcontato'; //all
    
        $resposta = DB::select($sql);
    
        return $resposta;
    }

}
