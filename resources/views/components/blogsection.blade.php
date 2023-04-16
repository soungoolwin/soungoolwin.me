        <!-- blog section -->


        <div class="bg-[#242734] pt-10" id="blogs">
            <h1 class="blogsectionTitle">My Blogs</h1>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 toflexblogsection justify-items-center">
                @foreach ($blogs as $blog)
                    <a href="/blogs/{{ $blog->slug }}">
                        <div class="blogsectioncard mx-auto text-center ">
                            <div class="relative pb-9/16">
                                <img src="{{ $blog->image_url }}" alt="" width="200" height="200"
                                    class="mx-auto my-5" />
                            </div>
                            <div class="px-6
                                    py-4">
                                <div class="font-bold text-xl mb-2">{{ $blog->title }}</div>
                                <p class="text-gray-700 text-base">
                                    {{ $blog->intro }}
                                </p>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
            {{ $blogs->links() }}
        </div>
