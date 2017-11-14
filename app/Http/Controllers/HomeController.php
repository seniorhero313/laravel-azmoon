<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Articles;
use App\Exam;
use App\Question;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Articles::latest()->paginate(10);
        $exams = Exam::latest()->get();
        $userAnswered = auth()->user()->answers;

        foreach ($userAnswered as $item){
            foreach ($exams as $key=>$exam){
                if($item->exam_id == $exam->id){
                    unset($exams[$key]);
                }
            }
        }

        return view('index',compact('articles','exams'));
    }

    public function article($id)
    {
        $article = Articles::whereId($id)->first();
        $img = unserialize($article->images)['images'];
        $img = $img['600'];
        return view('article',compact('article','img'));
    }

    public function exam($id){
        $exam = Exam::whereId($id)->with('questions')->first();
        return view('exam',compact('exam'));
    }

    public function requestStart(Request $request,Exam $examModel)
    {
        $examId = $request->exam_id;
        $exam = $examModel->whereId($examId)->with('questions')->with('answers')->first();
        $user= auth()->user()->first();
        $userAnswered = auth()->user()->answers;

        foreach ($userAnswered as $item){
            if($item->exam_id != $exam->id){
                return view('examStart',compact('exam','user'));
            }
        }

        return redirect(route('home.index'));
    }

    private function answerIsTrue($question_id,$user_answer){
        $answer = Question::whereId($question_id)->first()->answer;
        $user_answer == $answer ? $result = true : $result = false;
        return $result;
    }

    public function getUserAnswers(Request $request,Answer $answer)
    {
        $exam_id = $request->exam_id;
        $user_id = $request->user_id;
        $userAnswers = $request->userAnswers;
        $count = count($userAnswers);
        for ($i = 0; $i < $count; $i++) {
            $u = $userAnswers[$i];
            $answer_is_true = $this->answerIsTrue($u['question_id'],$u['user_answer']);
            $data[] = array(
                'user_id' => $user_id,
                'question_id' => $u['question_id'],
                'exam_id' => $exam_id,
                'user_answer' => $u['user_answer'],
                'user_exam_time_length' => 0,
                'answer_is_true'=>$answer_is_true
            );
        }

        $answerVar = $answer->where('user_id',$user_id)->where('exam_id',$exam_id)->get();
        $answerByUser = count($answer->where('user_id',$user_id)->where('exam_id',$exam_id)->get());
        $answerByUser == 0 ? $isTrue = true : $isTrue = false;


        if($isTrue){
            $isOk = $answer->insert($data);
            return response()->json(['response' => $data,'status'=> $isOk,'answerVar' => $answerVar]);
        }else{
            return response()->json(['error' => 'شما قبلا به این آزمون پاسخ داده اید!'], 401);
        }
    }
}
