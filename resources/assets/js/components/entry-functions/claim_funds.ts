import { InputTransactionData } from "@aptos-labs/wallet-adapter-react";
import { MODULE_ADDRESS } from "../../constants";

// Internal utils
import { convertAmountFromHumanReadableToOnChain } from "../utils/helpers";

export type claimFundsArguments = {
    campaign_id: number;
};

export const claimFunds = (args: claimFundsArguments): InputTransactionData => {
  const { campaign_id } = args;
  return {
    data: {
        function: `${MODULE_ADDRESS}::crowdfund::claim_funds`,
        typeArguments: [],
        functionArguments: [
            campaign_id
        ],
    },
  };
};
