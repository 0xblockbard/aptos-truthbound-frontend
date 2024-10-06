import { InputTransactionData } from "@aptos-labs/wallet-adapter-react";
import { MODULE_ADDRESS } from "../../constants";
// Internal utils
import { convertAmountFromHumanReadableToOnChain } from "../utils/helpers";

export type updateConfigArguments = {
    new_min_funding_goal: number;
    new_min_duration: number;
    new_min_contribution_amount: number;
    new_fee: number;
    decimals: number; // 8 for APT
};

export const updateConfig = (args: updateConfigArguments): InputTransactionData => {
  const { new_min_funding_goal, new_min_duration, new_min_contribution_amount, new_fee, decimals } = args;
  return {
    data: {
        function: `${MODULE_ADDRESS}::crowdfund::update_config`,
        typeArguments: [],
        functionArguments: [
            convertAmountFromHumanReadableToOnChain(new_min_funding_goal, decimals),
            new_min_duration,
            convertAmountFromHumanReadableToOnChain(new_min_contribution_amount, decimals),
            convertAmountFromHumanReadableToOnChain(new_fee, decimals),
        ],
    },
  };
};
