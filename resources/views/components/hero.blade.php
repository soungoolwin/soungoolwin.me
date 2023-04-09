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
                                Junior Backend Developer
                            </h1>
                            <p class="my-3 text-[12px] text-gray-400">
                                A Programmer who enthusiast backend devloping, software
                                engineering, and software architech.
                            </p>
                            <h2 class="underline mt-8 text-yellow-400">
                                <a href="">My CV</a>
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
                            Now studying ICT at Rangist University.
                        </p>
                    </section>
                    <section class="static">
                        <h3 class="titleforabout">Skills</h3>
                        <p class="bodyforabout">
                            As I'm a web developer specialized in backend, I can develope backend project
                            with PHP, laravel and vuejs.
                        </p>
                    </section>
                </div>
            </div>
        </main>
