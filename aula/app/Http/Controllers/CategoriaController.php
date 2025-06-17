<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

//Importando informações do banco de dados para colocar no postman
use Illuminate\Support\Facades\DB;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = Categoria::where('id_categoria','>',0)->orderBy('nome_categoria','asc')->get();

        return view('categoria', compact('categorias'));
        //$categorias = Categoria::all();      
        //return view('categoria', compact('categorias'));
       /* echo "Categoria";
        $categorias = Categoria::all();      
        foreach($categorias as $cat){
        echo "<h1> $cat->id_categoria </h1>";
        } */
}

public function indexApi(){
    $categoria = Categoria::all();        
    return $categoria;   
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
        $categoria = new Categoria();
            $categoria->nome_categoria = $request->txNome;
            $categoria->descricao = $request->txDescricao;

            $categoria ->save();

            return redirect('/categoria');
    }

    //afazer insert na api pelo Postman
    public function storeApi(Request $request)
    {
        $categoria = new Categoria();
        $categoria->nome_categoria = $request->nome_categoria;
        $categoria->descricao = $request->descricao;

        $categoria ->save();
        
        return response()->json([
            'message'=> 'Categoria criada com successo',
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
        Categoria::where('id_categoria',$id)->delete();
        
        return response()->json([
            'message'=> "Categoria removida com sucesso",
            'code'=>200]
        );        
    }

    //update
    public function updateapi(Request $request, $id)
    {
        Categoria::where('id_categoria',$id)->update([
            'nome_categoria' => $request->nome_categoria,
            'descricao' => $request->descricao,
        ]);
        
        return response()->json([
            'message'=> 'Dados alterados com sucesso',
            'code'=>200]
        );
    }

    
    public function totalCategorias(){
        $sql = 'select count(*) quantidade from tbcategoria'; //all
    
        $resposta = DB::select($sql);
    
        return $resposta;
    }

}
