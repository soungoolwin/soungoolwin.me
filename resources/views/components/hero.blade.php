        <!-- hero section -->
        <main id="about-me">
            <div class="bg-[#313345]">
                <div class="toflexforhero">
                    <section class="static">
                        <h1 class="Myname">
                            Soung <br />
                            Oo Lwin
                            <hr class="yellowLine" />
                        </h1>
                        <div class="socialsection">
                            <a href="https://github.com/soungoolwin"><i
                                    class="fa-brands fa-github socialmedia_logo"></i></a>
                            <a href="https://web.facebook.com/soung.lwin.75"><i
                                    class="fa-brands fa-facebook socialmedia_logo"></i></a>
                            <a href="https://www.linkedin.com/in/soung-oo-lwin-vito-126998224/">
                                <i class="fa-brands fa-linkedin socialmedia_logo"></i></a>
                        </div>
                    </section>
                    <section class="static">
                        <nav class="bigscreennav">
                            <a href="#about-me" class="navlogo">About Me</a>
                            <a href="#media-library" class="navlogo">Media Library</a>
                            <a href="#blogs" class="navlogo">Blogs</a>


                            @if (auth()->user())
                                <form method="POST" action="/logout" class="inline-block">
                                    @csrf
                                    <button type="submit" class="navlogo">Logout</button>
                                </form>
                            @else
                                <a href="/login" class="navlogo">Login</a>
                            @endif

                        </nav>
                        <div class="relative md:top-[200px]">
                            <h1 class="font-light text-white text-[22px]">
                                ICT Student at Rangsit University and <br />
                                Laravel, Vue.js Developer
                            </h1>
                            <p class="my-3 text-[12px] text-gray-400">
                                A Programmer who is eager to learn and innovate new things.
                            </p>
                            <h2 class="underline mt-8 text-yellow-400">
                                <a href="https://tinyurl.com/2kcrtm9z">My CV</a>
                            </h2>
                        </div>
                    </section>
                </div>
            </div>

            <div class="bg-[#242734] pb-[29px]">
                <div class="toflexforabout">
                    <section class="static">
                        <h3 class="titleforabout">Background</h3>
                        <p class="bodyforabout">
                            Tech and tech related enthusiast since chilhood.
                            Computer Science student at Computer University Mandalay(2019-2020).
                            Now studying ICT at Rangist University and running "Technophilia Lab" own startup team.
                        </p>
                    </section>
                    <section class="static">
                        <h3 class="titleforabout">Skills</h3>
                        <p class="bodyforabout">
                            I can develope Vue.js, Laravel SPA application with great performance and innovations.
                        </p>
                    </section>
                </div>
            </div>
        </main>
