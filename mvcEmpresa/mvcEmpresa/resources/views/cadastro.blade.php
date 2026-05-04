<!DOCTYPE html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Funcionarios</title>
</head>
<body>
    <h1>Cadastro Funcionarios</h1>

    <br>
    <a href="{{route('funcionario.listar')}}">Funcionarios listar</a>
    <br>

    @if(session('success'))
        <p style="color:green">{{ session('success')}}</p>
    @endif

    <form action="{{route('funcionario.salvar') }}" method="POST">
        @csrf
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
        <br><br>
        <label for="CPF">CPF: </label>
        <input type="text" name="CPF" id="CPF" placeholder="CPF..."
            require value="{{ old('CPF') }}"
        >

        <br><br>
        <label for="RG">RG: </label>
        <input type="text" name="RG" id="RG" placeholder="RG..."
            require value="{{ old('RG') }}"
        >

        <br><br>
        <label for="data_nascimento">CPF: </label>
        <input type="date" name="data_nascimento" id="data_nascimento" placeholder="Data nascimento..."
            require value="{{ old('data_nascimento') }}"
        >

         <br><br>
        <label for="CEP">CPF: </label>
        <input type="text" name="CEP" id="CEP" placeholder="CEP..."
            require value="{{ old('CEP') }}"
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