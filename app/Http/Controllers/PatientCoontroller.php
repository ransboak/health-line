<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
class PatientCoontroller extends Controller
{
    //
    public function dashboard(){

    $client = new Client(['verify'=> false]);
    $headers = [
        "username" => "coalition",
        "password" =>"skills-test",
        'Content-Type' => 'application/json', 
        'Authorization' => 'Basic Y29hbGl0aW9uOnNraWxscy10ZXN0'
    ];
    $endpoint = 'https://fedskillstest.coalitiontechnologies.workers.dev';
 

        $res = $client->request('GET',$endpoint,['headers'=> $headers]);
            
        $content =  $res->getBody();

        $json = json_decode($content,true);

        $patients = $json;
        $user = $json[15];
        // $user = $json[3];

        

        $formattedData = [
            'labels' => [],
            'systolic' => [],
            'diastolic' => []
        ];

        $latestSystolic = null;
        $latestDate = null;
    
        foreach ($user['diagnosis_history'] as $diagnosis) {
            $formattedData['labels'][] = $diagnosis['month'] . ' ' . $diagnosis['year'];
            $formattedData['systolic'][] = $diagnosis['blood_pressure']['systolic']['value'];
            $formattedData['diastolic'][] = $diagnosis['blood_pressure']['diastolic']['value'];

            $currentDate = strtotime($diagnosis['year'] . '-' . date('m', strtotime($diagnosis['month'])) . '-01');
            if (!$latestDate || $currentDate > $latestDate) {
                $latestDate = $currentDate;
                $latestSystolic = $diagnosis['blood_pressure']['systolic'];
                $latestDiastolic = $diagnosis['blood_pressure']['diastolic'];
            }

            $user_respiratory = $diagnosis['respiratory_rate'];
            $user_heart = $diagnosis['heart_rate'];
            $user_temperature = $diagnosis['temperature'];
        }
        $diagnosticList = $user['diagnostic_list'];
        $resultsList = $user['lab_results'];

        return view('welcome', compact('patients', 'user', 'formattedData', 'latestSystolic', 'latestDiastolic', 
        'user_respiratory', 'user_temperature', 'user_heart', 'diagnosticList', 'resultsList'));
}
}