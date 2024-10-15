@extends('default')

@section('content')

    <div class="bg-blue-50 overflow-hidden w-full">
        <div class="relative max-w-7xl mx-auto py-8 sm:py-16 px-12 sm:px-6 lg:px-8">
            <div class="hidden lg:block bg-sky-50 absolute top-0 bottom-0 left-3/4 w-screen"></div>
            <div class="mx-auto text-base max-w-prose lg:grid lg:grid-cols-2 lg:gap-8 lg:max-w-none">
                <div>
                    <h2 class="text-base text-gray-700 font-semibold tracking-wide">0xBlockBard</h2>
                    <h3 class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-blue-800 sm:text-4xl font-roboto">About Truthbound</h3>
                    <p class="mt-4 text-md text-gray-900 italic ">Connecting Physical Infrastructure with Decentralized Assurance</p>
                </div>
            </div>
            <div class="mt-8 lg:grid lg:grid-cols-2 lg:gap-8">
                <div class="relative lg:row-start-1 lg:col-start-2">
                    <svg class="hidden lg:block absolute top-0 right-0 -mt-20 -mr-20" width="404" height="384" fill="none" viewBox="0 0 404 384" aria-hidden="true">
                        <defs>
                            <pattern id="de316486-4a29-4312-bdfc-fbce2132a2c1" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                                <rect x="0" y="0" width="4" height="4" class="text-blue-200" fill="currentColor" />
                            </pattern>
                        </defs>
                        <rect width="404" height="384" fill="url(#de316486-4a29-4312-bdfc-fbce2132a2c1)" />
                    </svg>
                    <div id="about_image" class="relative text-base mx-auto max-w-prose lg:max-w-none sm:pl-20">
                        <figure>
                            <div class="aspect-w-12 aspect-h-7 lg:aspect-none">
                                <img class="rounded-lg shadow-lg object-cover object-center" src="https://res.cloudinary.com/blockbard/image/upload/c_scale,w_auto,q_auto,f_auto,fl_lossy/v1729008064/truthbound-about-1_o83ezd.png" alt="Crowdfunding the future, one idea at a time">
                            </div>
                            <figcaption class="mt-3 flex text-sm text-gray-500">
                                <svg class="flex-none w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M4 5a2 2 0 00-2 2v8a2 2 0 002 2h12a2 2 0 002-2V7a2 2 0 00-2-2h-1.586a1 1 0 01-.707-.293l-1.121-1.121A2 2 0 0011.172 3H8.828a2 2 0 00-1.414.586L6.293 4.707A1 1 0 015.586 5H4zm6 9a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd" />
                                </svg>
                                <span class="ml-2">Bridging web2 and web3 data</span>
                            </figcaption>
                        </figure>
                    </div>

                </div>
                
                <div class="mt-8 lg:mt-0">

                    <div class="mt-2 prose prose-blue text-gray-600 mx-auto lg:max-w-none lg:row-start-1 lg:col-start-1 text-justify pr-5 space-y-6">

                        <p><span class="font-semibold text-blue-900">Truthbound</span> brings data assertion to the Aptos blockchain, using the Optimistic Oracle V3 from UMA Protocol as its foundation, where data providers can submit off-chain data for validation and make it accessible on-chain for other decentralised applications.</p>

                        <p>Designed as an open-ended data asserter, <span class="font-semibold text-blue-900">Truthbound</span> supports the verification of diverse data types—from financial metrics and stock prices to environmental conditions and social media trends.</p>

                        <p>Each data point is tagged with a unique identifier, allowing independent verifiers to confirm its accuracy, which fosters a system of checks and balances within the blockchain ecosystem.</p>

                        <p>Hence, unlike the Optimistic Oracle, which traditionally caters to financial data, the Data Asserter can assert any data, regardless of type, by verifying its correctness against the data ID.</p> 

                        <p>This makes <span class="font-semibold text-blue-900">Truthbound</span> very suitable for supporting Decentralised Physical Infrastructure Networks (DePIN) by offering a robust way to validate off-chain data critical to these networks, such as readings from environmental sensors, IoT devices, and other physical infrastructure.</p> 

                        <p>For instance, data related to real-world infrastructure—like energy usage or air quality—can be brought on-chain in a trusted and validated manner, enabling a wider range of applications that range from monitoring energy grids to tracking environmental conditions to be integrated with the blockchain.</p> 

                        <p>By bridging the digital and physical worlds,<span class="font-semibold text-blue-900">TruthBound</span> enables DePIN projects to reliably bring and use all forms of data on-chain, expanding possibilities for decentralised networks to manage and verify real-world infrastructure data on the Aptos blockchain.</p> 

                        <p class="font-semibold italic">By 0xBlockBard</p>

                        <p><span class="font-semibold">Twitter / X:</span> <a class="hover:underline hover:text-blue-600" target="_blank" href="https://x.com/0xblockbard">https://x.com/0xblockbard</a></p>

                        <p><span class="font-semibold">Substack Newsletter:</span> <a class="hover:underline hover:text-blue-600" target="_blank" href="https://www.0xblockbard.com/">https://www.0xblockbard.com</a></p>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection