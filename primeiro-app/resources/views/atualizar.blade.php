<!DOCTYPE html>
<html lang="{{str_replace('_', '-', app()-> getlocale())}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Atualizar Produto</title>
</head>
<body>
    <h1>Atualizar Produto</h1>

    @if(session('sucess'))
        <p style="color: green">{{session('sucess')}}</p>
    @endif

    <form action="{{route('produto.update', $produto->id)}}" method="POST">
        @csrf
        @method('PUT')

        <input type="text" name="nome" value="{{old('nome', $produto->nome)}}" required>
        <input type="number" name="valor" value="{{old('valor', $produto->valor)}}" required>
        <input type="text" name="cor" value="{{old('cor', $produto->cor)}}" required>
        <button type="submit">Atualizar</button>
    </form>

    @if(errors->any())
        <div style="color: red">
            <ul>
                @foreach($errors->all() as $erro)
                    <li>{{$erro}}</li>
                @endforeach
            </ul>
        </div>

    @endif
</body>
</html>