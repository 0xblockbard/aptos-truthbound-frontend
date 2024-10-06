import "../sass/app.scss";

import ReactDOM from 'react-dom/client'; 

import { NETWORK } from "./constants";
import { WalletSelector } from './components/WalletSelector';
import { WalletProvider } from "./components/WalletProvider";
import { aptosClient } from "./components/utils/aptosClient";
import { useWallet } from "@aptos-labs/wallet-adapter-react";
import { Aptos, AptosConfig, Network } from "@aptos-labs/ts-sdk";
import { useState, useEffect } from "react";

// entry functions
import { createCampaign } from "./components/entry-functions/create_campaign";
import { updateCampaign } from "./components/entry-functions/update_campaign";
import { contribute } from "./components/entry-functions/contribute";
import { refund } from "./components/entry-functions/refund";
import { claimFunds } from "./components/entry-functions/claim_funds";
import { updateConfig } from "./components/entry-functions/update_config";

// view functions
import { getCampaignInfo } from "./components/view-functions/get_campaign";
import { getConfigInfo } from "./components/view-functions/get_config";
import { getNextCampaignId } from "./components/view-functions/get_next_campaign_id";
import { getContributorAmountInfo } from "./components/view-functions/get_contributor_amount";
import { accountAPTBalance } from "./components/view-functions/accountBalance";

import { useGetAllCampaigns } from "./components/hooks/useGetAllCampaigns"; 

// start

var contributeSuccessMessage = `
    <div class="success_notification rounded-md bg-green-50 p-4 mt-2 mb-1 border border-green-600">
        <div class="flex">
            <div class="flex-shrink-0">
                <svg class="h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                </svg>
            </div>
            <div class="ml-3">
                <p class="sucess_message text-sm font-medium text-green-800">Your pledge is successful. Thanks for your contribution!</p>
            </div>
        </div>
    </div>`;

var refundSuccessMessage = `
    <div class="success_notification rounded-md bg-green-50 p-4 mt-2 mb-1 border border-orange-600">
        <div class="flex">
            <div class="flex-shrink-0">
                <svg class="h-5 w-5 text-orange-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                </svg>
            </div>
            <div class="ml-3">
                <p class="sucess_message text-sm font-medium text-orange-800"> Your refund is successful.</p>
            </div>
        </div>
    </div>`;


var claimFundsSuccessMessage = `
    <div class="success_notification rounded-md bg-green-50 p-4 mt-2 mb-1 border border-green-600">
        <div class="flex">
            <div class="flex-shrink-0">
                <svg class="h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                </svg>
            </div>
            <div class="ml-3">
                <p class="sucess_message text-sm font-medium text-green-800">Congratulations! Your funds have been claimed.</p>
            </div>
        </div>
    </div>`;


function CreateNewCampaignFormSubmitButton() {
    const { account, signAndSubmitTransaction } = useWallet();
  
    const createNewCampaign = async () => {
      try {
        
        let aptosConfig = new AptosConfig({ network: NETWORK });
        let aptos       = new Aptos(aptosConfig);

        const nextCampaignId = await getNextCampaignId();
        
        var create_campaign_form = $('.create_campaign_form');
  
        let name: string        = create_campaign_form.find('.name').val() as string;
        let description: string = create_campaign_form.find('.description').val() as string;
        let image_url: string   = create_campaign_form.find('.image_url').val() as string;
        let funding_goal        = create_campaign_form.find('.funding_goal').val() as number;
        let type                = create_campaign_form.find('.crowdfund_type').val();
        let duration            = create_campaign_form.find('.duration').val();
        duration                = convertDurationToSeconds(duration);
        let funding_type        = (type === 'KIA') ? 0 : 1;
        let decimals            = 8;

        const response = await signAndSubmitTransaction(
          createCampaign({
            name,
            description,
            image_url,
            funding_goal,
            duration,
            funding_type,
            decimals,
          })
        );
  
        // Wait for transaction to complete
        console.log('executing');
        await aptos.waitForTransaction({ transactionHash: response.hash });
  
        // redirect to show campaign page
        window.location.replace(`/campaigns/${nextCampaignId}`);

      } catch (error) {
        console.log(error);
      }
    };
  
    return (
      <div>
        <button
          className="create_campaign flex m-auto px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
          onClick={createNewCampaign}
        >
          Start Campaign
        </button>
      </div>
    );
}


