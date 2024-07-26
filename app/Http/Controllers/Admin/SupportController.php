<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateSupport;
use App\Models\Support;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function index(Support $support) 
    {
        $supports = $support->all();
        return view('admin.support.index', compact('supports'));
    }

    public function show(string|int $id, Support $support) 
    {
        $support = $support->find($id);

        if(!$support) {
            return redirect()->back();
        }

        return view('admin.support.show', compact('support'));
    }

    public function create() 
    {
        return view('admin.support.create');
    }

    public function store(StoreUpdateSupport $request, Support $support) 
    {
        $data = $request->validated();
        $data['status'] = 'a';

        $support->create($data);    
        
        return redirect()->route('support.index');
    }

    public function edit(string|int $id, Support $support) 
    {
        $support = $support->where('id', '=', $id)->first();

        if(!$support) {
            return redirect()->back();
        }
        
        return view('admin.support.edit', compact('support'));
    }

    public function update(string|int $id, StoreUpdateSupport $request, Support $support) 
    {
        $support = $support->find($id);

        if(!$support) {
            return redirect()->back();
        }

        $updated = $support->update($request->validated());

        if($updated) {
            return redirect()->route('support.index');
        }

        return redirect()->route('home');
    }

    public function destroy(string|int $id, Support $support) 
    {
        $support = $support->find($id);

        if(!$support) {
            return redirect()->back();
        }

        $support->delete();

        return redirect()->route('support.index');
    }

}
