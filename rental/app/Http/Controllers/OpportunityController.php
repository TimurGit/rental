<?php

namespace App\Http\Controllers;

use App\Models\Opportunity;
use Illuminate\Http\Request;

class OpportunityController extends Controller
{

    public function index()
    {
        $data = Opportunity::with('transport.mark','user')->orderBy('finish','desc')->paginate(50);
        return view('opportunity.index',compact('data'));
    }
}
