<nav class="fixed w-full bg-white shadow z-20 dark:bg-black dark:border-b border-b border-transparent dark:border-gray-500 ">
    <div class="max-w-full mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-14">
            <div class="flex sm:w-3/5">
                <div class="flex-shrink-0 flex items-center">

                    <a href="{{ route('home') }}" class="inline-flex items-center py-2 ml-2 relative top-0.5">
                        <span class=" text-lg font-extrabold text-blue-800 hover:text-blue-900">TruthBound</span>
                    </a>

                </div>

                <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                    
                    <a href="{{ route('about') }}" class="{{ \Request::route()->getName() == 'about' ? 'border-blue-900 text-blue-900 font-semibold' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-blue-900' }} inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium hover:border-blue-900">
                        About
                    </a>

                    <a href="{{ route('assert_data') }}" class="{{ \Request::route()->getName() == 'assert_data' ? 'border-blue-900 text-blue-900 font-semibold' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-blue-900' }} inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium hover:border-blue-900">
                        Assert Data
                    </a>

                </div>

            </div>

        <div class="ml-6 flex items-center">

            <div id="connect-wallet" class="connect_wallet cursor-pointer text-sm font-semibold">
                connect
            </div>

        </div>

</nav>
