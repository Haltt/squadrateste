@extends('cadastros.layout')
@section('content')
    <div class="row mb-2">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Adicionar novo Registro</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('cadastros.index') }}"> Voltar</a>
            </div>
        </div>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('cadastros.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="nome" class="sr-only">Nome:</label>
                    <input type="text" name="nome" id="nome" class="form-control" placeholder="Nome">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="valor" class="sr-only">Valor:</label>
                    <input type="text" name="valor" id="valor" class="form-control" data-mask="###0.00" data-mask-reverse="true" placeholder="Valor">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="dataDoCadastro" class="sr-only">Valor:</label>
                    <input type="text" name="dataDoCadastro" id="dataDoCadastro" class="form-control" data-mask="00/00/0000 00:00:00" placeholder="Data do Cadastro">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="descricao" class="sr-only">Descrição:</label>
                    <textarea class="form-control" style="height:150px" name="descricao" id="descricao" placeholder="Descrição"></textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
        </div>
    </form>
@endsection
