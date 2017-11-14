<?php

namespace App\Http\Controllers\Admin;

use App\Exam;
use App\Http\Requests\QuestionRequest;
use App\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($examId)
    {
        $questions = Question::where('exam_id',$examId)->get();
        $exam = Exam::whereId($examId)->first();
        return view('admin.questions.index',compact('questions','exam'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($examId)
    {
        $exam = Exam::whereId($examId)->first();
        return view('admin.questions.create',compact('exam'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param QuestionRequest|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuestionRequest $request)
    {
        $exam_id = $request->exam_id;
        $question = Question::create($request->all());
        return redirect(route('questions.index',$exam_id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($examId,$questionId)
    {
        $question = Question::whereId($questionId)->first();
        return view('admin.questions.edit',compact('question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(QuestionRequest $request, Question $question)
    {
        $exam_id = $request->exam_id;
        $question_id = $request->id;
        $req = $request->all();
        unset($req['_token']);
        $question->whereId($question_id)->update($req);
        return redirect(route('questions.index',$exam_id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($questionId)
    {
        $question = Question::all()->where('id',$questionId)->first();
        $exam_id = $question->exam_id;
        $question->delete();
        return redirect(route('questions.index',$exam_id));
    }
}
