<x-layout>
    <div class="toflexSignUp">
        <div class="lg:w-[800px] md:w-[500px] w-[300px] mx-auto">
            <div class="signupcard">
                <form method="POST" action="/signup">
                    @csrf
                    <div>
                        <label class="block text-gray-300 font-bold mb-2" for="Email">
                            Email
                        </label>
                        <input class="signupemail_usename_pass" value="{{ old('email') }}" name="email" id="email"
                            type="email" placeholder="Email" />
                        @error('email')
                            <div class="bg-red-500 text-red p-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-gray-300 font-bold mb-2" for="Username">
                            Username
                        </label>
                        <input class="signupemail_usename_pass" value="{{ old('username') }}" name="username"
                            id="username" type="text" placeholder="Username" />
                        @error('username')
                            <div class="bg-red-500 text-red p-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mt-4">
                        <label class="block text-gray-300 font-bold mb-2" for="password">
                            Password
                        </label>
                        <input class="signupemail_usename_pass" id="password" name="password" type="password"
                            placeholder="Password" />
                        @error('password')
                            <div class="bg-red-500 text-red p-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mt-4">
                        <label class="block text-gray-300 font-bold mb-2" for="comfirmpassword">
                            Comfirm Password
                        </label>
                        <input class="signupemail_usename_pass" id="comfirmpassword" type="password"
                            placeholder="Comfirm Password" name="password_confirmation" />
                        @error('password_confirmation')
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
                <p class="pt-5"><a href="/login">Login?</a></p>
            </div>
        </div>
    </div>
</x-layout>
