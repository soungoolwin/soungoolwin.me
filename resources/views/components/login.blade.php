<x-layout>
    <div class="toflexLogin">
        <div class="lg:w-[800px] md:w-[500px] w-[300px] mx-auto">
            <div class="logincard">
                <form method="POST" action="/login">
                    @csrf
                    <div>
                        <label class="block text-gray-300 font-bold mb-2" for="Email">
                            Email
                        </label>
                        <input class="loginemail_pass" name="email" value="{{ old('email') }}" id="email"
                            type="email" placeholder="Email" />
                        @error('email')
                            <div class="bg-red-500 text-red p-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mt-4">
                        <label class="block text-gray-300 font-bold mb-2" for="password">
                            Password
                        </label>
                        <input class="loginemail_pass" name="password" id="password" type="password"
                            placeholder="Password" />
                        @error('password')
                            <div class="bg-red-500 text-red p-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mt-4">
                        <button
                            class="bg-purple-500 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                            type="submit">
                            Sign In
                        </button>
                    </div>
                </form>
                <p class="pt-5"><a href="/signup">Create Account?</a></p>
            </div>
        </div>
    </div>
</x-layout>
