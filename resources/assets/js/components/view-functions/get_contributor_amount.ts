import { aptosClient } from "../utils/aptosClient";
import { MODULE_ADDRESS } from "../../constants";

export type getContributorAmountArguments = {
    campaign_id: number;
    contributor_address : string;
};

export const getContributorAmountInfo = async (args: getContributorAmountArguments): Promise<[number]> => {
    const { campaign_id, contributor_address } = args;
    
    const contributorAmount = await aptosClient().view<[number]>({
        payload: {
            function: `${MODULE_ADDRESS}::crowdfund::get_contributor_amount`,
            typeArguments: [],
            functionArguments: [campaign_id, contributor_address],
        },
    });
    return contributorAmount;
};
