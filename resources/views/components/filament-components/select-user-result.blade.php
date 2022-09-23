<div class="relative flex rounded-md">
    <div class="flex">
        {{-- <div class="px-2 py-3">
            <div class="w-10 h-10">
                <img  role="img" class="object-cover w-10 h-10 overflow-hidden rounded-full shadow" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />               
            </div>
        </div> --}}
 
        <div class="flex flex-col justify-center py-2 pl-3">
            <p class="pb-1 text-sm font-bold">{{ $name }}</p>
            {{-- <div class="flex flex-col items-start">
                <p class="text-xs leading-5">{{ $email }}</p>
            </div> --}}
        </div>
    </div>
</div>