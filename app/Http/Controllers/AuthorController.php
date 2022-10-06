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

    public function authorPaperConference($id)
    {
        $data = DB::table('tracks')->where('conference_id', '=', $id)->get();
        // dd($data);
        return view('author.pages.author-paper-submission', ['submission_id' => $id, 'data' => $data]);
    }

    public function authorPaperSubmissionStore(Request $request,)
    {
        // dd($request->file->getClientOriginalName());

        $request->validate([

            'file' => 'required|mimes:pdf|max:2048',
        ]);

        $originalName = $request->file->getClientOriginalName();
        $time = time();
        $fileName = $time . '_' . $originalName;
        $title = $request->title;
        $track = $request->track;
        $abstract = $request->abstract;
        $tags = $request->tags;
        $user_id = $request->session()->get('user_id');
        $request->file->move(public_path('uploads'), $fileName);

        DB::table('submissions')->insert([
            'title' => $title,
            'abstract' => $abstract,
            'tags' => $tags,
            'file_name' => $fileName,
            'track_id' => $track,
            'user_id' => $user_id
        ]);

        return back()->with('success', 'You have successfully upload file.')->with('file', $fileName);
    }
}
