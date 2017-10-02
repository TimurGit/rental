<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Opportunity;
use App\Models\Transport;
use Illuminate\Http\Request;


class TransportController extends Controller
{
    public function index(Request $request)
    {
        $transports = Transport::where('reg_number','like','%'.$request->q.'%')
            ->select('reg_number as label','id as value');
        return $transports->get();

    }

}