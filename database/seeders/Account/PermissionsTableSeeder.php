<?php

namespace Database\Seeders\Account;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Account\AccountPermission;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {

        AccountPermission::create([
            'name' => 'become_tenant',
            'label' => 'يكون مستأجر',
        ]);
        AccountPermission::create([
            'name' => 'manage_tenants',
            'label' => 'يدير المستأجرين',
        ]);
        AccountPermission::create([
            'name' => 'manage_own_tenant',
            'label' => 'يدير إستئجاره فقط',
        ]);
        //
        AccountPermission::create([
            'name' => 'add_content',
            'label' => 'يضيف محتوى',
        ]);
        AccountPermission::create([
            'name' => 'manage_any_content',
            'label' => 'يدير أي محتوى',
        ]);
        AccountPermission::create([
            'name' => 'manage_own_content',
            'label' => 'يدير محتواه فقط',
        ]);
        AccountPermission::create([
            'name' => 'view_any_content',
            'label' => 'يشاهد أي محتوى',
        ]);
        AccountPermission::create([
            'name' => 'view_own_content',
            'label' => 'يشاهد محتواه فقط',
        ]);
        AccountPermission::create([
            'name' => 'edit_any_content',
            'label' => 'يعدل أي محتوى',
        ]);
        AccountPermission::create([
            'name' => 'edit_own_content',
            'label' => 'يعدل محتواه فقط',
        ]);
        AccountPermission::create([
            'name' => 'delete_any_content',
            'label' => 'يحذف أي محتوى',
        ]);
        AccountPermission::create([
            'name' => 'delete_own_content',
            'label' => 'يحذف محتواه فقط',
        ]);

        // Create additional permissions as needed
        // ...
    }
}
