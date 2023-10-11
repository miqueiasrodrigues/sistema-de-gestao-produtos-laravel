@extends('layouts.globals')

@section('title')
    {{ $title }}
@endsection

@section('content')
    @component('layouts.components.header')
        <span>{{ $title }}</span>
    @endcomponent
    <div class="button-control">
        <a class="button" style="background-color: #E2AC48"  href="{{ route('site.suppliers') }}">Fornecedores</a>
        <a class="button" style="background-color: #03A696" href="{{ route('auth.form.product') }}">Novo Produto</a>
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
                    <td>Não existe produtos cadastrados!</td>
                </tr>
            @endif


            @if($count > 0)
                @foreach ($products as $index => $product)
                    <tr>
                        <td>{{ $product['id'] }}</td>
                        <td>{{ $product['name'] }}</td>
                        <td>{{ $product['id_supplier'] }}</td>
                        <td>{{ number_format($product['value'], 2, ',', '.') }}</td>
                        <td>
                            <span>
                                <a class="edit" href="{{ route('auth.form.product.edit', ['id' => $product['id']]) }}">Editar</a>
                                <a  class="delete" href="{{ route('auth.form.product.delete', ['id' => $product['id']]) }}">Excluir</a>
                            </span>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
    <div class="button-control" style="justify-content:center">
        @if ($page > 1)
            <a class="button" href="{{ route('site.products', ['page' => $page - 1]) }}">Voltar</a>
        @endif
        @if ($count > $page * $perPage)
            <a class="button"  style="background-color: #9AEBA3" href="{{ route('site.products', ['page' => $page + 1]) }}">Avançar</a>
        @endif
    </div>
@endsection
