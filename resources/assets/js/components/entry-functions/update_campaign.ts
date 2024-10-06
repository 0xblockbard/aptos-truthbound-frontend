import { InputTransactionData } from "@aptos-labs/wallet-adapter-react";
import { MODULE_ADDRESS } from "../../constants";

export type updateCampaignArguments = {
    campaign_id: number,
    name: string;
    description: string;
    image_url: string
};

export const updateCampaign = (args: updateCampaignArguments): InputTransactionData => {
  const { campaign_id, name, description, image_url } = args;

  return {
    data: {
        function: `${MODULE_ADDRESS}::crowdfund::update_campaign`,
        typeArguments: [],
        functionArguments: [
            campaign_id,
            name,
            description,
            image_url
        ],
    },
  };
};
