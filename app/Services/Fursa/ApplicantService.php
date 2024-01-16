<?php 
namespace App\Services\Fursa;

use Illuminate\Http\Request;
use App\Models\Fursa\FursaApplicant;

class JobApplcationService{

    public function store(Request $request){
        $FursaApplicant = FursaApplicant::create([
            'job_id'=>$request->job_id ?? null,
            'name'=>isset($request->name) ? true :false,
            'phone'=>isset($request->phone) ? true :false,
            'personalEmail'=>isset($request->personalEmail)? true :false,
            'links'=>isset($request->links) ? true :false,
            'cv'=>isset($request->cv)? true :false
        ]);

    }
    
}