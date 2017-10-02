<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Opportunity;
use App\Models\Transport;
use App\User;
use Illuminate\Http\Request;


class UserController extends Controller
{
    public function index(Request $request)
    {
        $list = User::where('name','like','%'.$request->q.'%')
            ->select('name as label','id as value');
        return $list->get();

    }

}