<template>
    <!-- for media Library -->
    <div class="bg-[#313345]" id="media-library">
        <h1 class="medialibraryTitle">My Media Library</h1>
        <div class="toflexmedialibrary">
            <section class="medialibrarysection">
                <div class="medialibrarycard">
                    <div class="relative pb-9/16">
                        <iframe
                            class="youtube"
                            height="300"
                            src="https://www.youtube.com/embed/lLeZ3sJEROM"
                            title="YouTube video player"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; "
                            allowfullscreen
                        ></iframe>
                    </div>
                    <div class="px-6 py-4">
                        <div class="font-bold text-xl mb-2">My Melodies</div>
                        <p class="text-gray-700 text-base">
                            Check my youtube channel for beautiful melodies.
                        </p>
                    </div>
                </div>
            </section>
            <section class="medialibrarysection">
                <div class="medialibrarycard">
                    <div class="relative pb-9/16">
                        <iframe
                            id="embedPlayer"
                            src="https://embed.podcasts.apple.com/us/podcast/right-opportunities-should-come-at-the-right-time/id1628340856?i=1000615840223&amp;itsct=podcast_box_player&amp;itscg=30200&amp;ls=1&amp;theme=auto"
                            height="150px"
                            frameborder="0"
                            sandbox="allow-forms allow-popups allow-same-origin allow-scripts allow-top-navigation-by-user-activation"
                            allow="autoplay *; encrypted-media *; clipboard-write"
                            style="
                                width: 100%;
                                max-width: 660px;
                                overflow: hidden;
                                border-radius: 10px;
                                transform: translateZ(0px);
                                animation: 2s ease 0s 6 normal none running
                                    loading-indicator;
                                background-color: rgb(228, 228, 228);
                            "
                            scrolling="no"
                        ></iframe>

                        <iframe
                            id="embedPlayer"
                            src="https://embed.podcasts.apple.com/us/podcast/no-one-is-better-than-you-and-vice-versa/id1628340856?i=1000567279707&amp;itsct=podcast_box_player&amp;itscg=30200&amp;ls=1&amp;theme=auto"
                            height="150px"
                            frameborder="0"
                            sandbox="allow-forms allow-popups allow-same-origin allow-scripts allow-top-navigation-by-user-activation"
                            allow="autoplay *; encrypted-media *; clipboard-write"
                            style="
                                width: 100%;
                                max-width: 660px;
                                overflow: hidden;
                                border-radius: 10px;
                                transform: translateZ(0px);
                                animation: 2s ease 0s 6 normal none running
                                    loading-indicator;
                                background-color: rgb(228, 228, 228);
                            "
                            scrolling="no"
                        ></iframe>
                    </div>
                    <div class="px-6 py-4">
                        <div class="font-bold text-xl mb-2">My Podcasts</div>
                        <p class="text-gray-700 text-base">
                            Feel free to share personal perspective.
                        </p>
                    </div>
                </div>
            </section>
        </div>
    </div>
</template>

<script>
export default {};
</script>

<style></style>
