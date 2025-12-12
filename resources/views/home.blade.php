@extends('layouts.main')

@section('title', 'Home')

@section('content')
    <header class="bg-[#c8e8ea] h-48 flex items-center justify-center px-8">
        <div class="max-w-4xl">
            <h2 class="text-2xl font-semibold text-gray-800 mb-2">
                Hi, I am Duncan the
            </h2>
            <p class="text-gray-700">
                Welcome to my portfolio. I am a curious person that never grows tired of learning new things.
                There are no problems, only new challenges to overcome.
                I am a programmer by heart, but I do many other things too.
                My favorite movie genres are horror and sci-fi.
            </p>
        </div>
    </header>

    <!-- Content -->
    <div class="flex-1 p-10">

        <!-- Timeline -->
        <section class="relative max-w-3xl mx-auto mt-8">
            <div class="absolute left-5 top-0 bottom-0 border-l-2 border-[#58b8bd]"></div>
            <div class="ml-12 space-y-12">

                <div>
                    <div class="flex items-center">
                        <div class="w-3 h-3 bg-[#58b8bd] rounded-full mr-4"></div>
                        <h3 class="text-lg font-semibold">Future</h3>
                    </div>
                    <p class="ml-7 text-gray-600">Who knows? Always looking for new challenges.</p>
                </div>

                <div>
                    <div class="flex items-center">
                        <div class="w-3 h-3 bg-[#58b8bd] rounded-full mr-4"></div>
                        <h3 class="text-lg font-semibold">
                            2025 - current <span class="font-normal text-gray-600">| Qabana - Web Developer & DevOps</span>
                        </h3>
                    </div>
                    <p class="ml-7 text-gray-600">
                        Back at my roots. Working on new projects while maintaining old projects.
                        Working on a Docker environment for hosting and CI/CD pipelines to deploy.
                    </p>
                </div>

                <div>
                    <div class="flex items-center">
                        <div class="w-3 h-3 bg-[#58b8bd] rounded-full mr-4"></div>
                        <h3 class="text-lg font-semibold">
                            2021 - 2025 <span class="font-normal text-gray-600">| Just - Backend Developer</span>
                        </h3>
                    </div>
                    <p class="ml-7 text-gray-600">
                        Working on different kind of CMS systems, from out of the box Statamic, to fully customized Kirby CMS.
                        Updating and creating internal tooling and environments for development and the rest of the team.
                    </p>
                </div>

                <div>
                    <div class="flex items-center">
                        <div class="w-3 h-3 bg-[#58b8bd] rounded-full mr-4"></div>
                        <h3 class="text-lg font-semibold">
                            2016 - 2021 <span class="font-normal text-gray-600">| Qabana - Web Developer</span>
                        </h3>
                    </div>
                    <p class="ml-7 text-gray-600">
                        Created and worked on new tailor-made projects for customers.
                        Updated and maintained existing projects. Worked mostly with Symfony and previously with Silex.
                    </p>
                </div>

                <div>
                    <div class="flex items-center">
                        <div class="w-3 h-3 bg-[#58b8bd] rounded-full mr-4"></div>
                        <h3 class="text-lg font-semibold">
                            2015 - 2016 <span class="font-normal text-gray-600">| ENNL - Intern Web Developer</span>
                        </h3>
                    </div>
                    <p class="ml-7 text-gray-600">
                        Created a webshop for a car parts shop in Magento during my graduation internship.
                    </p>
                </div>

                <div>
                    <div class="flex items-center">
                        <div class="w-3 h-3 bg-[#58b8bd] rounded-full mr-4"></div>
                        <h3 class="text-lg font-semibold">
                            2014 - 2015 <span class="font-normal text-gray-600">| TravelOn - Intern & Web Developer</span>
                        </h3>
                    </div>
                    <p class="ml-7 text-gray-600">
                        During my internship the other 2 developers left the company and I filled it until replacements were hired.
                        Worked on a customer portal for my internship and maintaining the side as the developer.
                    </p>
                </div>

                <div>
                    <div class="flex items-center">
                        <div class="w-3 h-3 bg-[#58b8bd] rounded-full mr-4"></div>
                        <h3 class="text-lg font-semibold">
                            2011 - 2016 <span class="font-normal text-gray-600">| Hogeschool Leiden - Student</span>
                        </h3>
                    </div>
                    <p class="ml-7 text-gray-600">
                        Studied ICT with a specialization in Media Technology.
                        Learned what triggers people and how to reach out to them.
                    </p>
                </div>
            </div>
        </section>

        <!-- Code Section -->
        <section class="mt-20 bg-[#c8e8ea] p-8 rounded-xl max-w-7xl mx-auto">
            <h3 class="text-xl font-semibold mb-2">My code</h3>
            <p class="text-gray-700 mb-4">A little sneak peek of what I am up to.</p>
            <div class="h-auto rounded-md">
              <x-github-activity />
            </div>
        </section>

        <!-- Future Updates -->
        <section class="mt-16 text-center max-w-3xl mx-auto">
            <h3 class="text-xl font-semibold">I am never done with this site</h3>
            <p class="text-gray-700 mt-2">
                A few things you can expect in future updates:
            </p>
            <ul class="text-gray-600 mt-4 space-y-1">
                <li>• Expanded code section</li>
                <li>• Dynamic content</li>
                <li>• Code preview</li>
                <li>• Contact form</li>
                <li>• Dark mode</li>
                <li>• And much more</li>
            </ul>
        </section>
    @endsection
