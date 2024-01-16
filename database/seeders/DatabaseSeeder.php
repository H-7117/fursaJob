<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Database\Seeders\Account\PermissionsTableSeeder;
use Database\Seeders\Account\TenantsTableSeeder;
use Database\Seeders\Account\TenantRolesTableSeeder;
use Database\Seeders\Account\TenantUsersTableSeeder;
use Database\Seeders\Account\TenantRoleLinkWithTenantUsersAndPermissionsTableSeeder;
//
use Database\Seeders\Fursa\CompanyTableSeeder;
use Database\Seeders\Fursa\DepartmentTableSeeder;
use Database\Seeders\Fursa\JobTableSeeder;
use Database\Seeders\Fursa\JobApplcationsTableSeeder;
use Database\Seeders\Fursa\VacancyTableSeeder;
use Database\Seeders\Fursa\SeekerTableSeeder;
//
use Database\Seeders\Files\File;
use Database\Seeders\Files\FileTarget;
use Database\Seeders\Files\FileType;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(PermissionsTableSeeder::class);
        $this->call(TenantsTableSeeder::class);
        $this->call(TenantUsersTableSeeder::class);
        $this->call(TenantRolesTableSeeder::class);
        $this->call(TenantRoleLinkWithTenantUsersAndPermissionsTableSeeder::class);
        //
        $this->call(CompanyTableSeeder::class);
        $this->call(DepartmentTableSeeder::class);
        $this->call(JobTableSeeder::class);
        $this->call(JobApplcationsTableSeeder::class);
        $this->call(VacancyTableSeeder::class);
        // $this->call(SeekerTableSeeder::class);
        $this->call(FileType::class);
        $this->call(File::class);
        $this->call(FileTarget::class);

    }
}
