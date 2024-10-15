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


// view functions


// start

const walletDiv = document.getElementById('connect-wallet');
if (walletDiv) {
  const root = ReactDOM.createRoot(walletDiv); 
  
  root.render(
      <WalletProvider>
          <WalletSelector />
      </WalletProvider>
  );
}