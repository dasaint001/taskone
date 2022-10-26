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
     * My Informations
     *
    */
    public function getMyInfo()
    {
        $myInfo = [
            'slackUsername'  => 'Yii',
            'backend' => true,
            'age' => 30,
            'bio' => 'I am a fast learner with I can do spirit. I love learning and always want to help solve problems.' 
        ];

        return response()->json([
            'status'    => true,
            'my_info'   => $myInfo
        ], 200);
    }
}

