import { aptosClient } from "../utils/aptosClient";
import { MODULE_ADDRESS } from "../../constants";

export const getNextCampaignId = async (): Promise<[number]> => {
    
    const next_campaign_id = await aptosClient().view<[number]>({
        payload: {
            function: `${MODULE_ADDRESS}::crowdfund::get_next_campaign_id`,
            typeArguments: [],
            functionArguments: [],
        },
    });
    return next_campaign_id;
};