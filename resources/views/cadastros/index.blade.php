@extends('cadastros.layout')
@section('content')
    <div class="row mb-2">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Cadastros</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('cadastros.create') }}"> Novo Cadastro</a>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered">
        <tr>
            <th>#</th>
            <th>Nome</th>
            <th>Valor</th>
            <th>Descrição</th>
            <th width="280px">Ações</th>
        </tr>

        @foreach ($cadastros as $cadastro)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $cadastro->nome }}</td>
                <td>{{ $cadastro->valor }}</td>
                <td>{{ $cadastro->descricao }}</td>
                <td>
                    <form action="{{ route('cadastros.destroy',$cadastro->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('cadastros.show',$cadastro->id) }}">Show</a>
                        <a class="btn btn-primary" href="{{ route('cadastros.edit',$cadastro->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    {!! $cadastros->links() !!}
@endsection
