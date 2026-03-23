<!DOCTYPE html>
<html lang="{{str_replace('_', '-', app()-> getlocale())}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aluno</title>
</head>
<body>
    <h1>Atualizar aluno</h1>

    @if(session('sucess'))
        <p style="color: green">{{session('success')}}</p>
    @endif

    <form action="{{route('aluno.update', $aluno->id)}}" method="POST">
        @csrf 
        @method('PUT')

        <input type="text" name="nome" value="{{ old('nome', $aluno->nome)}}" required>
        <input type="text" name="email" value="{{ old('email', $aluno->email)}}" required>
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