function UpdateCampaignFormSubmitButton() {
    const { account, signAndSubmitTransaction } = useWallet();

    const updateCampaignForm = async () => {
      try {
        
        let aptosConfig = new AptosConfig({ network: NETWORK });
        let aptos       = new Aptos(aptosConfig);
        
        var update_campaign_form = $('.update_campaign_form');
  
        let campaign_id: number = update_campaign_form.find('.campaign_id').val() as number;
        let name: string        = update_campaign_form.find('.name').val() as string;
        let description: string = update_campaign_form.find('.description').val() as string;
        let image_url: string   = update_campaign_form.find('.image_url').val() as string;

        const response = await signAndSubmitTransaction(
          updateCampaign({
            campaign_id,
            name,
            description,
            image_url
          })
        );
  
        // Wait for transaction to complete
        console.log('executing');
        await aptos.waitForTransaction({ transactionHash: response.hash });
  
        // redirect to show campaign page
        window.location.replace(`/campaigns/${campaign_id}`);

      } catch (error) {
        console.log(error);
      }
    };
  
    return (
      <div>
        <button
          className="update_campaign flex m-auto px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
          onClick={updateCampaignForm}
        >
          Update Campaign
        </button>
      </div>
    );
}


function ContributeButton() {
    const { account, signAndSubmitTransaction } = useWallet();

    const contributeForm = async () => {
      try {
        
        let aptosConfig = new AptosConfig({ network: NETWORK });
        let aptos       = new Aptos(aptosConfig);

        const decimals = 8;

        const campaignIdElement = document.getElementById('campaignId');
        let campaign_id = Number(campaignIdElement.getAttribute('data-campaign-id'));
        
        var contribute_form = $('.contribute_form');
        let amount: number = contribute_form.find('.contribution').val() as number;

        const response = await signAndSubmitTransaction(
          contribute({
            campaign_id,
            amount,
            decimals
          })
        );
  
        // Wait for transaction to complete
        console.log('executing');
        await aptos.waitForTransaction({ transactionHash: response.hash });
  
        // update total contribution amount
        console.log('success contributed');

        // Refetch campaign data after the contribution is confirmed
        const campaignData = await fetchCampaignData(campaign_id);

        renderCampaignInfo(campaignData);

        $('.notification_container').find('.general_notification').remove();
        $(contributeSuccessMessage).appendTo('.notification_container').fadeIn(2000);

        setTimeout(() => {
            $('.notification_container .success_notification').fadeOut(1000);
        }, 5000);

      } catch (error) {
        console.log(error);
      }
    };
  
    return (
      <div>
        <button
          id="pledge"
          className={`pledge ${!account ? 'opacity-40 cursor-not-allowed' : ''} bg-indigo-500 flex items-center justify-center text-white active:bg-indigo-600 font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150`}
          onClick={contributeForm}
        >
            <svg xmlns="http://www.w3.org/2000/svg" className="inline h-5 w-5 text-white mr-3" fill="currentColor" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
            </svg>
            Pledge
        </button>
      </div>
    );
    
}


