<?php

namespace App\Http\Controllers;

use App\Models\GradeDetail;
use App\Http\Requests\{StoreGradeDetailRequest, UpdateGradeDetailRequest};
use Yajra\DataTables\Facades\DataTables;

class GradeDetailController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:grade detail view')->only('index', 'show');
        $this->middleware('permission:grade detail create')->only('create', 'store');
        $this->middleware('permission:grade detail edit')->only('edit', 'update');
        $this->middleware('permission:grade detail delete')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $gradeDetails = GradeDetail::with('category:id,name', 'exam:id,title', 'user:id,name', 'value_category:id,name', 'grade:id,category_id')->get();
        // return json_encode($gradeDetails);
        if (request()->ajax()) {
            $gradeDetails = GradeDetail::with('category:id,name', 'exam:id,title', 'user:id,name', 'value_category:id,name', 'grade:id,category_id');
    
            return DataTables::of($gradeDetails)
                ->addColumn('category', function ($row) {
                    return $row->category ? $row->category->name : '';
                })
                ->addColumn('exam', function ($row) {
                    return $row->exam ? $row->exam->title : '';
                })
                ->addColumn('user', function ($row) {
                    return $row->user ? $row->user->name : '';
                })
                ->addColumn('value_category', function ($row) {
                    return $row->value_category ? $row->value_category->name : '';
                })
                ->addColumn('grade_category', function ($row) {
                    // Pastikan $row->grade adalah objek sebelum mengakses category_id
                    return $row->grade && is_object($row->grade) ? $row->grade->category_id : '';
                })
                ->addColumn('action', 'grade-details.include.action')
                ->toJson();
        }
    
        return view('grade-details.index');
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('grade-details.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGradeDetailRequest $request)
    {
        
        GradeDetail::create($request->validated());

        return redirect()
            ->route('grade-details.index')
            ->with('success', __('The gradeDetail was created successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GradeDetail  $gradeDetail
     * @return \Illuminate\Http\Response
     */
    public function show(GradeDetail $gradeDetail)
    {
        $gradeDetail->load('category:id,name', 'exam:id,title', 'user:id,name', 'value_category:id,name', 'grade:id,category_id');

		return view('grade-details.show', compact('gradeDetail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GradeDetail  $gradeDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(GradeDetail $gradeDetail)
    {
        $gradeDetail->load('category:id,name', 'exam:id,title', 'user:id,name', 'value_category:id,name', 'grade:id,category_id');

		return view('grade-details.edit', compact('gradeDetail'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GradeDetail  $gradeDetail
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGradeDetailRequest $request, GradeDetail $gradeDetail)
    {
        
        $gradeDetail->update($request->validated());

        return redirect()
            ->route('grade-details.index')
            ->with('success', __('The gradeDetail was updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GradeDetail  $gradeDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(GradeDetail $gradeDetail)
    {
        try {
            $gradeDetail->delete();

            return redirect()
                ->route('grade-details.index')
                ->with('success', __('The gradeDetail was deleted successfully.'));
        } catch (\Throwable $th) {
            return redirect()
                ->route('grade-details.index')
                ->with('error', __("The gradeDetail can't be deleted because it's related to another table."));
        }
    }
}
