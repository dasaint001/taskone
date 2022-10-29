<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class DataController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * My Information
     *
    */
    public function getMyInfo()
    {
        return response()->json([
            'slackUsername'  => 'Yii',
            'backend' => true,
            'age' => 30,
            'bio' => 'I am a fast learner with I can do spirit. I love learning and always want to help solve problems.',
        ], 200);
    }
}