function ClaimFundsButton() {
  const { account, signAndSubmitTransaction } = useWallet();
  const [isCreator, setIsCreator] = useState(false); // State to track if the connected wallet is the creator
  const [campaignData, setCampaignData] = useState(null);

  useEffect(() => {
    const checkIfCreator = async () => {
      try {
        const campaignIdElement = document.getElementById('campaignId');
        if (campaignIdElement) {
          let campaign_id = Number(campaignIdElement.getAttribute('data-campaign-id'));

          // Fetch campaign data
          const campaignData = await fetchCampaignData(campaign_id);
          setCampaignData(campaignData); // Store campaign data for potential use

          // Check if the connected wallet is the creator
          if (account?.address === campaignData.creator) {
            setIsCreator(true);
          }
        }
      } catch (error) {
        console.error('Error checking creator:', error);
      }
    };

    if (account?.address) {
      checkIfCreator(); // Check when the account is connected
    }
  }, [account]);

  const claimFundsForm = async () => {
    try {
      let aptosConfig = new AptosConfig({ network: NETWORK });
      let aptos = new Aptos(aptosConfig);

      const campaignIdElement = document.getElementById('campaignId');
      let campaign_id = Number(campaignIdElement.getAttribute('data-campaign-id'));

      // Only allow claiming funds if the current wallet is the creator
      if (isCreator) {
        const response = await signAndSubmitTransaction(
          claimFunds({ campaign_id })
        );

        // Wait for transaction to complete
        console.log('Executing transaction...');
        await aptos.waitForTransaction({ transactionHash: response.hash });
        console.log('Success: Funds claimed');

        $('.notification_container').find('.general_notification').remove();
        $(claimFundsSuccessMessage).appendTo('.notification_container').fadeIn(2000);

        setTimeout(() => {
            $('.notification_container .success_notification').fadeOut(1000);
        }, 5000);

      } else {
        console.log('Only the campaign creator can claim the funds.');
      }
    } catch (error) {
      console.error('Error claiming funds:', error);
    }
  };

  return (
    <div>
      {isCreator ? (
        <button
          className="disabled:opacity-50 bg-green-500 flex items-center justify-center text-white active:bg-green-600 font-bold uppercase text-sm px-6 py-3 ml-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
          onClick={claimFundsForm}
        >
          Claim Funds
        </button>
      ) : ""}
    </div>
  );
}


function RefundButton() {
  const { account, signAndSubmitTransaction } = useWallet();
  const [isContributor, setIsContributor] = useState(false);
  const [campaignData, setCampaignData] = useState(null);

  useEffect(() => {
    const checkIfContributor = async () => {
      try {
        const campaignIdElement = document.getElementById('campaignId');
        if (!campaignIdElement) {
          console.error('Campaign ID element not found');
          return;
        }

        let campaign_id = Number(campaignIdElement.getAttribute('data-campaign-id'));

        // Fetch campaign data
        const fetchedCampaignData = await fetchCampaignData(campaign_id);
        setCampaignData(fetchedCampaignData);

        // Check contribution amount for all-or-nothing campaigns
        if (fetchedCampaignData.funding_type === 1) {

          const contributionData = await getContributorAmount(campaign_id, account?.address);
          const contributionAmount = contributionData?.contributorInfo?.[0] ?? 0; 

          // user can get refund only if campaign is over and it has not been claimed 
          if(fetchedCampaignData.claimed == false && new Date() >= new Date(fetchedCampaignData.end_timestamp * 1000)){
            if(contributionAmount > 0){
              setIsContributor(true);
            }
          }
          
        }
      } catch (error) {
        console.error('Error checking contributor:', error);
      }
    };

    if (account?.address) {
      checkIfContributor();
    }

  }, [account?.address]);

  const submitRefund = async () => {
    try {
      let aptosConfig = new AptosConfig({ network: NETWORK });
      let aptos = new Aptos(aptosConfig);

      const campaignIdElement = document.getElementById('campaignId');
      if (!campaignIdElement) {
        console.error('Campaign ID element not found');
        return;
      }
      let campaign_id = Number(campaignIdElement.getAttribute('data-campaign-id'));

      if (isContributor) {
        const response = await signAndSubmitTransaction(
          refund({ campaign_id })
        );

        // Wait for transaction completion
        await aptos.waitForTransaction({ transactionHash: response.hash });
        console.log('Success: Funds refunded');

        $('.notification_container').find('.general_notification').remove();
        $(refundSuccessMessage).appendTo('.notification_container').fadeIn(2000);

        setTimeout(() => {
          $('.notification_container .success_notification').fadeOut(1000);
        }, 5000);

      } else {
        console.log('Only contributors can refund.');
      }
    } catch (error) {
      console.error('Error refunding:', error);
    }
  };

  return (
    <div>
      {isContributor && (
        <button
          className="disabled:opacity-50 bg-orange-500 flex items-center justify-center text-white active:bg-orange-600 font-bold uppercase text-sm px-6 py-3 ml-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
          onClick={submitRefund}
        >
          Refund
        </button>
      )}
    </div>
  );
}




