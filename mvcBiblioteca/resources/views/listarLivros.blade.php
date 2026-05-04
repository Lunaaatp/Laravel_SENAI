<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LIVROS</title>
</head>
<body>
    <h1>Relatório de Livros</h1>
    <a href="{{route('livro.cadastro')}}">Cadastrar Livro</a>
    <br>
    <a href="{{route('editora.cadastro')}}">Cadastrar Editora</a>
    <br>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>NOME</th>
                <th>AUTOR</th>
                <th>DESCRIÇÃO</th>
                <th>NUM_PAGINAS</th>
                <th>DATA_PUBLIC</th>
                <th>Atualizar</th>
                <th>Deletar</th>
            </tr>
        </thead>
        <tbody>
            @forelse($livros as $livro)
                <tr>
                    <td>{{ $livro->id }}</td>
                    <td>{{ $livro->nome }}</td>
                    <td>{{ $livro->autor }}</td>
                    <td>{{ $livro->detalhesProdutos?->descricao}}</td>
                    <td>{{ $livro->detalhesProdutos?->num_paginas}}</td>
                    <td>{{ $livro->detalhesProdutos?->data_public}}</td>
                    <td>
                        <a href="{{route('livro.atualizar', $livro->id)}}">Atualizar</a>
                    </td>
                    <td>
                        <form action="{{ route('livro.deletar', $livro->id)}}" method="POST"
                            onsubmit="return confirm('Deseja realmente excluir');">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Excluir</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3"> Nenhum Livro encontrado</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>