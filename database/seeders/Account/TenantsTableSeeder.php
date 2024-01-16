<?php

namespace Database\Seeders\Account;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Account\AccountTenant;

class TenantsTableSeeder extends Seeder
{
    public function run()
    {
        AccountTenant::create([
            'name' => 'platform',
            'label' => 'المنصة',
        ]);
        AccountTenant::create([
            'name' => 'app',
            'label' => 'التطبيق',
        ]);
    }
}
