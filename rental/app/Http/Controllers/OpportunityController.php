<?php

namespace App\Http\Controllers;

use App\Models\Opportunity;
use Illuminate\Http\Request;

class OpportunityController extends Controller
{

    public function index()
    {
        $transports = Opportunity::with('transport','user')->paginate(50);
        return view('opportunity.index',compact('transports'));
    }
}
