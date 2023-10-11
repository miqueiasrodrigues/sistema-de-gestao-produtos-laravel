@extends('layouts.globals')

@section('title')
    {{ $title }}
@endsection

@section('content')
    @component('layouts.components.header')
        <span>{{ $title }}</span>
    @endcomponent
    <div class="button-control">
        <a class="button" style="background-color: #E2AC48" href="{{ route('site.products') }}">Produtos</a>
        <a class="button" style="background-color: #03A696" href="{{ route('auth.form.supplier') }}">Novo Fornecedor</a>
    </div>
    <table>
        <thead>
            <tr>
                @foreach ($header as $index => $name)
                    <th>{{ $name }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @if ($count == 0)
                <tr>
                    <td>Não existe fornecedores cadastrados!</td>
                </tr>
            @endif

            @if($count > 0)
                @foreach ($suppliers as $index => $supplier)
                    <tr>
                        <td>{{ $supplier['id'] }}</td>
                        <td>{{ $supplier['name'] }}</td>
                        <td>{{ $supplier['cnpj'] }}</td>
                        <td>{{ $supplier['email'] }}</td>
                        <td>{{ $supplier['fone'] }}</td>
                        <td>
                            <span>
                                <a class="edit" href="{{ route('auth.form.supplier.edit', ['id'=>$supplier['id']]) }}">Editar</a>
                                <a class="delete" href="{{ route('auth.form.supplier.delete', ['id'=>$supplier['id']]) }}">Excluir</a>
                            </span>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
    <div class="button-control" style="justify-content:center">
        @if ($page > 1)
            <a class="button" href="{{ route('site.suppliers', ['page' => $page - 1]) }}">Voltar</a>
        @endif
        @if ($count > ($page * $perPage))
            <a class="button"  style="background-color: #9AEBA3" href="{{ route('site.suppliers', ['page' => $page + 1]) }}">Avançar</a>
        @endif
    </div>
@endsection
