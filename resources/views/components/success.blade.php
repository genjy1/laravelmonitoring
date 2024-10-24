@if(session('success'))
    <div class="success-wrapper border border-green-600 rounded p-2 text-green-600 flex justify-between items-center">
        {{session('success')}}
        <div class="round border-green-600 border rounded-full p-2">
            <svg class="w-4 h-4 text-green-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <polyline points="20 6 9 17 4 12"></polyline>
            </svg>
        </div>
    </div>
@endif
