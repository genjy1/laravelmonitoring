@include('components.head')
@include('components.header')
<body>
    @include('components.tabs')
    <div class="account-wrapper mt-4 mx-auto my-0 w-4/5">
        @include('components.account',$timezones)
        @include('components.back')
    </div>

</body>
