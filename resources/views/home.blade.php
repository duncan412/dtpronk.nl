@extends('layouts.main')

@section('title', 'Home')

@section('content')
    <header class="bg-[#c8e8ea] min-h-[12rem] lg:h-48 flex items-center justify-center px-4 sm:px-6 lg:px-8 py-8">
        <div class="max-w-4xl w-full">
            <div id="typed-strings">
                <p>{{ __('web developer') }}</p>
                <p>{{ __('problem solver') }}</p>
                <p>{{ __('PHP fanatic') }}</p>
                <p>{{ __('Symfony fan') }}</p>
                <p>{{ __('Laravel fan') }}</p>
                <p>{{ __('cyclist') }}</p>
                <p>{{ __('chess player') }}</p>
                <p>{{ __('gamer') }}</p>
                <p>{{ __('movie lover') }}</p>
            </div>
            <h2 class="text-xl sm:text-2xl lg:text-3xl font-semibold text-gray-800 mb-2">
                Hi, I am Duncan the <span id="typed"></span>
            </h2>
            <p class="text-sm sm:text-base text-gray-700">
                Welcome to my portfolio. I am a curious person that never grows tired of learning new things.
                There are no problems, only new challenges to overcome.
                I am a programmer by heart, but I do many other things too.
                My favorite movie genres are horror and sci-fi.
            </p>
        </div>
    </header>

    <!-- Content -->
    <div class="flex-1 px-4 sm:px-6 lg:px-10 py-6 sm:py-8 lg:py-10">

        <!-- Timeline -->
        <section class="relative max-w-3xl mx-auto mt-4 sm:mt-8">
            <div class="absolute left-3 sm:left-5 top-0 bottom-0 border-l-2 border-[#58b8bd]"></div>
            <div class="ml-8 sm:ml-12 space-y-8 sm:space-y-12">

                <div>
                    <div class="flex items-start">
                        <div class="w-3 h-3 bg-[#58b8bd] rounded-full mr-3 sm:mr-4 mt-1 flex-shrink-0"></div>
                        <h3 class="text-base sm:text-lg font-semibold">Future</h3>
                    </div>
                    <p class="ml-6 sm:ml-7 text-sm sm:text-base text-gray-600 mt-1">Who knows? Always looking for new challenges.</p>
                </div>

                <div>
                    <div class="flex items-start">
                        <div class="w-3 h-3 bg-[#58b8bd] rounded-full mr-3 sm:mr-4 mt-1 flex-shrink-0"></div>
                        <div>
                            <h3 class="text-base sm:text-lg font-semibold">2025 - current</h3>
                            <span class="text-sm sm:text-base font-normal text-gray-600 block sm:inline">Qabana - Web Developer & DevOps</span>
                        </div>
                    </div>
                    <p class="ml-6 sm:ml-7 text-sm sm:text-base text-gray-600 mt-2">
                        Back at my roots. Working on new projects while maintaining old projects.
                        Working on a Docker environment for hosting and CI/CD pipelines to deploy.
                    </p>
                </div>

                <div>
                    <div class="flex items-start">
                        <div class="w-3 h-3 bg-[#58b8bd] rounded-full mr-3 sm:mr-4 mt-1 flex-shrink-0"></div>
                        <div>
                            <h3 class="text-base sm:text-lg font-semibold">2021 - 2025</h3>
                            <span class="text-sm sm:text-base font-normal text-gray-600 block sm:inline">Just - Backend Developer</span>
                        </div>
                    </div>
                    <p class="ml-6 sm:ml-7 text-sm sm:text-base text-gray-600 mt-2">
                        Working on different kind of CMS systems, from out of the box Statamic, to fully customized
                        Kirby CMS.
                        Updating and creating internal tooling and environments for development and the rest of the
                        team.
                    </p>
                </div>

                <div>
                    <div class="flex items-start">
                        <div class="w-3 h-3 bg-[#58b8bd] rounded-full mr-3 sm:mr-4 mt-1 flex-shrink-0"></div>
                        <div>
                            <h3 class="text-base sm:text-lg font-semibold">2016 - 2021</h3>
                            <span class="text-sm sm:text-base font-normal text-gray-600 block sm:inline">Qabana - Web Developer</span>
                        </div>
                    </div>
                    <p class="ml-6 sm:ml-7 text-sm sm:text-base text-gray-600 mt-2">
                        Created and worked on new tailor-made projects for customers.
                        Updated and maintained existing projects. Worked mostly with Symfony and previously with Silex.
                    </p>
                </div>

                <div>
                    <div class="flex items-start">
                        <div class="w-3 h-3 bg-[#58b8bd] rounded-full mr-3 sm:mr-4 mt-1 flex-shrink-0"></div>
                        <div>
                            <h3 class="text-base sm:text-lg font-semibold">2015 - 2016</h3>
                            <span class="text-sm sm:text-base font-normal text-gray-600 block sm:inline">ENNL - Intern Web Developer</span>
                        </div>
                    </div>
                    <p class="ml-6 sm:ml-7 text-sm sm:text-base text-gray-600 mt-2">
                        Created a webshop for a car parts shop in Magento during my graduation internship.
                    </p>
                </div>

                <div>
                    <div class="flex items-start">
                        <div class="w-3 h-3 bg-[#58b8bd] rounded-full mr-3 sm:mr-4 mt-1 flex-shrink-0"></div>
                        <div>
                            <h3 class="text-base sm:text-lg font-semibold">2014 - 2015</h3>
                            <span class="text-sm sm:text-base font-normal text-gray-600 block sm:inline">TravelOn - Intern & Web Developer</span>
                        </div>
                    </div>
                    <p class="ml-6 sm:ml-7 text-sm sm:text-base text-gray-600 mt-2">
                        During my internship the other 2 developers left the company and I filled it until replacements
                        were hired.
                        Worked on a customer portal for my internship and maintaining the side as the developer.
                    </p>
                </div>

                <div>
                    <div class="flex items-start">
                        <div class="w-3 h-3 bg-[#58b8bd] rounded-full mr-3 sm:mr-4 mt-1 flex-shrink-0"></div>
                        <div>
                            <h3 class="text-base sm:text-lg font-semibold">2011 - 2016</h3>
                            <span class="text-sm sm:text-base font-normal text-gray-600 block sm:inline">Hogeschool Leiden - Student</span>
                        </div>
                    </div>
                    <p class="ml-6 sm:ml-7 text-sm sm:text-base text-gray-600 mt-2">
                        Studied ICT with a specialization in Media Technology.
                        Learned what triggers people and how to reach out to them.
                    </p>
                </div>
            </div>
        </section>

        <!-- Code Section -->
        <section class="mt-12 sm:mt-16 lg:mt-20 bg-[#c8e8ea] p-4 sm:p-6 lg:p-8 rounded-xl max-w-7xl mx-auto">
            <h3 class="text-lg sm:text-xl font-semibold mb-2">My code</h3>
            <p class="text-sm sm:text-base text-gray-700 mb-4">A little sneak peek of what I am up to.</p>
            <div class="h-auto rounded-md overflow-x-auto">
                <x-github-activity/>
            </div>
        </section>

        <!-- Future Updates -->
        <section class="mt-12 sm:mt-16 text-center max-w-3xl mx-auto">
            <h3 class="text-lg sm:text-xl font-semibold">I am never done with this site</h3>
            <p class="text-sm sm:text-base text-gray-700 mt-2">
                A few things you can expect in future updates:
            </p>
            <ul class="text-sm sm:text-base text-gray-600 mt-4 space-y-1">
                <li>• Expanded code section</li>
                <li>• Dynamic content</li>
                <li>• Code preview</li>
                <li>• Contact form</li>
                <li>• Dark mode</li>
                <li>• And much more</li>
            </ul>
        </section>
@endsection
