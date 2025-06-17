<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuario = User::all();

        return view('login', compact('usuario'));
    }

    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user -> password = $request->password;       
        $user->created_at = date('Y-m-d');
        $user->updated_at = date('Y-m-d');        
        $user ->save();

        //Auth::login($user);

      // return redirect('/')->with('mensagem', 'Usuário adicionado com sucesso!');;
    }

    public function verifyUser(Request $request){        

        if($request->only(['email','password'])){        
            return redirect('/login');
        }        
        else{
            return redirect('/dashboard');        
        }
    }

    public function logoutUser(){
        logout();
        return redirect('/login');  
    }

    public function indexapi()
    {        
        $cliente = Cliente::all();
        return $cliente;
        
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

    public function storeapi(Request $request)
    {
        $cliente = new Cliente();

        $cliente->nomeCli = $request->nome;
        $cliente->cpfCli = $request->cpf;
        $cliente->emailCli = $request->email;
        
        $cliente->save();
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

     public function updateapi(Request $request, $id)
    {
        Cliente::where('idcli',$id)->update([
            'nomeCli' => $request->nome,
            'cpfCli' => $request->cpf,
            'emailCli'=> $request->email            
        ]);
        
        return response()->json([
            'message'=> 'Dados alterados com sucesso',
            'code'=>200]
        );
    }

    public function destroyapi($id)
    {     

        Cliente::where('idcli','=',$id)->delete();        

        return "Dados excluídos com sucesso";        
    }
}
