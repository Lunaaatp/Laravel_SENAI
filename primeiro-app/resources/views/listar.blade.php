<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista de Produtos</title>
</head>
<body>
    <h1>Relatório de Produtos</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <TH>NOME</TH>
                <TH>VALOR</TH>
                <TH>COR</TH>
                <TH>atualizar</TH>
            </tr>
        </thead>
        <tbody>
            @forelse ($produtos as $produto)
                <tr>
                    <td>{{$produto->id}}</td>
                    <td>{{$produto->nome}}</td>
                    <td>{{$produto->valor}}</td>
                    <td>{{$produto->cor}}</td>
                    <td>
                        <a href="{{route('produto.atualizar', $produto->id)}}">Atualizar</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">Nenhum Produto encontrado</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    
</body>
</html>