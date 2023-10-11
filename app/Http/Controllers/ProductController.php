<?php

namespace App\Http\Controllers;

use App\Product;
use App\Supplier;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $title = 'Lista de Produtos';
        $header = ['Código', 'Nome', 'Fornecedor', 'Valor', 'Ação'];
        $perPage = 5; 
        $page = $request->get('page', 1);
        $products = Product::skip(($page - 1) * $perPage)->take($perPage)->get();
        $count = Product::count();

        foreach ($products as $index => $product) {
            $name_supplier = Supplier::find($product['id_supplier'])->name;
            if ($name_supplier) {
                $products[$index]['id_supplier'] = $name_supplier;
            }
        }
        return view('site.products', compact('header', 'products', 'title', 'count', 'perPage', 'page'));
    }
    public function form()
    {
        $title = 'Cadastro de Produto';
        $suppliers = Supplier::all()->toArray();

        if (isset($_POST) && !empty($_POST)) {
            Product::create([
                'name' =>  $_POST['name'],
                'value' => floatval($_POST['value']),
                'id_supplier' => $_POST['id_supplier'],
            ]);
            return redirect('/products');
        }
        return view('auth.form.product', compact('title', 'suppliers'));
    }

    public function edit(Request $request)
    {
        $title = 'Editar Produto';
        $id = $request->get('id');
        if(empty($id)){
            return 'Não foi possível editar o produto!';
        }
        $product = Product::find($id);
        $suppliers = Supplier::all()->toArray();
        if (isset($_POST) && !empty($_POST)) {
            $product->fill([
                'name' =>  $_POST['name'],
                'value' => floatval($_POST['value']),
                'id_supplier' => $_POST['id_supplier'],
            ]);
            $product->save();
            return redirect('/products');
        }
        return view('auth.form.product', compact('title', 'product', 'suppliers'));
    }

    public function delete(Request $request)
    {
        $id = $request->get('id');
        if(empty($id)){
            return 'Não foi possível excluir o produto!';
        }
        $product = Product::find($id);
        $product->delete();
        return redirect('/products');
    }
}
