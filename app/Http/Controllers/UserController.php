<?php

namespace App\Http\Controllers;

use App\Helper\UserService;
use Illuminate\Http\Request;
use Mail;
use App\Mail\AuthMail;
use Illuminate\Support\Str;
use App\Models\Assessment;
use App\Models\journals;



class UserController extends Controller
{
    public function register(Request $request)
    {
        $response = (new UserService($request->name, $request->email, $request->password))->register($request->devicename);
        return response()->json($response);
    }

    public function login(Request $request)
    {
        $response = (new UserService( null, $request->email, $request->password,))->login($request->devicename);
        return response()->json($response); 
    }

    public function analysis(Request $request)
{
    $set1_questions = [1, 4, 8, 11, 12, 13, 14, 15, 16, 19];
    $set2_questions = [2, 3, 5, 6, 7, 9, 10, 17, 18, 20];

    \Log::info($request->all());

    $set1_values = [];
    foreach ($set1_questions as $q) {
        $set1_values[] = $request->input("q$q");
    }

    $set2_values = [];
    foreach ($set2_questions as $q) {
        $set2_values[] = $request->input("q$q");
    }

    $set1_mean = array_sum($set1_values) / count($set1_values);
    $set2_mean = array_sum($set2_values) / count($set2_values);

    if ($set1_mean > $set2_mean) {
        $result = "Positive";
    } else if ($set2_mean > $set1_mean) {
        $result = "Negative";
    } else {
        $result = "Neutral";
    }

    Assessment::create(
        [
            'email' => $request->email,
            'set1_mean' => $set1_mean,
            'set2_mean' => $set2_mean,
            'result' => $result,
        ]
    );

    return response()->json($result);
}


  public function journal(Request $request){

    $date_str = $request->date;
$timestamp = strtotime($date_str);
$formatted_date = date('Y-m-d', $timestamp);

    journals::create(
        [
            'email' => $request->email,
            'story' => $request->story,
            'mood' => $request->mood,
            'date' => $formatted_date,
        ]
    );

    $response = "Journal Saved";

    return response()->json($response);

  }

  public function getJournalEntries(Request $request)
  {
      $email = $request->route('email');
  
      $journalEntries = Journals::where('email', $email)->select('story', 'date', 'mood')->get();
  
      return response()->json($journalEntries);
  }
  

  public function getAssessmentResults(Request $request)
  {
      $email = $request->route('email');
  
      $assessmentResults = Assessment::where('email', $email)->select('set1_mean', 'set2_mean', 'result')->get();
  
      return response()->json($assessmentResults);
  }


    public function send_email(Request $request)
    {

        $token = Str::random(64);

        $mailData = [
            'title' => 'Password Reset',
            'body' => 'Use the following link to reset your password.',
            'resetToken' => $token,
        ];

        
        $email = trim($request->input('email'));

        Mail::to($email)->send(new AuthMail($mailData));
    
           
        dd("Email is sent successfully.");
    }
}
