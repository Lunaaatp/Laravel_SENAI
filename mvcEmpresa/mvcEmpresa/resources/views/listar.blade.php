<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <br>
    <a href="{{route('funcionario.cadastro')}}">Cadastrar Funcionário</a>
    <br>

    <br>
    <a href="{{route('departamento.cadastro')}}">Cadastrar Departamento</a>
    <br>

    <br>
    <a href="{{route('departamento.listar')}}">Listar Departamento</a>
    <br>

    <h1>Relatório de Funcionário</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>NOME</th>
                <th>CARGO</th>
                <th>EMAIL</th>
                <th>DATA_ADMISSAO</th>
                <th>SALARIO</th>
                <th>SOBRENOME</th>
                <th>DEPARTAMENTO_ID</th>
            </tr>
        </thead>
        <tbody>
            @forelse($funcionarios as $funcionario)
                <tr>
                    <td>{{ $funcionario->id }}</td>
                    <td>{{ $funcionario->nome }}</td>
                    <td>{{ $funcionario->cargo }}</td>
                    <td>{{ $funcionario->data_admissao }}</td>
                    <td>{{ $funcionario->salario }}</td>
                    <td>{{ $funcionario->sobrenome}}</td>
                    <td>{{ $funcionario->info?->departamento_id}}</td>                    
                    <td>
                        <a href="{{route('funcionario.atualizar', $funcionario->id)}}">Atualizar</a>
                    </td>
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