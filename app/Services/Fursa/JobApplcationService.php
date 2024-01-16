<?php 
namespace App\Services\Fursa;

use Illuminate\Http\Request;
use App\Models\Fursa\FursaJobApplcation;

class JobApplcationService{

    public function store(Request $request){
        $jobApplcation = FursaJobApplcation::create([
            'job_id'=>$request->job_id ?? null,
            'name'=>isset($request->name) ? true :false,
            'phone'=>isset($request->phone) ? true :false,
            'personalEmail'=>isset($request->personalEmail)? true :false,
            'links'=>isset($request->links) ? true :false,
            'cv'=>isset($request->cv)? true :false
        ]);

    }
    //
    public function getById($id)
    {
        return FursaJobApplcation::find($id);
    }

    //
    public function update(Request $request ,$id){
    $jobApplcation = FursaJobApplcation::findOrFail($id);
    $jobApplcation->name= isset($request->name)? true :false;
    $jobApplcation->phone= isset($request->phone)? true :false;
    $jobApplcation->personalEmail= isset($request->personalEmail)? true :false;
    $jobApplcation->links= isset($request->links)? true :false;
    $jobApplcation->cv= isset($request->cv)? true :false;
    $jobApplcation->save();
    }
    //
    public function destory($id){
        $jobApplcation = FursaJobApplcation::findOrFail($id);
        $jobApplcation->delete();
    }
}