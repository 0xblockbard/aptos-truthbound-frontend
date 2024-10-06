import { InputTransactionData } from "@aptos-labs/wallet-adapter-react";
import { MODULE_ADDRESS } from "../../constants";
// Internal utils
import { convertAmountFromHumanReadableToOnChain } from "../utils/helpers";

export type refundArguments = {
    campaign_id: number;
};

export const refund = (args: refundArguments): InputTransactionData => {
  const { campaign_id } = args;
  return {
    data: {
        function: `${MODULE_ADDRESS}::crowdfund::refund`,
        typeArguments: [],
        functionArguments: [
            campaign_id
        ],
    },
  };
};
