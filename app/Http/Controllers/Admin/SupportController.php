<?php

namespace App\Http\Controllers\Admin;

use App\DTO\CreateSupportDTO;
use App\DTO\UpdateSupportDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateSupport;
use App\Services\SupportService;

class SupportController extends Controller
{
    public function __construct(
        protected SupportService $services
    )
    {}

    public function index()
    {
        $supports = $this->services->getAll();

        return view('admin.support.index', compact('supports'));
    }

    public function show(string|int $id)
    {
        $support = $this->services->findOne($id);

        if(!$support) {
            return redirect()->back();
        }

        return view('admin.support.show', compact('support'));
    }

    public function create()
    {
        return view('admin.support.create');
    }

    public function store(StoreUpdateSupport $request)
    {
        $this->services->new(CreateSupportDTO::makeFromRequest($request));
        return redirect()->route('support.index');
    }

    public function edit(string|int $id)
    {
        $support = $this->services->findOne($id);

        if(!$support) {
            return redirect()->back();
        }

        return view('admin.support.edit', compact('support'));
    }

    public function update(StoreUpdateSupport $request)
    {
        $updated = $this->services->update(UpdateSupportDTO::makeFromRequest($request));

        if($updated) {
            return redirect()->route('support.index');
        }

        return redirect()->back();
    }

    public function destroy(string|int $id)
    {
        $this->services->delete($id);

        return redirect()->route('support.index');
    }

}
