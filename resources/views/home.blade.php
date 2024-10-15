@extends('default')

@section('content')

<div class="flex w-full py-24" style="background-image: url('https://res.cloudinary.com/blockbard/image/upload/c_scale,w_auto,q_auto,f_auto,fl_lossy/v1729006078/truthbound-header-1_ev4r1t.png'); background-size: cover; background-position: center;">
  <div class="max-w-7xl">
      <div class="flex flex-col ml-16 sm:ml-40 bg-white opacity-90 px-12 py-4 rounded-md"> 
          <h3 class="text-3xl text-blue-800 font-extrabold">Truthbound Data Asserter</h3>
          <span class="w-14 border-2 border-blue-800 mt-1"></span>
      </div>
  </div>
</div>

<div class="flex flex-col w-full px-10 mt-10">

    <div class="container mx-auto mt-4 px-4 lg:w-10/12">
      
      <div class="w-10/12">
          <h2 class="text-2xl font-bold text-blue-900">Connecting Physical Infrastructure with Decentralized Assurance</h2>

          <p class="text-gray-600 mt-2">Truthbound brings data assertion to the Aptos blockchain, using the Optimistic Oracle V3 from UMA Protocol as its foundation, where data providers can submit off-chain data for validation and make it accessible on-chain for other decentralised applications. </p>

      </div>
      
      <div class="w-full mt-4">

          <h3 class="font-semibold text-lg mt-6 mb-6 text-blue-900">Sample Data Assertions:</h3>
          
          <table class="min-w-full bg-gray-50 border-2 border-blue-900 rounded-md mb-24">

              <thead>
                  <tr class="bg-blue-100 text-blue-800 uppercase text-sm border-b">
                      <th class="py-3 px-4 w-4">ID</th>
                      <th class="py-3 px-4 w-8">Data ID</th>
                      <th class="py-3 px-4 w-60">Data</th>
                      <th class="py-3 px-4 w-80">Description</th>
                      <th class="py-3 px-4 w-8">Status</th>
                  </tr>
              </thead>
              <tbody class="text-sm">
                
                  <tr class="text-gray-800 text-center border-b">
                    <td class="py-2 px-4 ">1</td>
                    <td class="py-2 px-4 text-left">WEATHER_LDN_20241015</td>
                    <td class="py-2 px-4 text-left">{ "temperature": 15, "precipitation": 0.2, "humidity": 60 }</td>
                    <td class="py-2 px-4 text-left">Represents the weather conditions in London on October 15, 2024. Independent parties can verify this by cross-checking with trusted weather data sources.</td>
                    <td class="py-2 px-4 ">
                        <span class="px-2 py-1 text-xs font-semibold text-green-700 bg-green-100 rounded-full">Resolved</span>
                    </td>
                </tr>

                <tr class="text-gray-800 text-center border-b">
                    <td class="py-2 px-4 ">2</td>
                    <td class="py-2 px-4 text-left">BTC_PRICE_20241016_12PM</td>
                    <td class="py-2 px-4 text-left">27500</td>
                    <td class="py-2 px-4 text-left">Asserts the price of Bitcoin at a specific time (October 16, 2024, at 12 PM). Data providers can bring in exchange data to verify the correctness.</td>
                    <td class="py-2 px-4 ">
                        <span class="px-2 py-1 text-xs font-semibold text-green-700 bg-green-100 rounded-full">Resolved</span>
                    </td>
                </tr>

                <tr class="text-gray-800 text-center border-b">
                  <td class="py-2 px-4 ">3</td>
                  <td class="py-2 px-4 text-left">VALIDATOR_0x1234_STATUS_20241016</td>
                  <td class="py-2 px-4 text-left">{ "status": "active", "balance": 3200, "performance_score": 95 }</td>
                  <td class="py-2 px-4 text-left">Details the status of a specific Beacon Chain validator on a particular date. It’s useful for tracking the validator’s status in real-time or at specific intervals.</td>
                  <td class="py-2 px-4 ">
                      <span class="px-2 py-1 text-xs font-semibold text-green-700 bg-green-100 rounded-full">Resolved</span>
                  </td>
                </tr>


                <tr class="text-gray-800 text-center border-b">
                  <td class="py-2 px-4 ">4</td>
                  <td class="py-2 px-4 text-left">LSD_ETH_20241016</td>
                  <td class="py-2 px-4 text-left">{ "staked_amount": 100, "liquidity_ratio": 1.05, "total_yield": 5 }</td>
                  <td class="py-2 px-4 text-left">Represents data related to a liquid staking derivative position, such as the amount staked in ETH, the liquidity ratio, and the yield accrued.</td>
                  <td class="py-2 px-4 ">
                      <span class="px-2 py-1 text-xs font-semibold text-green-700 bg-green-100 rounded-full">Resolved</span>
                  </td>
                </tr>

                <tr class="text-gray-800 text-center border-b">
                  <td class="py-2 px-4 ">5</td>
                  <td class="py-2 px-4 text-left">OFF_CHAIN_COMPUTE_20241016</td>
                  <td class="py-2 px-4 text-left">{ "input": [1,2,3,4,5], "algorithm": "FFT", "output": [15, -4, 3, 7, -2] }</td>
                  <td class="py-2 px-4 text-left">Provides an assertion for the result of an off-chain Fast Fourier Transform (FFT) computation. This shows how complex off-chain computations can have their results asserted on-chain for verification.</td>
                  <td class="py-2 px-4 ">
                      <span class="px-2 py-1 text-xs font-semibold text-green-700 bg-green-100 rounded-full">Resolved</span>
                  </td>
                </tr>

                <tr class="text-gray-800 text-center border-b">
                  <td class="py-2 px-4 ">6</td>
                  <td class="py-2 px-4 text-left">REPI_LA_20241015</td>
                  <td class="py-2 px-4 text-left">678.23</td>
                  <td class="py-2 px-4 text-left">Asserts the Real Estate Price Index (REPI) for Los Angeles on October 15, 2024. Useful for tokenized real estate or property derivatives.</td>
                  <td class="py-2 px-4 ">
                      <span class="px-2 py-1 text-xs font-semibold text-green-700 bg-green-100 rounded-full">Resolved</span>
                  </td>
                </tr>

                <tr class="text-gray-800 text-center border-b">
                  <td class="py-2 px-4 ">7</td>
                  <td class="py-2 px-4 text-left">WORLD_SERIES_2024_WINNER</td>
                  <td class="py-2 px-4 text-left">Texas Rangers</td>
                  <td class="py-2 px-4 text-left">Asserts the winner of the 2024 World Series. Third-party verifiers can check against official sports event results.</td>
                  <td class="py-2 px-4 ">
                      <span class="px-2 py-1 text-xs font-semibold text-green-700 bg-green-100 rounded-full">Resolved</span>
                  </td>
                </tr>

                <tr class="text-gray-800 text-center border-b">
                  <td class="py-2 px-4 ">8</td>
                  <td class="py-2 px-4 text-left">CARBON_EMISSIONS_LDN_20241016</td>
                  <td class="py-2 px-4 text-left">{ "CO2": 12.3, "CH4": 2.1, "N2O": 0.4 }</td>
                  <td class="py-2 px-4 text-left">Represents carbon emissions in London for October 16, 2024. This is useful for environmental monitoring and regulatory compliance verification.</td>
                  <td class="py-2 px-4 ">
                      <span class="px-2 py-1 text-xs font-semibold text-green-700 bg-green-100 rounded-full">Resolved</span>
                  </td>
                </tr>

                <tr class="text-gray-800 text-center border-b">
                  <td class="py-2 px-4 ">9</td>
                  <td class="py-2 px-4 text-left">POLL_2024_ELECTION</td>
                  <td class="py-2 px-4 text-left">{ "Candidate_A": 48.5, "Candidate_B": 46.2, "Undecided": 5.3 }</td>
                  <td class="py-2 px-4 text-left">Asserts the results of a political poll, such as for an election. Verifiers can compare this with published poll results for verification.</td>
                  <td class="py-2 px-4 ">
                      <span class="px-2 py-1 text-xs font-semibold text-green-700 bg-green-100 rounded-full">Resolved</span>
                  </td>
                </tr>

              
              </tbody>

          </table>
      </div>
  </div>

</div>
@endsection
