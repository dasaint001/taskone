<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Controller as BaseController;

class StageTwoController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * My Information
     *
    */
    public function arithmetic(Request $request)
    {
        $rules = [
            'x' => 'required|numeric',
            'operation_type' => 'required|in:addition,subtraction,multiplication',
            'y' => 'required|numeric',
        ];

        $validator = \Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return $this->respondWithErrorMessage($validator);
        }

        $operationType = $request->input('operation_type');
        $result = '';
        $x = $request->x ?? 0;
        $y = $request->y ?? 0;

        if($operationType === 'addition' ){
            $result = $x + $y;
        }

        if($operationType === 'subtraction' ){
            $result = $x - $y;
        }

        if($operationType === 'multiplication' ){
            $result = $x * $y;
        }


        return response()->json([
            'slackUserName' => 'Yii',
            'result' => $result ?? 0,
            'operation_type' => $operationType
        ], 200);
    }
}