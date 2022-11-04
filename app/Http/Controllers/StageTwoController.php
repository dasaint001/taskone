<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use App\Http\Requests\StageTwoRequest;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Controller as BaseController;

class StageTwoController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * My Information
     *
    */
    public function arithmetic(StageTwoRequest $request)
    {
        $validation = function ($attribute, $value, $fail) {
            if (!is_int($value)) {
                $fail( $attribute.' must be an integer.');
            }
        };

        $rules = [
            'x' => ['integer', $validation],
            'operation_type' => 'required|in:addition,subtraction,multiplication',
            'y' => ['integer', $validation],
            
        ];


        $validator = \Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return $this->respondWithErrorMessage($validator);
        }

        $operationType = $request->input('operation_type');
        $result = (int)'';
        $x = $request->x ?? '';
        $y = $request->y ?? '';

        if($operationType === 'addition' ){
            $result = (int)$x + (int)$y;
        }

        if($operationType === 'subtraction' ){
            $result = (int)$x - (int)$y;
        }

        if($operationType === 'multiplication' ){
            $result = (int)$x * (int)$y;
        }


        return response()->json([
            'slackUsername' => 'Yii',
            'result' => $result,
            'operation_type' => $operationType
        ], 200);
    }
}