<?php

namespace App\Http\Controllers;

use App\Models\SmmProvider;
use App\Http\Requests\{StoreSmmProviderRequest, UpdateSmmProviderRequest};
use Yajra\DataTables\Facades\DataTables;

class SmmProviderController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:smm provider view')->only('index', 'show');
        $this->middleware('permission:smm provider create')->only('create', 'store');
        $this->middleware('permission:smm provider edit')->only('edit', 'update');
        $this->middleware('permission:smm provider delete')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $smmProviders = SmmProvider::query();

            return DataTables::of($smmProviders)
                ->addColumn('action', 'smm-providers.include.action')
                ->toJson();
        }

        return view('smm-providers.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('smm-providers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSmmProviderRequest $request)
    {
        
        SmmProvider::create($request->validated());

        return redirect()
            ->route('smm-providers.index')
            ->with('success', __('The smmProvider was created successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SmmProvider  $smmProvider
     * @return \Illuminate\Http\Response
     */
    public function show(SmmProvider $smmProvider)
    {
        return view('smm-providers.show', compact('smmProvider'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SmmProvider  $smmProvider
     * @return \Illuminate\Http\Response
     */
    public function edit(SmmProvider $smmProvider)
    {
        return view('smm-providers.edit', compact('smmProvider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SmmProvider  $smmProvider
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSmmProviderRequest $request, SmmProvider $smmProvider)
    {
        
        $smmProvider->update($request->validated());

        return redirect()
            ->route('smm-providers.index')
            ->with('success', __('The smmProvider was updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SmmProvider  $smmProvider
     * @return \Illuminate\Http\Response
     */
    public function destroy(SmmProvider $smmProvider)
    {
        try {
            $smmProvider->delete();

            return redirect()
                ->route('smm-providers.index')
                ->with('success', __('The smmProvider was deleted successfully.'));
        } catch (\Throwable $th) {
            return redirect()
                ->route('smm-providers.index')
                ->with('error', __("The smmProvider can't be deleted because it's related to another table."));
        }
    }
}
