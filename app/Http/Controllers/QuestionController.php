<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function PHPUnit\Framework\returnArgument;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::orderBy('id', 'desc')->paginate(3);
        return view('questions.index')->with('questions', $questions);
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
    public function store(Request $request)
    {
        //validate form data
        $this->validate($request, [
            'title' => 'required',
        ]);

        //process data
        $question = new Question();
        $question->title = $request->input('title');
        $question->description = $request->input('description');
        //associate the user to a question
        //user() below is the model relatioship. The Auth::id() can be replaced wih Auth::user()->id)
        $question->user()->associate(Auth::id());

        //verify if saved - *note that the $question->id is available after save()*
        if($question->save()){
            //temporary display next route
            return redirect()->route('questions.show', $question->id);
        }
        else {
            //may add session flash error here
            return redirect()->route('questions.create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $question = Question::findOrFail($id);
        return view('questions.show')->with('question', $question);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $question = Question::findOrFail($id);
        if ($question->user->id != Auth::id())
        {
            return abort(403);
        }
        return view('questions.edit')->with('question', $question);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // https://laravel.com/docs/8.x/eloquent#updates

        //validate form data
        $this->validate($request, [
            'title' => 'required',
        ]);

        $question = Question::findOrFail($id);
        if ($question->user->id != Auth::id())
        {
            return abort(403);
        }

        $question->title = $request->input('title');
        $question->title = $request->input('description');

        if($question->save())
        {
            // saved correctly
            return redirect()->route('questions.show')->with($question->id);
        }
        else
        {
            // did not save
            return redirect()->route('questions.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
