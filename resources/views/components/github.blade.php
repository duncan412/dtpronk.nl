<div>
    <section class="mt-12 sm:mt-16 lg:mt-20 bg-[#c8e8ea] p-4 sm:p-6 lg:p-8 rounded-xl max-w-7xl mx-auto">
        <h3 class="text-lg sm:text-xl font-semibold mb-2">{{$data['title']}}</h3>
        @if(isset($data['subtitle']))
            <p class="text-sm sm:text-base text-gray-700 mb-4">{{$data['subtitle']}}</p>
        @endif
        <div class="h-auto rounded-md overflow-x-auto">
            <x-github-activity/>
        </div>
    </section>
</div>
