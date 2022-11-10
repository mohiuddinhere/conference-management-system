<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class Conference extends Controller
{
    public function conferenceView($conference_id)
    {
        $conference_data = DB::table('conferences')
            ->join('universities', 'universities.id', '=', 'conferences.university_id')
            ->select('conferences.title as conferences_title', 'universities.name as universitie_name', 'universities.address as universitie_address', 'conferences.submission_deadline as conferences_submission_deadline', 'conferences.conference_date')
            ->where('conferences.id', '=', $conference_id)
            ->first();

        $conference_track = DB::table('tracks')
            ->where('tracks.conference_id', '=', $conference_id)
            ->select('tracks.name as tracks')
            ->get();
        // dd($conference_track);
        
        return view('auth.pages.conference', 
        [
            'conference_data' => $conference_data, 
            'conference_track' => $conference_track
        ]);
    }
}
