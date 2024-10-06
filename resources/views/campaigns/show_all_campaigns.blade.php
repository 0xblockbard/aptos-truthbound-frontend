@extends('default')

@section('content')

    <div class="flex w-full py-24" style="background-image: url('https://res.cloudinary.com/blockbard/image/upload/c_scale,w_auto,q_auto,f_auto,fl_lossy/v1728018293/header-2.png'); background-size: cover; background-position: center;">
        <div class="max-w-7xl">
            <div class="flex flex-col ml-40 bg-white opacity-90 px-12 py-4 rounded-md"> 
                <h3 class="text-3xl text-indigo-600 font-extrabold">Campaigns</h3>
                <span class="w-14 border-2 border-indigo-600 mt-1"></span>
            </div>
        </div>
    </div>

    <div class="flex max-w-7xl w-full px-6 py-6 mx-auto">

        <div class="flex flex-col w-full mt-2 ml-4 mb-10">

            <div class="w-full mx-auto mt-6">

                <div id="show_all_campaigns" class="flex flex-col rounded-lg overflow-hidden w-full">
                
                </div> 

            </div>
        </div>
    </div>

@endsection