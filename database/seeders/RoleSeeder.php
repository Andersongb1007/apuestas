<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Blogger']);

        //proteger la ruta de dashboard
        Permission::create(['name' => 'admin.index' , 'description' => 'ver el dashboard' ])->syncRoles([ $role1, $role2]);

        // proteger user

        Permission::create(['name' => 'admin.users.index' ,'description' => 'Ver lista de roles'  ])->syncRoles([ $role1 ]);

        Permission::create(['name' => 'admin.users.edit' , 'description' => 'Asignar roles a usuario' ])->syncRoles([ $role1 ]);


        // proteger sports

        Permission::create(['name' => 'admin.sport.index' ,'description' => 'Ver lista de deportes'  ])->syncRoles([ $role1, $role2 ]);
        Permission::create(['name' => 'admin.sport.create' , 'description' => 'Crear deporte' ])->syncRoles([ $role1]);
        Permission::create(['name' => 'admin.sport.show' , 'description' => 'Ver detalles de deporte' ])->syncRoles([ $role1]);
        Permission::create(['name' => 'admin.sport.edit' , 'description' => 'Editar deporte' ])->syncRoles([ $role1]);
        Permission::create(['name' => 'admin.sport.destroy' , 'description' => 'Eliminar deporte' ])->syncRoles([ $role1]);

        // proteger bests

        Permission::create(['name' => 'admin.bests.index' , 'description' => 'Ver lista de  apuesta' ])->syncRoles([ $role1, $role2 ]);
        Permission::create(['name' => 'admin.bests.create' ,  'description' => 'Crear apuesta'])->syncRoles([ $role1, $role2]);
        Permission::create(['name' => 'admin.bests.show' , 'description' => 'Ver detalles de apuesta' ])->syncRoles([ $role1, $role2]);
        Permission::create(['name' => 'admin.bests.edit' ,  'description' => 'Editar apuesta'])->syncRoles([ $role1, $role2]);
        Permission::create(['name' => 'admin.bests.destroy' ,  'description' => 'Eliminar apuesta'])->syncRoles([ $role1, $role2]);

        // proteger type

        Permission::create(['name' => 'admin.type.index' , 'description' => 'Ver lista de tipos de apuesta' ])->syncRoles([ $role1, $role2 ]);
        Permission::create(['name' => 'admin.type.create' , 'description' => 'Crear tipos de apuesta' ])->syncRoles([ $role1]);
        Permission::create(['name' => 'admin.type.show' ,  'description' => 'Ver detalle de tipos de apuesta'])->syncRoles([ $role1]);
        Permission::create(['name' => 'admin.type.edit ' , 'description' => ' Editar tipos de apuesta' ])->syncRoles([ $role1]);
        Permission::create(['name' => 'admin.type.destroy' ,  'description' => ' Eliminar tipos de apuesta'])->syncRoles([ $role1]);

        // proteger ticket

        Permission::create(['name' => 'admin.ticket.index' , 'description' => 'Ver lista de ticket'])->syncRoles([ $role1 ]);
        Permission::create(['name' => 'admin.ticket.show' , 'description' => 'Editar ticket'])->syncRoles([ $role1]);
    }
}
