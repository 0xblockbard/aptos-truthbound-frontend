import { aptosClient } from "../utils/aptosClient";
import { MODULE_ADDRESS } from "../../constants";

export const getConfigInfo = async (): Promise<[number, number, number, number]> => {
    
    const config = await aptosClient().view<[number, number, number, number]>({
        payload: {
            function: `${MODULE_ADDRESS}::crowdfund::get_config`,
            typeArguments: [],
            functionArguments: [],
        },
    });
    return config;
};

// reference
// config.min_funding_goal,
// config.min_duration,
// config.min_contribution_amount,
// config.fee