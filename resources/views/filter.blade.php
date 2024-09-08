<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('style.css')}}">
    <title>webApi || Filter</title>
</head>
<body>
    <h2>Список игр</h2>
    <div class="genre_link">
        <a href="{{url('/')}}">Вернуться</a> 
        @foreach ($genre as $item_genre)
            <form action="{{ url('filter/'. $item_genre->id) }}" method="GET" class="edit">
                @csrf
                <input type="hidden" name="id" value="{{ $item_genre->id }}">
                <button type="submit">{{ $item_genre->title }}</button>
            </form>            
        @endforeach
    </div>
    <div class="all_games">
        @if(count($game) > 0)
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
            </div>
            @endforeach
            @else
            <p>Нет игр с таким жанром</p>
        @endif
    </div>
</body>
</html>