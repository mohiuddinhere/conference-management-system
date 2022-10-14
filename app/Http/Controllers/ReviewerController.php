<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Session;
use Illuminate\Contracts\View\View;
use Illuminate\View\ViewFinderInterface;

use App\Models\Review;
use App\Models\Marking;

class ReviewerController extends Controller
{
    public function reviewerDashbordView(Request $request)
    {
        $user_name = $request->session()->get('user_name');
        return view('reviewer.pages.dashbord', ['user_name' => $user_name]);
    }

    public function assignedPaperView(Request $request)
    {
        $user_id = $request->session()->get('user_id');
        $user_name = $request->session()->get('user_name');


        $data = DB::table('reviews')->where('review_user_id', '=', $user_id)
            ->join('submissions', 'submissions.id', '=', 'reviews.review_submission_id')
            ->select('reviews.id', 'reviews.msg', 'submissions.id as submission_id', 'submissions.title as submission_title', 'submissions.file_name', 'submissions.tags')
            ->get();
        // dd($user_name);
        return View('reviewer.pages.assign-paper-table', ['data' => $data, 'user_name' => $user_name]);
    }

    public function paperDownload($id)
    {
        $data = DB::table('submissions')->where('id', '=', $id)->first();

        $file_name = $data->file_name;
        $file_path = "./uploads/" . $file_name;

        $headers = [
            'Content-Type' => 'application/pdf',
        ];

        return response()->download($file_path, $file_name . '.pdf', $headers);
    }

    public function reviewSubmissionPaper(Request $request, $id)
    {
        $user_name = $request->session()->get('user_name');
        $data = DB::table('submissions')->where('id', '=', $id)->first();
        return view(
            'reviewer.pages.review-submission-paper',
            [
                'data' => $data,
                'user_name' => $user_name
            ]
        );
    }

    public function reviewMark(Request $r, $id){
        $review = New Review();
        $reviewData = $review->where('review_submission_id', '=', $id)->first();

        $submission = DB::table('submissions')->where('id', '=', $id)
        ->select('submissions_conference_id')->first();

        $mark = $r->marking;
        $submissionId = $id;
        $reviewId = $reviewData->review_user_id;

        // $marking = New Marking();
        
        // $marking->review_status = $mark;
        // $marking->marking_submission_id = $submissionId;
        // $marking->marking_review_id = $reviewId;
        // $marking->marking_conference_id = $submission->submissions_conference_id;

        $marking = DB::table('markings')->insert([
            'review_status' => $mark,
            'marking_submission_id' => $submissionId,
            'marking_review_id' => $reviewId,
            'marking_conference_id' => $submission->submissions_conference_id
        ]);


        // if($marking->save()){
        //     return redirect()->back()->with('success', 'Marking Done');
        // }

        // $data = Marking::where('marking_review_id', '=', $reviewId)->count();

        // if($data >= 1){
        //     return redirect()->back()->with('err', 'Marking already done');
        // }else{
        //     if($marking->save()){
        //         return redirect()->back()->with('success', 'Marking Done');
        //     }
        // } 
    }
}
