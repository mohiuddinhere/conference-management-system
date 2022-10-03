<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthorController extends Controller
{

    public function authorDashbordView()
    {
        return view('author.pages.author-dashbord');
    }

    public function availableConferenceView()
    {
        $time = date('Y-m-d');
        $data = DB::table('conferences')
        ->where('submission_deadline', '>=', $time)
        ->join('universities', 'universities.id', 'university_id')
        ->select('conferences.id', 'conferences.title', 'conferences.submission_deadline', 'conferences.conference_date', 'universities.name')
        ->get();
        // dd($data);
        return view(
            'author.pages.conference-table',
            [
                'data' => $data
            ]
        );
    }

    public function authorPaperSubmission()
    {
        return view('author.pages.author-paper-submission');
    }
}
