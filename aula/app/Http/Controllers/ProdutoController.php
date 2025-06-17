<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use Illuminate\Support\Facades\DB;

//caso exista uso de chave estrangeira usar a model correspondente

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // $produtos = Produto::all();      
        //return view('produto', compact('produtos'));

        $produtos = Produto::where('id_produto','>',0)->orderBy('nome_produto','asc')->get();

        return view('produto',compact('produtos')); 

    }

    public function dashboard()
{
    $produtos = Produto::all();

    // Envia os dados para a view
    return view('dashboard', compact('produtos'));
}

    public function indexApi(){
        $produto = Produto::all();        
        return $produto;   
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
        $produto = new Produto();
            $produto->nome_produto = $request->txNome;
            $produto->quantidade = $request->txQuantidade;
            $produto->descricao = $request->txDescricao;
            $produto->valor = $request->txValor;
            $produto->data_cadastro = $request->txCadastro;

            $produto ->save();

            return redirect('/produto');
    }

    public function storeApi(Request $request)
    {
        $produto = new Produto();
        $produto->nome_produto = $request->nome_produto;
        $produto->quantidade = $request->quantidade;
        $produto->descricao = $request->descricao;
        $produto->valor = $request->valor;
        $produto->data_cadastro = $request->data_cadastro;

        $produto ->save();
        
        return response()->json([
            'message'=> 'Produto criado com successo',
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
        Produto::where('id_produto',$id)->delete();
        
        return response()->json([
            'message'=> "Produto removido com sucesso",
            'code'=>200]
        );        
    }

    //update
    public function updateapi(Request $request, $id)
    {
        Categoria::where('id_produto',$id)->update([
            'nome_produto' => $request->nome_produto,
            'quantidade' => $request->quantidade,
            'descricao' => $request->descricao,
            'valor' => $request->valor,
            'data_cadastro' => $request->data_cadastro,

        ]);
        
        return response()->json([
            'message'=> 'Dados alterados com sucesso',
            'code'=>200]
        );
    }

    public function somaProdutos(){
        $sql = 'select SUM(quantidade) AS valor FROM tbProduto';

        $resposta = DB::select($sql);
    
        return $resposta;
    }

    public function maiorQuantidade() {
        $sql = 'SELECT MAX(quantidade) AS quantidade FROM tbProduto';
    
        $resposta = DB::select($sql);
    
        return $resposta;
    }

    //select com as
    public function menorQuantidade() {
        $sql = 'SELECT MIN(quantidade) AS quantidade FROM tbProduto';

        $resposta = DB::select($sql);
    
        return $resposta; 
    }
    
    public function mediaPreco() {
        $sql = 'SELECT AVG(CAST(REPLACE(valor, "R$ ", "") AS DECIMAL(10,2))) AS media_preco FROM tbProduto';

        $resposta = DB::select($sql);

        return $resposta;
    }

}
