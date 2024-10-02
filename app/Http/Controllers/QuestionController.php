<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Http\Requests\{StoreQuestionRequest, UpdateQuestionRequest};
use Yajra\DataTables\Facades\DataTables;

class QuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:question view')->only('index', 'show');
        $this->middleware('permission:question create')->only('create', 'store');
        $this->middleware('permission:question edit')->only('edit', 'update');
        $this->middleware('permission:question delete')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $questions = Question::with('value_category:id,name', 'question_title:id,name', );

            return DataTables::of($questions)
                ->addColumn('direction', function($row){
                    return str($row->direction)->limit(100);
                })
				->addColumn('discussion', function($row){
                    return str($row->discussion)->limit(100);
                })
				->addColumn('value_category', function ($row) {
                    return $row->value_category ? $row->value_category->name : '';
                })->addColumn('question_title', function ($row) {
                    return $row->question_title ? $row->question_title->name : '';
                })->addColumn('action', 'questions.include.action')
                ->toJson();
        }

        return view('questions.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('questions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreQuestionRequest $request)
    {
        
        Question::create($request->validated());

        return redirect()
            ->route('questions.index')
            ->with('success', __('The question was created successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        $question->load('value_category:id,name', 'question_title:id,name', );

		return view('questions.show', compact('question'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        $question->load('value_category:id,name', 'question_title:id,name', );

		return view('questions.edit', compact('question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateQuestionRequest $request, Question $question)
    {
        
        $question->update($request->validated());

        return redirect()
            ->route('questions.index')
            ->with('success', __('The question was updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        try {
            $question->delete();

            return redirect()
                ->route('questions.index')
                ->with('success', __('The question was deleted successfully.'));
        } catch (\Throwable $th) {
            return redirect()
                ->route('questions.index')
                ->with('error', __("The question can't be deleted because it's related to another table."));
        }
    }
}
