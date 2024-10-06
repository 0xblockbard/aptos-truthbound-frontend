<?php

namespace App\Http\Controllers;

use Auth;
use Redirect;
use Illuminate\Http\Request;

class CampaignController extends Controller
{

    public function showAll(){
        try {
            return view('campaigns.show_all_campaigns');
        } catch(\Exception $e){
            abort(400);
        }
    }

    public function show($id){
        try {
            return view('campaigns.show_campaign', compact('id'));
        } catch(\Exception $e){
            abort(400);
        }
    }

    public function create(){
        try {
            return view('campaigns.create_campaign');
        } catch(\Exception $e){
            abort(400);
        }
    }

    public function edit($id){
        try {
            return view('campaigns.edit_campaign', compact('id'));
        } catch(\Exception $e){
            abort(400);
        }
    }

}
