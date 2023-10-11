<?php

namespace App\Http\Controllers;

use App\Supplier;
use Exception;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index(Request $request)
    {
        $title = 'Lista de Fornecedores';
        $header = ['Código', 'Nome', 'CNPJ', 'E-mail', 'Telefone', 'Ação'];
        $perPage = 5;
        $page = $request->get('page', 1);
        $suppliers = Supplier::skip(($page - 1) * $perPage)->take($perPage)->get();
        $count = Supplier::count();
        return view('site.suppliers', compact('header', 'suppliers', 'title', 'page', 'perPage', 'count'));
    }
    public function form()
    {
        $title = 'Cadastro de Fornecedor';
        if (isset($_POST) && !empty($_POST)) {
            Supplier::create([
                'name' =>  $_POST['name'],
                'email' => mb_strtolower($_POST['email'], "utf-8"),
                'cnpj' => $_POST['cnpj'],
                'fone' => $_POST['fone']
            ]);
            return redirect('/suppliers');
        }
        return view('auth.form.supplier', compact('title'));
    }

    public function edit(Request $request)
    {
        $title = 'Editar Produto';
        $id = $request->get('id');
        if(empty($id)){
            return 'Não foi possível editar o fornecedor!';
        }
        $supplier = Supplier::find($id);
        if (isset($_POST) && !empty($_POST)) {
            $supplier->fill([
                'name' =>  $_POST['name'],
                'email' => mb_strtolower($_POST['email'], "utf-8"),
                'cnpj' => $_POST['cnpj'],
                'fone' => $_POST['fone']
            ]);
            $supplier->save();
            return redirect('/suppliers');
        }
        return view('auth.form.supplier', compact('title', 'supplier'));
    }

    public function delete(Request $request)
    {
        $id = $request->get('id');
        if(empty($id)){
            return 'Não foi possível deletar o fornecedor!';
        }
        $product = Supplier::find($id);
        try {
            $product->delete();
        } catch (Exception $e) {
            return 'Não foi possível deletar o Fornecedor, pois existe produtos associados...';
        }
        return redirect('/suppliers');
    }
}
