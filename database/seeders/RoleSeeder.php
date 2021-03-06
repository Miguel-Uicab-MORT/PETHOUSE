<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'Administrador']);
        $role2 = Role::create(['name' => 'Cajero']);

        /**PERMISOS PARA DASHBOARD*/
        Permission::create(['name' => 'dashboard', 'description' => 'Acceder al menú administrativo'])->syncRoles([$role1]);

        /**PERMISOS PARA CALENDARIO*/
        Permission::create(['name' => 'calendar.index', 'description' => 'Acceder al CALENDARIO'])->syncRoles([$role1]);

        /**PERMISOS PARA CATEGORIA*/
        Permission::create(['name' => 'category.index', 'description' => 'Acceder a Categorias'])->syncRoles([$role1]);
        Permission::create(['name' => 'category.create', 'description' => 'Crear Categorias'])->syncRoles([$role1]);
        Permission::create(['name' => 'category.edit', 'description' => 'Editar Categorias'])->syncRoles([$role1]);
        Permission::create(['name' => 'category.delete', 'description' => 'Elminar Categorias'])->syncRoles([$role1]);

        /**PERMISO PARA ACCESO A EL INVENTARIO*/
        Permission::create(['name' => 'inventory.index', 'description' => 'Acceder a inventario de productos'])->syncRoles([$role1]);
        Permission::create(['name' => 'service.index', 'description' => 'Acceder a los servicos'])->syncRoles([$role1]);

        /**PERMISOS PARA PRODUCTOS*/
        Permission::create(['name' => 'product.create', 'description' => 'Crear productos'])->syncRoles([$role1]);
        Permission::create(['name' => 'product.edit', 'description' => 'Editar productos'])->syncRoles([$role1]);
        Permission::create(['name' => 'product.delete', 'description' => 'Eliminar productos'])->syncRoles([$role1]);

        /**PERMISOS PARA SERVICIOS*/
        Permission::create(['name' => 'service.create', 'description' => 'Crear servicios'])->syncRoles([$role1]);
        Permission::create(['name' => 'service.edit', 'description' => 'Editar servicios'])->syncRoles([$role1]);
        Permission::create(['name' => 'service.delete', 'description' => 'Eliminar servicios'])->syncRoles([$role1]);

        /**PERMISO PARA EL PUNTO DE VENTA*/
        Permission::create(['name' => 'pointsale.create', 'description' => 'Acceder al Punto de Venta'])->syncRoles([$role1, $role2]);

        /**PERMISOS PARA ACCEDER A LOS REPORTES*/
        Permission::create(['name' => 'reports.index', 'description' => 'Acceder a la lista de Reportes'])->syncRoles([$role1]);
        Permission::create(['name' => 'reports.show', 'description' => 'Acceder a ver venta'])->syncRoles([$role1]);
        Permission::create(['name' => 'reports.delete', 'description' => 'Eliminar venta'])->syncRoles([$role1]);
        Permission::create(['name' => 'reports.print', 'description' => 'Imprimir tickets de venta'])->syncRoles([$role1]);

        /**PERMISOS PARA AMINISTRAR A LOS USUARIOS*/
        Permission::create(['name' => 'users.index', 'description' => 'Acceder a lista de Empleados'])->syncRoles([$role1]);
        Permission::create(['name' => 'users.create', 'description' => 'Crear empleado'])->syncRoles([$role1]);
        Permission::create(['name' => 'users.edit', 'description' => 'Editar roles y permisos de empleado'])->syncRoles([$role1]);
        Permission::create(['name' => 'users.delete', 'description' => 'Eliminar empleado'])->syncRoles([$role1]);

        /**PERMISOS PARA AMINISTRAR A LOS USUARIOS*/
        Permission::create(['name' => 'client.index', 'description' => 'Acceder a lista de clientes'])->syncRoles([$role1]);
        Permission::create(['name' => 'client.create', 'description' => 'Crear cliente'])->syncRoles([$role1]);
        Permission::create(['name' => 'client.edit', 'description' => 'Editar datos del cliente'])->syncRoles([$role1]);
        Permission::create(['name' => 'client.delete', 'description' => 'Eliminar cliente'])->syncRoles([$role1]);

        /**PERMISOS PARA AMINISTRAR LOS ROLES Y PERMISOS DE LOS USUARIOS*/
        Permission::create(['name' => 'users.update.role', 'description' => 'Actualizar roles de empleado'])->syncRoles([$role1]);
        Permission::create(['name' => 'users.update.permission', 'description' => 'Actualizar permisos empleado'])->syncRoles([$role1]);

        /**PERMISOS PARA AMINISTRAR LOS ROLES*/
        Permission::create(['name' => 'roles.index', 'description' => 'Acceder a lista de Roles'])->syncRoles([$role1]);
        Permission::create(['name' => 'roles.create', 'description' => 'Crear Rol'])->syncRoles([$role1]);
        Permission::create(['name' => 'roles.edit', 'description' => 'Editar Rol'])->syncRoles([$role1]);
        Permission::create(['name' => 'roles.delete', 'description' => 'Eliminar Rol'])->syncRoles([$role1]);
    }
}
