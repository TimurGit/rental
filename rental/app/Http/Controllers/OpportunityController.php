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


    public function create()
    {
        return view('opportunity.create',compact('opportunity'));
    }


    public function store(Request $request)
    {
        if (Opportunity::create($request->all())) {
            $request->session()->flash('message.level', 'success');
            $request->session()->flash('message.content', 'Информация о прокате добавлена!');
        } else {
            $request->session()->flash('message.level', 'danger');
            $request->session()->flash('message.content', 'Ошибка!');
        }
        return redirect('/opportunities');
    }

    public function edit($id)
    {
        $opportunity = Opportunity::find($id);
        return view('opportunity.edit',compact('opportunity'));
    }
//SELECT t.id, avg(TIMESTAMPDIFF(SECOND, op.start, op.finish))  FROM `transports` t
//LEFT JOIN opportunities op ON t.id=op.transport_id
//GROUP BY t.type_id, t.mark_id
}
