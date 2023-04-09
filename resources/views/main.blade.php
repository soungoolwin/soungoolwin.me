<x-layout>
    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Success!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
            <button class="absolute top-0 bottom-0 right-0 px-4 py-3" onclick="this.parentElement.style.display='none';">
                <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20">
                    <title>Close</title>
                    <path
                        d="M14.348 5.652a.5.5 0 0 1 0 .707L10.707 10l3.64 3.64a.5.5 0 0 1-.707.707L10 10.707l-3.64 3.64a.5.5 0 0 1-.707-.707L9.293 10 5.652 6.348a.5.5 0 0 1 .707-.707L10 9.293l3.64-3.64a.5.5 0 0 1 .707 0z" />
                </svg>
            </button>
        </div>
    @endif


    <x-smallscreen_nav />
    <div class="h-screen">
        <x-hero />
        <x-media_library />
        <x-blogsection :blogs='$blogs' />
        <x-subscribe />
        <x-footer />
    </div>
</x-layout>
