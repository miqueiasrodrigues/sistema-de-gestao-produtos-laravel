@extends('layouts.globals')

@section('title')
    {{ $title }}
@endsection


@section('content')
    @component('layouts.components.header')
        <span>{{ $title }}</span>
    @endcomponent

    <form name="form" class="form"
        action="{{ isset($product) ? route('auth.form.product.edit', ['id' => $product['id']]) : route('auth.form.product') }}"
        method="POST">
        @csrf
        <label>Nome:</label>
        <input name="name" type="text" value="{{ isset($product['name']) ? $product['name'] : '' }}" />
        <label>Valor:</label>
        <input name="value" type="number" value="{{ isset($product['value']) ? $product['value'] : '0' }}" />
        <label>Fornecedor:</label>
        <select name="id_supplier">
            @unless (isset($product))
                <option value="" selected></option>
            @endunless
            @foreach ($suppliers as $index => $supplier)
                <option value="{{ $supplier['id'] }}"
                    {{ isset($product) && $product['id_supplier'] == $supplier['id'] ? 'selected' : '' }}>
                    {{ $supplier['name'] }}
                </option>
            @endforeach
        </select>
    </form>

    <div class="button-control">
        <a href="javascript:form.submit()" style="background-color: #9AEBA3" class="button">Salvar</a>
        <a class="button" href="{{ route('site.products') }}">Cancelar</a>
    </div>
@endsection
