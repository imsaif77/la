<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\StepCount;
use App\Http\Resources\StepResource;
use App\Http\Controllers\API\BaseController as BaseController;


class StepController extends BaseController
{
    public function index()
    {
        $step = StepCount::all();
        return $this->sendResponse(StepResource::collection($step), 'Step fetched.');


    }

    public function store(Request $request)
    {
        $input = $request->all();

        $step = StepCount::create($input);

        return $this->sendResponse(new StepResource($step), 'Step created.');




    }

    public function show($id)
    {
        $step = StepCount::find($id);
        if (is_null($step)) {
            return $this->sendError('step does not exist.');
        }

        return $this->sendResponse(new StepResource($step), 'Step fetched.');


    }

    public function update(Request $request,$id)
    {

        $step = StepCount::find($id);
        $step->update($request->all());
        // return $step;
        // // check if exists
        // if (! $step)
        // {
        //     return response()->json(['errors' => 'This Step does not exist, dude!'], 404);
        // }

        // $input = $request->all();

        

        // $step->user_id = $input['user_id'];
        // $step->steps = $input['steps'];
        // $step->save();
        
         return $this->sendResponse(new StepResource($step), 'Post updated.');
    }

    public function destroy(StepCount $step)
    {
        $step->delete();
        return $this->sendResponse([], 'Step deleted.');
    }
   


}
