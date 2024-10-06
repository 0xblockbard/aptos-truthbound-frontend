@extends('default')

@section('content')

    <div class="flex flex-col w-full px-10 mt-24">

        <div class="section_one flex flex-col sm:flex-row w-full">

            <div class="flex flex-col items-start justify-center w-full sm:w-1/2 sm:pr-16 sm:pl-20 pb-10 pt-10 sm:pt-0">

                <h1 class="text-5xl text-indigo-600 font-extrabold">TruthBound</h1>
                <span class="w-20 border-2 border-indigo-600 mt-2"></span>
               
                <h3 class="text-md mt-2 font-semibold italic">Where Aptos creators, developers, and indie makers hangout</h3>

                <p class="text-base mt-8">Kickstart innovative projects, support enterprising creators, and support the Aptos community as an early adopter</p>

                <div class="flex flex-row mt-10 space-x-4">
                    <a href="{{ route('show_all_campaigns') }}">
                        <button type="button" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Browse Campaigns
                        </button>
                    </a>

                    <a href="{{ route('create_campaign') }}">
                        <button type="button" class="home_start_campaign_button invisible inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-indigo-700 bg-indigo-100 hover:bg-indigo-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Start a Campaign
                        </button>
                    </a>
                </div>

                <span class="w-10 border border-indigo-600 mt-24"></span>
                <p class="text-sm mt-2 italic">Aptos is a decentralised <a href="https://github.com/0xblockbard/aptos-crowd" target="_blank" class="underline hover:text-indigo-600">opensource</a> crowdfunding platform for the community powered by the Aptos Blockchain</p>

            </div>

            <div class="flex flex-col items-center justify-center w-full sm:w-1/2 sm:px-6 py-6 pb-20 sm:pb-0">

                @include('partials.home_svg')

            </div>

        </div>

        <div class="bg-white py-24 sm:py-32">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
              <div class="mx-auto max-w-2xl lg:text-center">
                <h2 class="text-base font-semibold leading-7 text-indigo-600">Deploy faster</h2>
                <p class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Everything you need to deploy your app</p>
                <p class="mt-6 text-lg leading-8 text-gray-600">Quis tellus eget adipiscing convallis sit sit eget aliquet quis. Suspendisse eget egestas a elementum pulvinar et feugiat blandit at. In mi viverra elit nunc.</p>
              </div>
              <div class="mx-auto mt-16 max-w-2xl sm:mt-20 lg:mt-24 lg:max-w-4xl">
                <dl class="grid max-w-xl grid-cols-1 gap-x-8 gap-y-10 lg:max-w-none lg:grid-cols-2 lg:gap-y-16">
                  <div class="relative pl-16">
                    <dt class="text-base font-semibold leading-7 text-gray-900">
                      <div class="absolute left-0 top-0 flex h-10 w-10 items-center justify-center rounded-lg bg-indigo-600">
                        <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M12 16.5V9.75m0 0l3 3m-3-3l-3 3M6.75 19.5a4.5 4.5 0 01-1.41-8.775 5.25 5.25 0 0110.233-2.33 3 3 0 013.758 3.848A3.752 3.752 0 0118 19.5H6.75z" />
                        </svg>
                      </div>
                      Fixed (All-or-Nothing)
                    </dt>
                    <dd class="mt-2 text-base leading-7 text-gray-600">Morbi viverra dui mi arcu sed. Tellus semper adipiscing suspendisse semper morbi. Odio urna massa nunc massa.</dd>
                  </div>

                  <div class="relative pl-16">
                    <dt class="text-base font-semibold leading-7 text-gray-900">
                      <div class="absolute left-0 top-0 flex h-10 w-10 items-center justify-center rounded-lg bg-indigo-600">
                        <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                        </svg>
                      </div>
                      Flexible (Keep-it-all)
                    </dt>
                    <dd class="mt-2 text-base leading-7 text-gray-600">Quisque est vel vulputate cursus. Risus proin diam nunc commodo. Lobortis auctor congue commodo diam neque.</dd>
                  </div>
                </dl>
              </div>
            </div>
        </div>

    </div>

@endsection
