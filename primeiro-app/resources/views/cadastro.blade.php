<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale())}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro Produtos</title>
</head>
<body>
    <h1>Cadastro de Produtos</h1>

    @if(session('sucess'))
        <p style="color: green">{{ session('sucess')}}</p>
    @endif

    <form action="">
        @csrf
        <label for="nome">Nome do Produto:</label>
        <input type="text" name="nome" id="nome" placeholder="Nome..." required value="{{old('nome')}}">
        <br></br>

        <label for="valor">Valor do Produto:</label>
        <input type="number" name="valor" id="valor" placeholder="Valor..." required value="{{old('valor')}}">
        <br></br>

        <label for="cor">Cor do Produto:</label>
        <input type="text" name="cor" id="cor" placeholder="Cor..." required value="{{old('cor')}}">

        <input type="submit" value="Cadastrar">
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