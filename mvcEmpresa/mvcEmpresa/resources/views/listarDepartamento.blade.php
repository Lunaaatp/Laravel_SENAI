<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
</head>
<body>
    <h1>Relatório de Departamento</h1>
    <br>
    <a href="{{route('editora.cadastro')}}">Departamento Cadastrar</a>
    <br>
    <br>
    <a href="{{route('livro.listar')}}">Listar Departamento</a>
    <br>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>DATA_CRIACAO</th>
                <th>ORÇAMENTO</th>
                <th>SIGLA</th>
            </tr>
        </thead>
        <tbody>
            @forelse($departamentos as $departamento)
                <tr>
                    <td>{{ $departamento->id }}</td>
                    <td>{{ $departamento->nome }}</td>
                    <td>{{ $departamento->data_criacao }}</td>
                    <td>{{ $departamento->orcamento }}</td>
                    <td>{{ $departamento->sigla }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3"> Nenhum Funcionário encontrado</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>