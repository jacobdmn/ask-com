<?php

namespace App\Http\Controllers\User;

use App\Answer;
use App\Category;
use App\Http\Controllers\Controller;
use App\Interest;
use App\Question;
use App\Report;
use App\Tag;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ReportsController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function reportQuestion(Request $request) {
        if (isset($request->question_id) || isset($request->answer_id) || isset($request->comment_id)) {

            $report = new Report();
            $report->user_id = Auth::user()->id;

            if (isset($request->question_id))
                $report->question_id = $request->question_id;
            if (isset($request->answer_id))
                $report->answer_id = $request->answer_id;
            if (isset($request->comment_id))
                $report->comment_id = $request->comment_id;

            $report->save();

        }
        return redirect()->back();
    }

}
