<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>webApi</title>
</head>
<body>
    <div class="content">
        <form action="{{ route('create') }}" method="POST" class="create">
            @csrf
            <h2>Добавить игру</h2>
            <input type="text" name="Title" id="Title" placeholder="Введите название игры">
            @error('Title')
                <p>{{ $message }}</p>
            @enderror
            <input type="text" name="Studio" id="Studio" placeholder="Введите студию ">
            @error('Studio')
                <p>{{ $message }}</p>
            @enderror
            @if(!isset($genre[0]))
                <p class="genre">Нет жанров</p>
            @else
                <select name="genre_id" id="genre_id">
                    @foreach ($genre as $item_genre)
                        <option value="{{$item_genre->id}}">{{$item_genre->title}}</option>
                    @endforeach
                </select>
            @endif

            <button type="submit">добавить</button>
        </form>

        <form action="{{ route('create_genre') }}" method="POST" class="create">
            @csrf
            <h2>Добавить жанр</h2>
            <input type="text" name="title" id="title" placeholder="Введите название жанра">
            @error('title')
                <p>{{ $message }}</p>
            @enderror
            <button type="submit">добавить</button>
        </form>


    </div>
    <h2>Список игр</h2>
    <div class="genre_link">

        @foreach ($genre as $item_genre)
            <form action="{{ url('filter/'. $item_genre->id) }}" method="GET" class="edit">
                @csrf
                <input type="hidden" name="id" value="{{ $item_genre->id }}">
                <button type="submit">{{ $item_genre->title }}</button>
            </form>            
        @endforeach
    </div>
    <div class="all_games">
        @foreach($game as $item)
        <div class="item_games">
            <p>Наименование: {{ $item->Title }}</p>
            <p>Студия: {{ $item->Studio }}</p>
            <p>Жанр: {{ $item->title }}</p>
            <form action="{{ route('delete', ['id' => $item->id]) }}" method="POST" class="edit">
                @csrf
                @method('DELETE')
                <input type="hidden" name="id" value="{{ $item->id }}">
                <button type="submit">Удалить</button>
            </form> 

            <form action="{{ route('update', ['id' => $item->id]) }}" method="POST" class="edit">
                @csrf
                @method('PUT')
                <input type="text" name="Title" id="Title_update" placeholder="Введите название игры">

                <input type="text" name="Studio" id="Studio_update" placeholder="Введите студию ">
      
                <input type="hidden" name="id" value="{{ $item->id }}">
                <button type="submit">Изменить</button>
            </form>           

        </div>
        @endforeach

    </div>
</body>
</html>