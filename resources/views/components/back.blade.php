<label for="back">
    @if(\Illuminate\Support\Facades\Auth::check())
        <a id="back" href="{{route('common.home',$id)}}"><- Назад</a>
    @endif
        <a href="{{route('login')}}" id="back"><- Назад</a>
</label>
