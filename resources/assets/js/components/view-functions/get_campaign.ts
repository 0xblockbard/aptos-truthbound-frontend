import { aptosClient } from "../utils/aptosClient";
import { MODULE_ADDRESS } from "../../constants";

export type getCampaignArguments = {
  campaign_id: number;
};

export const getCampaignInfo = async (args: getCampaignArguments): Promise<[string, string, string, string, number, number, number, number, number, number, number, number, number, number, boolean, boolean]> => {
    const { campaign_id } = args;
    
    const campaignInfo = await aptosClient().view<[string, string, string, string, number, number, number, number, number, number, number, number, number, number, boolean, boolean]>({
        payload: {
            function: `${MODULE_ADDRESS}::crowdfund::get_campaign`,
            typeArguments: [],
            functionArguments: [campaign_id],
        },
    });
    return campaignInfo;
};

// Reference
// (
//     campaign_ref.creator,
//     campaign_ref.name,
//     campaign_ref.description,
//     campaign_ref.image_url,
//     campaign_ref.funding_type,
//     campaign_ref.fee,

//     campaign_ref.funding_goal,
//     campaign_ref.contributed_amount,
//     campaign_ref.claimed_amount,
//     campaign_ref.leftover_amount,
//     campaign_ref.refunded_amount,

//     campaign_ref.duration,
//     campaign_ref.end_timestamp,
    
//     campaign_ref.claimed,
//     campaign_ref.is_successful
// )