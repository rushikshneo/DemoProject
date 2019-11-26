<?php
use Illuminate\Database\Seeder;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateAdminUserSeeder extends Seeder
{
    public function run()
    {
        $user = User::create([
            'firstname'  => 'test1',
            'lastname'   => 'test2',
            'email'      => 'we@google.com',
            'password'   => bcrypt('123456'),
            'password_confirmation' => '123456',
            'role'       => 'SuperAdmin',
            'status'     => '1',
        ]);
        $permission  =  ['1','2','3','4','5','6','7','8','9','10'];
        $role        = Role::create(['name' => 'SuperAdmin']);
        $permissions = Permission::pluck('id','id')->all();
        $role->syncPermissions($permissions);
        $role->syncPermissions($permission);
        $user->assignRole([$role->id]);
    }
}
