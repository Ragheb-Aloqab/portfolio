<footer class="bg-white border-t py-6 mt-10">
    <div class="container mx-auto text-center text-gray-600">

        <p class="text-lg">
            © {{ date('Y') }} Ragheb.dev — All Rights Reserved
        </p>

        <div class="flex justify-center gap-4 mt-3 text-2xl text-gray-700">

            @if($profile = \App\Models\ProfileSetting::first())

                @if($profile->github_url)
                    <a href="{{ $profile->github_url }}" target="_blank" class="hover:text-black">
                        <i class="fa-brands fa-github"></i>
                    </a>
                @endif

                @if($profile->linkedin_url)
                    <a href="{{ $profile->linkedin_url }}" target="_blank" class="hover:text-blue-700">
                        <i class="fa-brands fa-linkedin"></i>
                    </a>
                @endif

                @if($profile->twitter_url)
                    <a href="{{ $profile->twitter_url }}" target="_blank" class="hover:text-blue-500">
                        <i class="fa-brands fa-twitter"></i>
                    </a>
                @endif

            @endif
        </div>
    </div>
</footer>