function EditCampaignDiv() {
  const { account } = useWallet();
  const [isCreator, setIsCreator] = useState(false); // State to track if the connected wallet is the creator
  const [campaignData, setCampaignData] = useState(null); // Store campaign data
  const [campaignId, setCampaignId] = useState<number | null>(null); // Store campaign ID

  useEffect(() => {
    const checkIfCreator = async () => {
      try {
        const campaignIdElement = document.getElementById('campaignId');
        if (campaignIdElement) {
          const campaign_id = Number(campaignIdElement.getAttribute('data-campaign-id'));
          setCampaignId(campaign_id); // Store campaign ID

          // Fetch campaign data
          const campaignData = await fetchCampaignData(campaign_id);
          setCampaignData(campaignData); // Store campaign data for potential use

          // Check if the connected wallet is the creator
          if (account?.address === campaignData.creator) {
            setIsCreator(true);
          }
        }
      } catch (error) {
        console.error('Error checking creator:', error);
      }
    };

    if (account?.address) {
      checkIfCreator(); 
    }
  }, [account]);

  return (
    <div>
      {isCreator && campaignId !== null ? (
        <span className="inline ml-3 text-xs text-gray-700 hover:pointer hover:text-gray-800">
          <a href={`/campaigns/${campaignId}/info`}>
            Edit Campaign
          </a>
        </span>
      ) : null}
    </div>
  );
}







const walletDiv = document.getElementById('connect-wallet');
if (walletDiv) {
    const root = ReactDOM.createRoot(walletDiv); 
    
    root.render(
        <WalletProvider>
            <WalletSelector />
        </WalletProvider>
    );
}

const createNewCampaignFormDiv = document.getElementById('create_campaign_form_submit');
if (createNewCampaignFormDiv) {
  const root = ReactDOM.createRoot(createNewCampaignFormDiv);
  root.render(
    <WalletProvider>
      <CreateNewCampaignFormSubmitButton />
    </WalletProvider>
  );
}

const editNewCampaignFormDiv = document.getElementById('update_campaign_form_submit');
if (editNewCampaignFormDiv) {
  const root = ReactDOM.createRoot(editNewCampaignFormDiv);
  root.render(
    <WalletProvider>
      <UpdateCampaignFormSubmitButton />
    </WalletProvider>
  );
}

const contributeFormDiv = document.getElementById('contribute_submit');
if (contributeFormDiv) {
  const root = ReactDOM.createRoot(contributeFormDiv);
  root.render(
    <WalletProvider>
      <ContributeButton />
    </WalletProvider>
  );
}

const claimFundsDiv = document.getElementById('claim_funds_submit');
if (claimFundsDiv) {
  const root = ReactDOM.createRoot(claimFundsDiv);
  root.render(
    <WalletProvider>
      <ClaimFundsButton />
    </WalletProvider>
  );
}


const refundDiv = document.getElementById('refund_submit');
if (refundDiv) {
  const root = ReactDOM.createRoot(refundDiv);
  root.render(
    <WalletProvider>
      <RefundButton />
    </WalletProvider>
  );
}


const editCampaignDiv = document.getElementById('edit_campaign');
if (editCampaignDiv) {
  const root = ReactDOM.createRoot(editCampaignDiv);
  root.render(
    <WalletProvider>
      <EditCampaignDiv />
    </WalletProvider>
  );
}


// helpers

// Function to convert duration string to seconds
function convertDurationToSeconds(duration) {
    // Extract the number part and convert it to an integer
    let days = parseInt(duration);

    // Convert days to seconds (1 day = 86400 seconds)
    let seconds = days * 86400;

    return seconds;
}


