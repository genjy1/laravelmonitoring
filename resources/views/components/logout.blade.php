<form action="{{route('logout')}}" method="POST">
    @csrf
    <button type="submit">Выход</button>
</form>
