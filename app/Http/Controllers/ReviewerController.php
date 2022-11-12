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
        $data = DB::table('submissions')->where('id', '=', $id)->first();

        $user_id = $request->session()->get('user_id');
        $validate = DB::table('markings')
            ->where('marking_submission_id', '=', $id)
            ->where('marking_review_user_id', '=', $user_id)
            ->first();
        // dd($validate);

        return view(
            'reviewer.pages.review-submission-paper',
            [
                'data' => $data,
                'validate' => $validate

            ]
        );
    }

    public function reviewMark(Request $r, $submission_id)
    {
        // dd($r);
        $conference_id = DB::table('submissions')->where('id', '=', $submission_id)
            ->select('submissions_conference_id')
            ->first();
        $conference_id = $conference_id->submissions_conference_id;
        $user_id = $r->session()->get('user_id');

        $validate = DB::table('markings')
            ->where('marking_submission_id', '=', $submission_id)
            ->where('marking_review_user_id', '=', $user_id)
            ->count();

        if ($validate == 0) {
            DB::table('markings')->insert([
                'review_status' => $r->marking,
                'result_adequate' => $r->result,
                'contribution' => $r->contribution ,
                'literature_review' => $r->literature,
                'marking_submission_id' => $submission_id,
                'marking_review_user_id' => $user_id,
                'marking_conference_id' => $conference_id
            ]);

            return redirect('reviewer/table/assigned-paper');
        } else {
            echo 'You already review this paper.';
        }
    }

    public function reviewerProfile(){
        $userId = session()->get('user_id');
        $data = DB::table('users')
        ->where('users.id', '=', $userId)
        ->get();

        // dd($data);

        return view('reviewer.pages.reviewer-profile', ['data' => $data]);
    }
}
