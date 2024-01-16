<?php

namespace Database\Seeders\Account;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Account\AccountRole;
use App\Models\Account\AccountTenant;

class TenantRolesTableSeeder extends Seeder
{
    public function run()
    {

        $platformTenant = AccountTenant::where('name', 'platform')->first();
        $appTenant      = AccountTenant::where('name', 'app')->first();
        
        // 
        AccountRole::create([
            'tenant_id' => $platformTenant->id,
            'name' => 'administration',
            'label' => 'الإدارة',
        ]);
        AccountRole::create([
            'tenant_id' => $platformTenant->id,
            'name' => 'using',
            'label' => 'الإستخدام',
        ]);
        //
        AccountRole::create([
            'tenant_id' => $appTenant->id,
            'name' => 'administration',
            'label' => 'الإدارة',
        ]);
        AccountRole::create([
            'tenant_id' => $appTenant->id,
            'name' => 'using',
            'label' => 'الإستخدام',
        ]);

    }
}