<?php

namespace App\Http\Controllers;

use App\Models\Transport;
use Illuminate\Http\Request;

class TransportController extends Controller
{
    public function index()
    {
        $transports = Transport::with('mark')->paginate(50);
        return view('transport.index',compact('transports'));
    }

    public function edit($id)
    {
        $transport = Transport::find($id);
        $opportunities = $transport->opportunities()->paginate(10);
        return view('transport.edit',compact('transport','opportunities'));
    }
}