function CampaignList() {
    const { campaigns, isLoading, error } = useGetAllCampaigns();
  
    if (isLoading) return <div className="text-center">Loading all campaigns...</div>;
    if (error) return <div>Error fetching campaigns</div>;
  
    return (
      <div className="w-full mx-auto grid gap-6 lg:grid-cols-3 pb-6">
        {campaigns?.map((campaign, index) => (
          <div key={index} className="flex flex-col rounded-lg shadow-lg overflow-hidden">
            {/* Campaign Image and Status */}
            <div className="flex-shrink-0 relative">
              <a href={`/campaigns/${index}`}>
                <img
                  className="lazy h-72 w-full object-cover hover:opacity-70"
                  src={campaign.image_url ? campaign.image_url : 'https://via.placeholder.com/800'}
                  alt={campaign.name}
                />
              </a>
  
              {/* Success and Completion Status */}
              <div className="absolute bottom-8 right-3">
                {campaign.is_successful && (
                  <span className="inline-flex items-center px-2.5 py-0.5 rounded-sm text-xs font-medium bg-green-100 text-green-800">
                    Successful
                  </span>
                )}
                {!campaign.is_successful && new Date() < new Date(campaign.end_timestamp * 1000) && (
                    <span className="inline-flex items-center px-2.5 py-0.5 rounded-sm text-xs font-medium bg-blue-100 text-blue-800">
                    Ongoing
                    </span>
                )}
                {!campaign.is_successful && new Date() >= new Date(campaign.end_timestamp * 1000) && (
                    <span className="inline-flex items-center px-2.5 py-0.5 rounded-sm text-xs font-medium bg-yellow-100 text-yellow-800">
                    Completed
                    </span>
                )}
              </div>
  
              {/* Progress Bar */}
              <div className="relative -top-3 overflow-hidden h-3 text-xs flex bg-indigo-200">
                <div
                  style={{
                    width: `${(campaign.contributed_amount / campaign.funding_goal) * 100}%`,
                  }}
                  className="progress_bar shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-indigo-600"
                ></div>
              </div>
            </div>
  
            {/* Campaign Details */}
            <div className="flex-1 bg-white pt-3 p-6 flex flex-col justify-between dark:bg-gray-800">
              <div className="flex-1">
                <p className="text-xl font-semibold showcase_text_gray_900">
                  <a href={`/campaigns/${index}`} className="hover:underline">
                    {campaign.name}
                  </a>
                </p>
                <p className="mt-3 text-base text-gray-500 dark:text-gray-300 text-justify">
                    {campaign.description.length > 300
                        ? `${campaign.description.slice(0, 300)}...`
                        : campaign.description}
                </p>
              </div>
  
              {/* Campaign Stats */}
            <div className="mt-6 flex items-center pt-4 border-t border-gray-200">
              <div className="flex w-full justify-between">
                {new Date() >= new Date(campaign.end_timestamp * 1000) ? (
                  <p className="flex text-sm font-medium text-gray-900">Completed</p>
                ) : (
                  <p className="flex text-sm font-medium text-gray-900">
                    {Math.max(0, Math.round((campaign.end_timestamp - Date.now() / 1000) / 86400))} Days Left
                  </p>
                )}
                <div className="flex text-sm text-gray-900">
                  <span className="font-semibold pr-2">Target:</span>
                  <span>{campaign.funding_goal} APT</span>
                </div>
              </div>
            </div>

            </div>
          </div>
        ))}
      </div>
    );
  }
  

const showAllCampaignsDiv = document.getElementById('show_all_campaigns');
if (showAllCampaignsDiv) {
  const root = ReactDOM.createRoot(showAllCampaignsDiv);
  root.render(
    <WalletProvider>
      <CampaignList />
    </WalletProvider>
  );
}


