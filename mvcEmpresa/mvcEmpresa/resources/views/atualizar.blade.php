<!DOCTYPE html>
<html lang="{{ str_replace('_','-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Atualizar Funcionarios</title>
</head>
<body>
    <h1>Atualizar funcionarios</h1>

    <br>
    <a href="{{route('funcionario.listar')}}">Funcionario Listar</a>
    <br>

    @if(session('success'))
        <p style="color: green">{{ session('success') }}</p>
    @endif

    <form action="{{ route('funcionario.update', $funcionario->id) }}" method="POST">
        @csrf
        @method('PUT')

                <label for="nome">Nome: </label>
        <input type="text" name="nome" id="nome" placeholder="Nome..."
            require value="{{ old('nome') }}"
        >
        <br><br>
        <label for="cargo">Cargo: </label>
        <input type="text" name="cargo" id="cargo" placeholder="Cargo..."
            require value="{{ old('cargo') }}"
        >
        <br><br>
        <label for="email">Email: </label>
        <input type="text" name="email" id="email" placeholder="Email..."
            require value="{{ old('email') }}"
        >
        <br><br>
        <label for="data_admissao">Data Emissão: </label>
        <input type="date" name="data_admissao" id="data_admissao" placeholder="Data Admissão..."
            require value="{{ old('data_admissao') }}"
        >
        <br><br>
        <label for="salario">Salário: </label>
        <input type="number" name="salario" id="salario" placeholder="Salário..."
            require value="{{ old('salario') }}"
        >
        <br><br>
        <label for="sobrenome">Sobrenome: </label>
        <input type="text" name="sobrenome" id="sobrenome" placeholder="Sobrenome..."
            require value="{{ old('sobrenome') }}"
        >
        <br><br>
        <label for="departamento_id">Departamento: </label>
        <select name="departamento_id" id="departamento_id">
            @foreach ($departamentos as $departamento)
                <option value="{{ $departamento->id }}"
                    {{ $funcionario->departamento_id == $departamento->id ? 'selected' : '' }}>
                    {{ $departamento->nome }}
                </option>
            @endforeach
        </select>

        <button type="submit">Atualizar</button>
    </form>

    @if($errors->any())
        <div style="color: red">
            <ul>
                @foreach ($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</body>
</html>