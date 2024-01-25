<?php

namespace Database\Seeders;

use App\Enums\RoleName;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->createAdminRole();
        $this->createVendorRole();
    }

    protected function createRole(RoleName $role, Collection $permissions): void
    {
        $newRole = Role::create(['name' => $role->value]);
        $newRole->permissions()->sync($permissions);
    }

    protected function createVendorRole(): void
    {
        $permissions = Permission::query()
            ->orWhere('name', 'like', 'category.%')
            ->orWhere('name', 'like', 'product.%')
            ->pluck('id');

        $this->createRole(RoleName::VENDOR, $permissions);

    }

    protected function createAdminRole(): void
    {
        $permissions = Permission::query()
            ->pluck('id');

        $this->createRole(RoleName::ADMIN, $permissions);
    }
}
