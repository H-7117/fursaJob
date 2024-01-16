<?php

namespace Database\Seeders\Fursa;

use App\Facades\Account\AccountFacade;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Fursa\FursaCompany;

class CompanyTableSeeder extends Seeder
{
    public function run()
    {
        // FursaCompany::create([
        //     'name' => 'hail_saeed',
        //     'label'=>'هائل سعيد',
        //     'email_address'=>'hall@gmail.com',
        //     'country'=> 'اليمن',
        //     'city'=>'المكلا',
        //     'about_company'=> 'هائل سعيد انعم اكبر شركه يمينيه',
        //     'logo'=>'Hayel_Saeed_Group.jpg'
        // ]);
        
        $username = "alatas"; 
        $email = "alatas@gmail.com"; 
        $password ="alatas"; 
        $tenant_name = "alatas";
        $tenant_label = "شركة العطاس للكهربائيات";
        $tenant = AccountFacade::signUpAsTenant($username, $email, $password, $tenant_name, $tenant_label);
        FursaCompany::create([
            'id' => $tenant ,
            'name' => 'alatas',
            'label'=>'شركة العطاس للكهربائيات',
            'email_address'=>'alatas@gmail.com',
            'country'=> 'اليمن',
            'city'=>'المكلا',
            'about_company'=> 'العطاس اكبر شركه يمينيه',
            'logo'=>'Hayel_Saeed_Group.jpg'
        ]);
    }
}
