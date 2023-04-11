<x-layout>
    <x-smallscreen_nav />
    <div class="h-screen">
        <x-hero />
        <x-media_library />
        <x-blogsection :blogs='$blogs' />
        <x-subscribe />
        <x-footer />
    </div>
</x-layout>
