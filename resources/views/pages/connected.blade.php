@extends('default')

@section('content')

    <div class="bg-white overflow-hidden w-full">
        <div class="relative max-w-7xl mx-auto py-8 sm:py-10 px-4 sm:px-6 lg:px-8">

            <div class="mx-auto text-base max-w-full mt-4">
                <div class="flex flex-col items-center w-full">
                    <h2 class="text-base text-indigo-400 font-semibold tracking-wide uppercase">Welcome</h2>
                    <div>
                        <h3 class="mt-2 text-3xl leading-8 font-roboto font-extrabold tracking-tight text-indigo-600 sm:text-4xl">Get started with AptosCrowd</h3>
                        <div class="w-48 border border-indigo-400 mt-2 mb-2 ml-auto pr-4"></div>
                    </div>
                </div>

                <div class="flex flex-row mt-8 space-x-12">
                    
                    <a class="flex w-1/3"  href="{{ route('show_all_campaigns') }}">
                        <div class="flex flex-col rounded-md shadow-md border border-indigo-200 px-8 py-6 hover:shadow-xl shadow-indigo-400 hover:border-indigo-300 transition duration-300 ease-in-out hover:scale-[1.05] hover:cursor-pointer hover:border-2"> 
                            <h2 class="font-roboto font-bold text-xl text-center">Explore Campaigns</h2>
                            <div class="w-20 border border-indigo-400 mt-1 mb-4 mx-auto"></div>
                            <img class="rounded-sm shadow-md border border-indigo-500 shadow-indigo-500" src="https://res.cloudinary.com/blockbard/image/upload/c_scale,w_auto,q_auto,f_auto,fl_lossy/v1728153489/explore-campaigns-1.png" />
                            <p class="font-merriweather mt-6 px-6 text-center text-sm font-medium">Discover innovative campaigns and projects to support!</p>
                            <button class="mt-6 mb-2 text-sm leading-4 font-medium mx-auto py-2 px-4 bg-indigo-600 text-white rounded-md hover:bg-indigo-500 transition duration-300 font-sans">Explore</button>
                        </div>
                    </a>

                    <a class="flex w-1/3" href="{{ route('create_campaign') }}">
                        <div class="flex flex-col rounded-md shadow-md border border-indigo-200 px-8 py-6 hover:shadow-xl shadow-indigo-400 hover:border-indigo-300 transition duration-300 ease-in-out hover:scale-[1.05] hover:cursor-pointer hover:border-2"> 
                            <h2 class="font-roboto font-bold text-xl text-center">Start Campaign</h2>
                            <div class="w-14 border border-indigo-400 mt-1 mb-4 mx-auto"></div>
                            <img class="rounded-sm shadow-md border border-indigo-500 shadow-indigo-500" src="https://res.cloudinary.com/blockbard/image/upload/c_scale,w_auto,q_auto,f_auto,fl_lossy/v1728154005/create-campaign.png" />
                            <p class="font-merriweather  mt-6 text-center text-sm font-medium">Create and launch your own crowdfunding campaign on Aptos today!</p>
                            <button class="mt-6 mb-2 text-sm leading-4 font-medium mx-auto py-2 px-4 bg-indigo-600 text-white rounded-md hover:bg-indigo-500 transition duration-300 font-sans">Start Now</button>
                        </div>
                    </a>

                    <a class="flex w-1/3" href="{{ route('guide') }}">
                        <div class="flex flex-col rounded-md shadow-md border border-indigo-200 px-8 py-6 hover:shadow-xl shadow-indigo-400 hover:border-indigo-300 transition duration-300ease-in-out hover:scale-[1.05] hover:cursor-pointer hover:border-2"> 
                            <h2 class="font-roboto font-bold text-xl text-center">Learn More</h2>
                            <div class="w-14 border border-indigo-400 mt-1 mb-4 mx-auto"></div>
                            <img class="rounded-sm shadow-md border border-indigo-500 shadow-indigo-500 " src="https://res.cloudinary.com/blockbard/image/upload/c_scale,w_auto,q_auto,f_auto,fl_lossy/v1728154002/learn-more.png" />
                            <p class="font-merriweather mt-6 px-4 text-center text-sm font-medium">Read more about our crowdfunding models and how they work</p>
                            <button class="mt-6 mb-2 text-sm leading-4 font-medium mx-auto py-2 px-4 bg-indigo-600 text-white rounded-md hover:bg-indigo-500 transition duration-300 font-sans">Learn More</button>
                        </div>
                    </a>
                    
                </div>
            </div>
            
            
        </div>
    </div>


@endsection


@section('scripts')

{{-- 
    <script src="https://aptos-blockbard.s3.ap-southeast-2.amazonaws.com/assets/js/scrollToFixed.js"></script>

    <script>
        $(document).ready(function() {
            $('#about_image').scrollToFixed();
        });
    </script> --}}

@endsection