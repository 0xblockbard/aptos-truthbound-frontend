@extends('default')

@section('content')

    <div class="flex w-full py-24 shadow-md" style="background-image: url('https://res.cloudinary.com/blockbard/image/upload/c_scale,w_auto,q_auto,f_auto,fl_lossy/v1729006078/truthbound-header-1_ev4r1t.png'); background-size: cover; background-position: center;">
        <div class="max-w-7xl">
            <div class="flex flex-col ml-40 bg-white opacity-90 px-12 py-4 rounded-md"> 
                <h3 class="text-3xl text-blue-800 font-extrabold">Guide: How it works</h3>
                <span class="w-20 border-2 border-blue-800 mt-1"></span>
            </div>
        </div>
    </div>

    <div class="flex flex-col w-9/12 px-12 pt-16 pb-24 m-auto">

        <div class="flex flex-col pl-3">

            <div class="bg-gray-50 border-2 border-blue-800 p-4 rounded-md shadow-lg shadow-blue-200">
                
                <div class="mt-2 px-10 py-6 text-gray-600 space-y-6">

                    <h2 class="font-semibold text-2xl">Data Assertion Flow</h2>

                    <h3 class="font-semibold">Data Submission:</h3>
                    <p>
                    A data provider collects off-chain data, such as environmental metrics from sensors or financial data from market sources. Each data point is then associated with a unique identifier to distinguish it from other submissions.
                    </p>
                    <p>
                    The data provider submits this data point along with its unique identifier to the Truthbound module. This submission includes a bond to ensure the integrity of the data, which will be returned if the data remains undisputed.
                    </p>

                    <h3 class="font-semibold">Data Assertion and Validation:</h3>
                    <p>
                    Once submitted, the data point enters a two-hour validation period. During this time, the data is open to verification and potential disputes. After two hours, if no disputes have been raised, the data is resolved as true and accessible for use by decentralized applications.
                    </p>
                    <p>
                    Independent verifiers, or disputers, can review the data to confirm its accuracy. If a verifier finds any discrepancies, they can raise a dispute, triggering the dispute resolution process.
                    </p>

                    <h3 class="font-semibold">Dispute Resolution:</h3>
                    <p>
                    If a dispute arises, Truthbound’s escalation manager initiates the dispute resolution process. The bond put up by the data provider acts as collateral during this phase, incentivizing accurate data submission.
                    </p>
                    <p>
                    The resolution process may involve further examination by other network participants or an external oracle mechanism. The escalation manager then decides whether to uphold or reject the disputed data.
                    </p>
                    <p>
                    If the data is found to be incorrect, the data provider’s bond is forfeited and a portion of it will be awarded to the disputer. If no dispute occurs or the data is verified as accurate, the bond is returned to the data provider.
                    </p>

                    <h3 class="font-semibold">Finalization and On-Chain Availability:</h3>
                    <p>
                    After the validation period, and if no disputes are raised, the data point is confirmed as accurate and becomes permanently available on-chain. It can now be accessed and used by decentralized applications within the Aptos ecosystem.
                    </p>
                    <p>
                    This data assertion flow ensures that off-chain data is carefully validated before becoming an on-chain resource, enabling decentralized applications to utilize accurate and trustworthy information while maintaining transparency and accountability in the process.
                    </p>

                    
                </div>

            </div>

        </div>

    </div>

@endsection
