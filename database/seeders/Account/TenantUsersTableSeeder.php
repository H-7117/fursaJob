<?php

namespace Database\Seeders\Account;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use App\Models\Account\AccountUser;
use App\Models\Account\AccountTenant;

class TenantUsersTableSeeder extends Seeder
{
    public function run()
    {
        $platformTenant = AccountTenant::where('name', 'platform')->first();
        $appTenant      = AccountTenant::where('name', 'app')->first();
        
        AccountUser::create([
            'tenant_id' => $platformTenant->id,
            'username' => 'admin',
            'email' => 'admin@platform.com',
            'password' => Hash::make('123456'),
        ]);

        AccountUser::create([
            'tenant_id' => $platformTenant->id,
            'username' => 'user',
            'email' => 'user@platform.com',
            'password' => Hash::make('123456'),
        ]);

        AccountUser::create([
            'tenant_id' => $appTenant->id,
            'username' => 'admin',
            'email' => 'admin@app.com',
            'password' => Hash::make('123456'),
        ]);

        AccountUser::create([
            'tenant_id' => $appTenant->id,
            'username' => 'user',
            'email' => 'user@app.com',
            'password' => Hash::make('123456'),
        ]);

    }
}
