<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parse link</title>
</head>

<body>
    <form action="{{route('parse')}}" method="post">
        @csrf
        <input type="link" placeholder="Ссылка" name="link" value="https://www.animeonline.cc/comedy/">
        <input type="text" placeholder="Элемент" name="element" value="#dle-content .short">
        <input type="text" placeholder="Заголовок" name="title" value="h2">
        <input type="text" placeholder="Описание" name="description" value=".st-desc">
        <button>Отправить</button>

        @if($data)
        @foreach($data as $item)
        <div class=" card">
            <h1>{{$item["title"]}}</h1>
            <p>{{$item["description"]}}</p>
        </div>
        @endforeach
        @endif
    </form>
</body>

</html>