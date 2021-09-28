<?php

namespace App\Http\Controllers;

use App\Models\answer;
use App\Models\City;
use App\Models\Country;
use App\Models\question;
use App\Models\QuestionType;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $question = $request->question;
        $question_type_id = $request->question_type;
        $question_active = $request->question_active;
        $country_id = $request->question_country_id;
        $city_id = $request->question_city_id;
        $answers = $request->answers;
        $que = question::create([
            'question' => $question,
            'active' => filter_var($question_active, FILTER_VALIDATE_BOOLEAN)
        ]);


        QuestionType::find($question_type_id)->questions()->save($que);
        Country::find($country_id)->questions()->save($que);
        City::find($city_id)->questions()->save($que);

//        save multiple answer
        foreach ($answers as $ans) {
            $answer = new answer();
            $answer->answer = $ans['answer'];
            $answer->right_answer = filter_var($ans['right_answer'], FILTER_VALIDATE_BOOLEAN);
            $que->answers()->save($answer);
        }
        return response('Save Successful', 200)
            ->header('Content-Type', 'text/plain');



    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
