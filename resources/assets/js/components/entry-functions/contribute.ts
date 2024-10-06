import { InputTransactionData } from "@aptos-labs/wallet-adapter-react";
import { MODULE_ADDRESS } from "../../constants";
// Internal utils
import { convertAmountFromHumanReadableToOnChain } from "../utils/helpers";

export type contributeArguments = {
    campaign_id: number;
    amount: number;
    decimals: number; // 8 for APT
};

export const contribute = (args: contributeArguments): InputTransactionData => {
  const { campaign_id, amount, decimals } = args;
  return {
    data: {
        function: `${MODULE_ADDRESS}::crowdfund::contribute`,
        typeArguments: ["0x1::aptos_coin::AptosCoin"],
        functionArguments: [
            campaign_id,
            convertAmountFromHumanReadableToOnChain(amount, decimals),
        ],
    },
  };
};
