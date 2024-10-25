<label for="back">
    @if(\Illuminate\Support\Facades\Auth::check())
        <a id="back" href="{{route('common.home',\Illuminate\Support\Facades\Auth::user()->id)}}"><- Назад</a>
    @else
        <a href="{{route('login')}}" id="back"><- Назад</a>
    @endif
</label>
