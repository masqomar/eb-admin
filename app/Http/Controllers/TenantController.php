<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use App\Http\Requests\{StoreTenantRequest, UpdateTenantRequest};
use Yajra\DataTables\Facades\DataTables;

class TenantController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:tenant view')->only('index', 'show');
        $this->middleware('permission:tenant create')->only('create', 'store');
        $this->middleware('permission:tenant edit')->only('edit', 'update');
        $this->middleware('permission:tenant delete')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $tenants = Tenant::query();

            return DataTables::of($tenants)
                ->addColumn('address', function($row){
                    return str($row->address)->limit(100);
                })
				->addColumn('action', 'tenants.include.action')
                ->toJson();
        }

        return view('tenants.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tenants.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTenantRequest $request)
    {
        
        Tenant::create($request->validated());

        return redirect()
            ->route('tenants.index')
            ->with('success', __('The tenant was created successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tenant  $tenant
     * @return \Illuminate\Http\Response
     */
    public function show(Tenant $tenant)
    {
        return view('tenants.show', compact('tenant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tenant  $tenant
     * @return \Illuminate\Http\Response
     */
    public function edit(Tenant $tenant)
    {
        return view('tenants.edit', compact('tenant'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tenant  $tenant
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTenantRequest $request, Tenant $tenant)
    {
        
        $tenant->update($request->validated());

        return redirect()
            ->route('tenants.index')
            ->with('success', __('The tenant was updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tenant  $tenant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tenant $tenant)
    {
        try {
            $tenant->delete();

            return redirect()
                ->route('tenants.index')
                ->with('success', __('The tenant was deleted successfully.'));
        } catch (\Throwable $th) {
            return redirect()
                ->route('tenants.index')
                ->with('error', __("The tenant can't be deleted because it's related to another table."));
        }
    }
}
