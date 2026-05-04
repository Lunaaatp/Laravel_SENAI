<!DOCTYPE html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Livros</title>
</head>
<body>
    <h1>Cadastro Livros</h1>

    <br>
    <a href="{{route('livro.listar')}}">Listar Livro</a>
    <br>

    @if(session('success'))
        <p style="color:green">{{ session('success')}}</p>
    @endif

    <form action="{{route('livro.salvar') }}" method="POST">
        @csrf
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" placeholder="Nome..."
        require value="{{ old('nome') }}">

        <br></br>
        <label for="autor">Autor:</label>
        <input type="text" name="autor" id="autor" placeholder="Autor..."
        require value="{{ old('autor') }}">

        <br></br>
        <label for="descricao">Descrição:</label>
        <input type="text" name="descricao" id="descricao" placeholder="Descrição..."
        require value="{{ old('descricao') }}">

        <br></br>
        <label for="num_paginas">Número de Páginas:</label>
        <input type="num" name="num_paginas" id="num_paginas" placeholder="Número de Páginas..."
        require value="{{ old('num_paginas') }}">

        <br></br>
        <label for="data_public">Data de Publicação:</label>
        <input type="date" name="data_public" id="data_public" placeholder="Data de Publicação..."
        require value="{{ old('data_public') }}">

        <br></br>
        <label for="editora">Editora:</label>
        <input type="text" name="editora" id="editora" placeholder="Editora..."
        require value="{{ old('editora') }}">
            
        <br></br>
        <label for="custo">Custo:</label>
        <input type="num" name="custo" id="custo" placeholder="Custo..."
        require value="{{ old('custo') }}">

        <br></br>
        <label for="preco_venda">Preço</label>
        <input type="num" name="preco_venda" id="preco_venda" placeholder="Preço..."
        require value="{{ old('preco_venda') }}">
        
        <br></br>
        <label for="impostos">Impostos</label>
        <input type="num" name="impostos" id="impostos" placeholder="Impostos..."
        require value="{{ old('impostos') }}">

        <br></br>
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