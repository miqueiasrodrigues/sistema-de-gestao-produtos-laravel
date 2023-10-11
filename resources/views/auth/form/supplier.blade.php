@extends('layouts.globals')

@section('title')
    {{ $title }}
@endsection

@section('content')
    @component('layouts.components.header')
        <span>{{ $title }}</span>
    @endcomponent

    <form name="form" class="form" action="{{ isset($supplier) ? route('auth.form.supplier.edit', ['id' => $supplier['id']]) : route('auth.form.supplier') }}" method="POST">
        @csrf
        <label>Nome:</label>
        <input name="name" type="text" value="{{ isset($supplier['name']) ? $supplier['name'] : '' }}" />
        <label>CNPJ:</label>
        <input name="cnpj" type="text" value="{{ isset($supplier['cnpj']) ? $supplier['cnpj'] : '' }}" />
        <label>E-mail:</label>
        <input name="email" type="text" value="{{ isset($supplier['email']) ? $supplier['email'] : '' }}" />
        <label>Telefone:</label>
        <input name="fone" type="text" value="{{ isset($supplier['fone']) ? $supplier['fone'] : '' }}" />
    </form>

    <div class="button-control">
        <a href="javascript:form.submit()"  style="background-color: #9AEBA3" class="button">Salvar</a>
        <a class="button" href="{{ route('site.suppliers') }}">Cancelar</a>
    </div>
@endsection
