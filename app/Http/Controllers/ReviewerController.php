<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Session;
use Illuminate\Contracts\View\View;
use Illuminate\View\ViewFinderInterface;

class ReviewerController extends Controller
{
    public function reviewerDashbordView(){
        return view('reviewer.pages.dashbord');
    }

    public function assignedPaperView(Request $request){
        $user_id = $request->session()->get('user_id');
        $data = DB::table('reviews')->where('review_user_id', '=', $user_id)
        ->join('submissions', 'submissions.id', '=', 'reviews.review_submission_id')
        ->select('reviews.id', 'reviews.msg', 'submissions.id as submission_id', 'submissions.title as submission_title', 'submissions.file_name', 'submissions.tags')
        ->get();
        // dd($data);
        return View('reviewer.pages.assign-paper-table', ['data' => $data]);
    }
}
