<x-layout>
    <div class="flex">
        <div class="w-1/3 h-screen bg-gray-800 hidden md:block">
            <!-- Navigation list goes here -->
            <ul class="flex flex-col justify-center text-center h-full">
                <li class="px-6 py-2 text-gray-300 hover:bg-gray-700">
                    <a href="/dashboard/blogs/create">Blog Create</a>
                </li>
                <li class="px-6 py-2 text-gray-300 hover:bg-gray-700">
                    <a href="/dashboard/blogs/showall">Edit Blog</a>
                </li>
                <li class="px-6 py-2 text-gray-300 hover:bg-gray-700">
                    <a href="#">Users</a>
                </li>
            </ul>
        </div>
        {{ $slot }}
    </div>
</x-layout>
