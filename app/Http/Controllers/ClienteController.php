<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClienteController extends Controller
{
    // Inicializa o array clientes com alguns clientes
    private $clientes = [
        ['id'=>1, 'nome'=>'Pedro'],
        ['id'=>2, 'nome'=>'João'],
        ['id'=>3, 'nome'=>'Ana'],
        ['id'=>4, 'nome'=>'Camila'],
    ];

    public function __construct()
    {
        $clientes = session('clientes');
        if(!isset($clientes))
            session(['clientes' => $this->clientes]); //Cria a variável de sessão 'clientes'
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = session('clientes'); // Recupera os clientes da sessão
        $titulo = 'Lista de Clientes';
        
        // 3 formas de retornar variáveis p/ views
        return view('clientes.index', compact('clientes','titulo')); // ou
        
        //return view('clientes.index', ['clientes' => $clientes,'titulo' => $titulo]);  // ou
        
        // return view('clientes.index')->with('clientes', $clientes)->with('titulo', $titulo); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $clientes = session('clientes');  // Recupera os clientes da sessão

        // Cria um novo cliente
        $id = end($clientes)['id'] + 1; // end() => Recupera o ID do último cliente e acrescenta 1 
        $nome = $request->nome;  // Recupera o nome via request
        
        $cliente = ["id" => $id, "nome" => $nome]; // Cria um 'cliente'

        $clientes[] = $cliente; //Inclui o novo cliente no Array de Clientes

        session(['clientes' => $clientes]); // Atualiza a variável de sessão de clientes

        return redirect()->route('clientes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $clientes = session('clientes');
        $index = $this->getIndex($id, $clientes);  // getIndex() = metodo criado p/ recuperar o Indice do Id procurado
        $cliente = $clientes[$index];

        return view('clientes.info', compact(['cliente']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clientes = session('clientes');
        $index = $this->getIndex($id, $clientes);
        $cliente = $clientes[$index];

        return view('clientes.edit', compact(['cliente']));
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
        $clientes = session('clientes');
        $index = $this->getIndex($id, $clientes);

        $clientes[$index]['nome'] = $request->nome;

        session(['clientes' => $clientes]); // Atualiza a variável de sessão de clientes
        return redirect()->route('clientes.index');
             
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $clientes = session('clientes');
        $index = $this->getIndex($id, $clientes);

        array_splice($clientes, $index, 1); // Apaga 1 único elemento a partir da posição 'index'

        session(['clientes' => $clientes]); // Atualiza a variável de sessão de clientes
        return redirect()->route('clientes.index');
    }

    // Retorna o Indice do Id procurado
    private function getIndex($id, $clientes){
        $ids = array_column($clientes, 'id'); // Recupera todos os ids dos clientes
        $index = array_search($id,$ids); // Retorna o índice do id procurado
        return $index;
    }
    
}