function fetchCampaignData(campaign_id): Promise<any> {

    // Fetch campaign data using id
    return getCampaignInfo({ campaign_id })
        .then((campaignInfo) => {

            return {
                creator: campaignInfo[0] as string,
                name: campaignInfo[1] as string,
                description: campaignInfo[2] as string,
                image_url: campaignInfo[3] as string,
                funding_type: campaignInfo[4] as number,
                
                fee: campaignInfo[5],
                funding_goal: campaignInfo[6],
                contributed_amount: campaignInfo[7],
                claimed_amount: campaignInfo[8],
                leftover_amount: campaignInfo[9],
                refunded_amount: campaignInfo[10],

                duration: campaignInfo[11],
                end_timestamp: campaignInfo[12],

                claimed: campaignInfo[13],
                is_successful: campaignInfo[14],
            };
        })
        .catch((error) => {
            console.error('Error fetching campaign data:', error);
            throw error;
        });
}


function getContributorAmount(campaign_id, contributor): Promise<any> {

  // Fetch campaign data using id
  return getContributorAmountInfo({ campaign_id, contributor_address: contributor })
      .then((contributorInfo) => {
          return {
            contributorInfo
          };
      })
      .catch((error) => {
          console.error('Error fetching contributor info :', error);
          throw error;
      });
}


function updateCampaignForm(campaignData: { name: string; description: string; image_url: string }) {
    $('.update_campaign_form #name').val(campaignData.name);
    $('.update_campaign_form #description').val(campaignData.description);
    $('.update_campaign_form #image_url').val(campaignData.image_url);
}

function renderCampaignInfo(campaignData: { 
    creator: string;
    name: string; 
    description: string;
    image_url: string; 
    end_timestamp: number,
    funding_type: number,
    contributed_amount: number,
    funding_goal: number
}) {

    // const campaign_id = (window as any).campaignId;
    const decimals = 8;

    const campaignIdElement = document.getElementById('campaignId');
    let campaign_id = Number(campaignIdElement.getAttribute('data-campaign-id')) + 1;

    $('.single_campaign #count').text("Campaign #" + campaign_id);
    $('.single_campaign #creator').text(campaignData.name);
    $('.single_campaign #name').text(campaignData.name);
    $('.single_campaign #description').text(campaignData.description);
    $('.single_campaign #featured_image').attr('src', campaignData.image_url);

    let days_remaining = Math.max(0, Math.round((campaignData.end_timestamp - Date.now() / 1000) / 86400));
    if(days_remaining > 0){
      $('.single_campaign #days_remaining').text(days_remaining);
    } else {
      $('.single_campaign_container').text("Completed");
    };

    $('.single_campaign #contributed_amount').text(campaignData.contributed_amount / 10**decimals);
    $('.single_campaign #target_amount').text(campaignData.funding_goal / 10**decimals);

    // percentage raise
    let percentage_raised = (campaignData.contributed_amount / campaignData.funding_goal) * 100;
    $('.single_campaign #amount_raised_percentage').text(percentage_raised + '%');
    $('.single_campaign #progress_bar').css('width', percentage_raised.toFixed(2) + '%');

    if(campaignData.funding_type == 0){
        $('.single_campaign #cf_type').text("Flexible");
    } else if (campaignData.funding_type == 1){
        $('.single_campaign #cf_type').text("Fixed");
    }
}



$(document).ready(function () {
    
    const currentPath       = window.location.pathname;
    const campaignIdElement = document.getElementById('campaignId');
    
    if (campaignIdElement) {
        let campaign_id = Number(campaignIdElement.getAttribute('data-campaign-id'));
        console.log('campaign_id:', campaign_id);

        if (isNaN(campaign_id)) {
            console.error('Invalid campaign ID');
            return;
        }

        if (currentPath.includes("/info")) {
            fetchCampaignData(campaign_id)
                .then((campaignData) => {
                    updateCampaignForm(campaignData);
                });
        } else if (currentPath.includes("/campaigns")) {
            fetchCampaignData(campaign_id)
                .then((campaignData) => {
                    renderCampaignInfo(campaignData);
                });
        }
    };

    // if (currentPath.includes("/about")) {
    //   $(document).ready(function() {
    //     $('#mydiv').scrollToFixed();
    //   });
    // };
    
    

});


