<x-dashboardlayout>
    <div class="w-2/3 h-screen bg-gray-200">
        <!-- Content goes here -->
        <div class="p-6">
            <!-- Blog create form -->
            <form action="/dashboard/blogs/create" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="title" class="block text-gray-700 font-bold mb-2">Title</label>
                    <input type="text" value="{{ old('title') }}" name="title" id="title"
                        placeholder="Enter blog title"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    @error('title')
                        <div class="bg-red-500 text-red p-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="intro" class="block text-gray-700 font-bold mb-2">Intro</label>
                    <textarea name="intro" id="intro" placeholder="Enter blog intro"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ old('intro') }}</textarea>
                    @error('intro')
                        <div class="bg-red-500 text-red p-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="slug" class="block text-gray-700 font-bold mb-2">Slug</label>
                    <input type="text" name="slug" value="{{ old('slug') }}" id="slug"
                        placeholder="Enter blog slug"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    @error('slug')
                        <div class="bg-red-500 text-red p-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="body" class="block text-gray-700 font-bold mb-2">Body</label>
                    <textarea name="body" id="body" placeholder="Enter blog body"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ old('body') }}</textarea>
                    @error('body')
                        <div class="bg-red-500 text-red p-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="image_url" class="block text-gray-700 font-bold mb-2">Image URL</label>
                    <input type="text" name="image_url" value="{{ old('image_url') }}" id="image_url"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    @error('image_url')
                        <div class="bg-red-500 text-red p-2">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Create Blog Post
                    </button>
                </div>
        </div>
    </div>
</x-dashboardlayout>
