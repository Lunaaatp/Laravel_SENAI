<!DOCTYPE html>
<html lang="{{ str_replace('_','-', app()->getLocale())}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Atualizar Livro</title>
</head>
<body>
    <h1>Atualizar Livro</h1>

    @if(session('sucess'))
        <p style="color:green">{{session('success')}}</p>
    @endif

    <form action="{{ route('livro.update', $livro->id)}}" method="POST">
        @csrf
        @method('PUT')

        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" placeholder="Nome..."
            required value="{{old'nome', $livro->nome}}">

        <br></br>
        <label for="autor">Autor:</label>
        <input type="text" name="autor" id="autor" placeholder="Autor..."
            required value="{{old'autor', $livro->autor}}">

        <br></br>
        <label for="descricao">Descrição:</label>
        <input type="text" name="descricao" id="descricao" placeholder="Descrição..."
            required value="{{old'descricao', $livro->descricao}}">

        <br></br>
        <label for="num_paginas">Número de Páginas:</label>
        <input type="num" name="num_paginas" id="num_paginas" placeholder="Número de Páginas..."
            required value="{{old'num_paginas', $livro->num_paginas}}">

        <br></br>
        <label for="data_public">Data de Publicação:</label>
        <input type="date" name="data_public" id="data_public" placeholder="Data de Publicação..."
            required value="{{old'data_public', $livro->data_public}}">

        <br><br>
        <label for="editora_id">Editora: </label>
        <select name="editora_id" id="editora_id">
            @foreach ($editoras as $editora)
                <option value="{{ $editora->id }}"
                    {{ $livro->editora_id == $editora->id ? 'selected' : '' }}>
                    {{ $editora->nome }}
                </option>
            @endforeach
        </select>

        <button type="submit">Atualizar</button>
    </form>

    @if($errors->any())
        <div style="color: red">
            <ul>
                @foreach ($errors->all() as $erro)
                <li>{{$erro}}</li>
                @endforeach
            </ul>
        </div>
    @endif
</body>
</html>