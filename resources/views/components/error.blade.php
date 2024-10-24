@if(session('error'))
    <div class="success-wrapper border border-red-600 rounded p-2 text-red-600 flex justify-between items-center bg-white">
        {{session('error')}}
        <div class="round border-red-600 border-2 border rounded-full p-2">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="red">
                <line x1="8" y1="8" x2="16" y2="16" stroke="red" stroke-width="2"/>
                <line x1="16" y1="8" x2="8" y2="16" stroke="red" stroke-width="2"/>
            </svg>
        </div>
    </div>
@endif
