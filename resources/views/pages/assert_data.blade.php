@extends('default')

@section('content')

    <div class="flex w-full py-24 shadow-md" style="background-image: url('https://res.cloudinary.com/blockbard/image/upload/c_scale,w_auto,q_auto,f_auto,fl_lossy/v1729006250/truthbound-header-3_m5p5o4.png'); background-size: cover; background-position: center;">
        <div class="max-w-7xl">
            <div class="flex flex-col ml-40 bg-white opacity-90 px-12 py-4 rounded-md"> 
                <h3 class="text-3xl text-blue-900 font-extrabold">Assert Data</h3>
                <span class="w-20 border-2 border-blue-900 mt-1"></span>
            </div>
        </div>
    </div>

    <div class="flex flex-col w-9/12 px-12 pt-16 pb-24 m-auto">

        <div class="flex flex-col pl-3">

            <div class="bg-blue-50 border-2 border-blue-400 p-4 rounded-md shadow-lg shadow-blue-200">
                
                <div class="mt-2 px-10 py-6 text-gray-600 space-y-6">

                    <h2 class="font-semibold text-2xl">Assert Data</h2>

                    <p>Submit some arbitrary data to the Truthbound Data Asserter:</p>
{{--                     
                    <p>On initialization, the KYC Controller admin can define a set of valid countries and investor statuses that KYC Registrars will use for user KYC verification.</p>

                    <p>Each entry is assigned a unique ID—for instance, “US” may be mapped to 0, and “France” to 1. Similarly, investor statuses like “standard” and “accredited” may correspond to 0 and 1, respectively. KYC Registrars can only use these predefined IDs when verifying users, ensuring compliance with valid criteria.</p>

                    <p>The admin can then appoint KYC Registrars, specifying the registrar’s account address, name, description, and image. If necessary, the admin can pause or remove a KYC Registrar from the module.</p>

                    <p>KYC Registrars will then be able to verify a user’s identity and set their country and investor status. Each user is limited to management by a single Registrar to prevent conflicts.</p>

                    <p>The KYC Controller admin also sets transaction policies, which consist of the following properties:</p>

                    <ul class="list-disc pl-5 space-y-2">
                        <li><strong>Blacklist countries:</strong> Transactions are blocked if either the sender or receiver's country is blacklisted by the other party.</li>
                        <li><strong>Can Send:</strong> Controls whether users under this policy can initiate transactions.</li>
                        <li><strong>Can Receive:</strong> Controls whether users can receive transactions.</li>
                        <li><strong>Max Transaction Amount:</strong> Defines the maximum amount allowed per transaction.</li>
                        <li>
                        <strong>Apply Transaction Count Velocity:</strong> Enforces a cap on the number of transactions from a single address within a specific timeframe. It includes:
                        <ul class="list-disc pl-5 space-y-1 mt-2">
                            <li><strong>Transaction Count Velocity Timeframe:</strong> Duration (in seconds) for which the transaction count limit applies.</li>
                            <li><strong>Transaction Count Velocity Max:</strong> The maximum allowable transactions within the timeframe.</li>
                        </ul>
                        </li>
                        <li>
                        <strong>Apply Transaction Amount Velocity:</strong> Enforces a cap on the total transaction amount from a single address within a specific timeframe. It includes:
                        <ul class="list-disc pl-5 space-y-1 mt-2">
                            <li><strong>Transaction Amount Velocity Timeframe:</strong> Duration (in seconds) for which the amount limit applies.</li>
                            <li><strong>Transaction Amount Velocity Max:</strong> The maximum transaction amount within this timeframe.</li>
                        </ul>
                        </li>
                    </ul>

                    <p>When transactions or balance modifications occur, these checks are enforced based on the user’s identity and relevant transaction policies.</p>

                    <p>Successful transactions must pass all applicable checks, ensuring regulatory compliance and security.</p> --}}

                    
                </div>

            </div>

        </div>

    </div>

@endsection
