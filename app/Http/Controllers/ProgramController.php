<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Http\Requests\{StoreProgramRequest, UpdateProgramRequest};
use Yajra\DataTables\Facades\DataTables;
use Image;

class ProgramController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:program view')->only('index', 'show');
        $this->middleware('permission:program create')->only('create', 'store');
        $this->middleware('permission:program edit')->only('edit', 'update');
        $this->middleware('permission:program delete')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $programs = Program::with('period:id,period_date', 'program_type:id,name', );

            return Datatables::of($programs)
                ->addColumn('period', function ($row) {
                    return $row->period ? $row->period->period_date : '';
                })->addColumn('program_type', function ($row) {
                    return $row->program_type ? $row->program_type->name : '';
                })
                ->addColumn('image', function ($row) {
                    if ($row->image == null) {
                    return 'https://via.placeholder.com/350?text=No+Image+Avaiable';
                }
                    return asset('storage/uploads/images/' . $row->image);
                })

                ->addColumn('action', 'programs.include.action')
                ->toJson();
        }

        return view('programs.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('programs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProgramRequest $request)
    {
        $attr = $request->validated();
        
        if ($request->file('image') && $request->file('image')->isValid()) {

            $path = storage_path('app/public/uploads/images/');
            $filename = $request->file('image')->hashName();

            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }

            Image::make($request->file('image')->getRealPath())->resize(500, 500, function ($constraint) {
                $constraint->upsize();
				$constraint->aspectRatio();
            })->save($path . $filename);

            $attr['image'] = $filename;
        }

        Program::create($attr);

        return redirect()
            ->route('programs.index')
            ->with('success', __('The program was created successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Program $program
     * @return \Illuminate\Http\Response
     */
    public function show(Program $program)
    {
        $program->load('period:id,period_date', 'program_type:id,name', );

		return view('programs.show', compact('program'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Program $program
     * @return \Illuminate\Http\Response
     */
    public function edit(Program $program)
    {
        $program->load('period:id,period_date', 'program_type:id,name', );

		return view('programs.edit', compact('program'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Program $program
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProgramRequest $request, Program $program)
    {
        $attr = $request->validated();
        
        if ($request->file('image') && $request->file('image')->isValid()) {

            $path = storage_path('app/public/uploads/images/');
            $filename = $request->file('image')->hashName();

            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }

            Image::make($request->file('image')->getRealPath())->resize(500, 500, function ($constraint) {
                $constraint->upsize();
				$constraint->aspectRatio();
            })->save($path . $filename);

            // delete old image from storage
            if ($program->image != null && file_exists($path . $program->image)) {
                unlink($path . $program->image);
            }

            $attr['image'] = $filename;
        }

        $program->update($attr);

        return redirect()
            ->route('programs.index')
            ->with('success', __('The program was updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Program $program
     * @return \Illuminate\Http\Response
     */
    public function destroy(Program $program)
    {
        try {
            $path = storage_path('app/public/uploads/images/');

            if ($program->image != null && file_exists($path . $program->image)) {
                unlink($path . $program->image);
            }

            $program->delete();

            return redirect()
                ->route('programs.index')
                ->with('success', __('The program was deleted successfully.'));
        } catch (\Throwable $th) {
            return redirect()
                ->route('programs.index')
                ->with('error', __("The program can't be deleted because it's related to another table."));
        }
    }
}
