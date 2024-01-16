<?php 
namespace App\Services\Fursa;

use Illuminate\Http\Request;
use App\Models\Fursa\FursaJob;
class JobService{

    public function store(Request $request){
       $job= FursaJob::create(
            [
                'label' => $request->label,
                'name' => $request->name,
                'job_description' => $request->job_description,
                'job_tasks'=>$request->job_tasks,
                'Category'=>$request->Category,
                'job_type'=> $request->job_type,
                'Location'=> $request->Location,
                'status'=> $request->status === 'closed' ? 1 : 0,
                'depertment_id'=> $request->depertment_id
            ]
        );
        return $job->id;
    }

    
}