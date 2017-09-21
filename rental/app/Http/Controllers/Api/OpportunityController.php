<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Opportunity;
use Illuminate\Http\Request;


class OpportunityController extends Controller
{
    public function index(Request $request)
    {
        $opportunities = Opportunity::with('user');
        if (!empty($request->transport_id))
        {
            $opportunities = $opportunities->where('transport_id',$request->transport_id);
        }

        $opportunities = $opportunities->paginate(10);
        return $opportunities;

    }

}