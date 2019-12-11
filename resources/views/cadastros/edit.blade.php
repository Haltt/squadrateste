@extends('cadastros.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Product</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('cadastros.index') }}"> Back</a>
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
    <form action="{{ route('cadastros.update',$cadastro->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="nome" class="sr-only">Name:</label>
                    <input type="text" name="nome" id="nome" value="{{ $cadastro->nome }}" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="valor" class="sr-only">Valor:</label>
                    <input type="text" name="valor" id="valor" value="{{ $cadastro->valor }}" data-mask="###0.00" data-mask-reverse="true" class="form-control" placeholder="Valor">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="dataDoCadastro" class="sr-only">Data do Cadastro:</label>
                    <input type="text" name="dataDoCadastro" id="dataDoCadastro" value="{{ $cadastro->dataDoCadastro }}" data-mask="00/00/0000 00:00:00" class="form-control" placeholder="Data do Cadastro">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="descricao" class="sr-only">Descrição:</label>
                    <textarea class="form-control" style="height:150px" name="descricao" id="descricao" placeholder="Descrição">{{ $cadastro->descricao }}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Atualizar</button>
            </div>
        </div>
    </form>
@endsection
