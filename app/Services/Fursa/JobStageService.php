<?php
namespace App\Services\Fursa;

use Illuminate\Http\Request;
use App\Models\Fursa\JobStage;
class JobStageService{
    public function store(Request $request)
    {
        $jobStage = JobStage::create([
            'jobs_id'=>$request->jobId,
            'name'=>$request->name,
            'round'=>$request->round
        ]);
        return $request->jobId;
    }

    public function update(Request $request ,$id)
    {
        $jopStage = JobStage::findOrFail($id);
        $jopStage->name= $request->name;
        $jopStage->round= $request->round;
        $jopStage->save();
    }


    public function getById($id)
    {
        return JobStage::find($id);
    }

    public function destory($id){
        $jobStage = JobStage::findOrFail($id);
        $jobStage->delete();
    }
}