<!DOCTYPE html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Departamento</title>
</head>
<body>
    <h1>Cadastro Departamento</h1>

    <br>
    <a href="{{route('departamento.listar')}}">Listar Departamento</a>
    <br>

    @if(session('success'))
        <p style="color:green">{{ session('success')}}</p>
    @endif

    <form action="{{route('departamento.salvar') }}" method="POST">
        @csrf
        <label for="nome">Nome: </label>
        <input type="text" name="nome" id="nome" placeholder="Nome..."
            require value="{{ old('nome') }}"
        >
        <br><br>
        <label for="data_criaçao">Data de Criação: </label>
        <input type="date" name="data_criaçao" id="data_criaçao" placeholder="Data criação..."
            required value="{{ old('data_criaçao')}}"
        >

        <br><br>
        <label for="pais">Pais: </label>
        <input type="text" name="pais" id="pais" placeholder="pais..."
            required value="{{ old('pais')}}"
        >

        <br><br>
        <label for="orcamento">Orçamento: </label>
        <input type="number" name="orcamento" id="orcamento" placeholder="Orçamento..."
            value="{{ old('orcamento')}}"
        >

        <br><br>
        <label for="sigla">Sigla: </label>
        <input type="text" name="sigla" id="sigla" placeholder="Sigla..."
            value="{{ old('sigla')}}"
        >

        <input type="submit" value="Cadastrar">
    </form>

    @if($errors->any())
        <div style="color:red">
            <ul>
                @foreach ($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</body>
</html>