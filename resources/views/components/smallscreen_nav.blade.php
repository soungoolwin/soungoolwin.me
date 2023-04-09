    <!-- navbar for small screen size -->
    <div class="bg-[#313345] md:hidden block">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex h-16">
                <div class="md:hidden flex items-right">
                    <button class="outline-none mobile-menu-button">
                        <svg class="w-6 h-6 text-white" x-show="!showMenu" fill="none" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <div class="hidden mobile-menu md:hidden">
            <a href="#about-me" class="block px-3 py-2 rounded-md text-center font-medium text-white">About Me</a>
            <a href="#media-library" class="block px-3 py-2 rounded-md text-center font-medium text-white">Media
                Library</a>
            <a href="#blogs" class="block px-3 py-2 rounded-md text-center font-medium text-white">Blogs</a>
            <a href="/login" class="block px-3 py-2 rounded-md text-center font-medium text-white">Login</a>
        </div>
    </div>
