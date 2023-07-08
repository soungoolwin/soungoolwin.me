<x-layout>
    <div class="bg-gray-700 text-white py-8 flex flex-col justify-center items-center">
        <div class="lg:w-[1000px] md:w-[800px] sm:w-[600px] w-[300px] mx-auto">
            <div class="bg-[#242734] p-6 rounded">
                <img src="{{ $blog->image_url }}" alt="" class="mx-auto" />
                <h1 class="pt-5 text-center text-[30px] my-10">{{ $blog->title }}</h1>
                <p class="text-[18px]">
                    {!! str_replace('<img ', '<div class="image-container"><img ', $blog->body) !!}
                </p>
            </div>
        </div>
    </div>
</x-layout>
