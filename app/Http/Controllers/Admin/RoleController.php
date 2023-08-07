<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Validator;

class RoleController extends Controller
{
   public function permissionAll() {
    $permissions = Permission::latest()->paginate(6);
    return view('admin.permission.index', compact("permissions"));
   }

   public function permissionAdd() {
    return view('admin.permission.add');
   }

   public function permissionStore(Request $request) {
    $this->validatePermission($request);
    $role = Permission::create([
        'name' => $request->name,
        'group_name' => $request->group_name,

    ]);
    $this->redirectToPermission('saved permission successfully', 'success');
    return redirect()->route('permission#all');

   }
   public function permissionDelete($id) {
        Permission::findOrFail($id)->delete();
        $this->redirectToPermission('Deleted permission successfully', 'warning');
        return redirect()->route('permission#all');
   }

   public function permissionEdit($id) {
        $permissions = Permission::findOrFail($id);
        return view('admin.permission.edit', compact('permissions'));
   }

   public function permissionUpdate(Request $request) {

        $this->validatePermission($request);
        $id = $request->id;
        Permission::findOrFail($id)->update([
            'name' => $request->name,
            'group_name' => $request->group_name,

        ]);
        $this->redirectToPermission('Updated permission successfully', 'success');
        return redirect()->route('permission#all');
   }

   public function roleList(){
    $roles = Role::latest()->paginate(6);
    return view('admin.role.index', compact("roles"));
   }

   public function roleAdd() {
    return view('admin.role.add');
   }

   public function roleStore(Request $request) {
    $this->validateRole($request);
    $role = Role::create([
        'name' => $request->name,

    ]);
    $this->redirectToPermission('saved Role successfully', 'success');
    return redirect()->route('role#list');

   }

   public function roleEdit($id) {
        $roles = Role::findOrFail($id);
        return view('admin.role.edit', compact('roles'));
   }


   public function roleUpdate(Request $request) {
        $this->validateRole($request);
        $id = $request->id;
        Role::findOrFail($id)->update([
            'name' => $request->name,

        ]);
        $this->redirectToPermission('Updated Role successfully', 'success');
        return redirect()->route('role#list');
   }

   public function roleDelete($id) {
        $role = Role::findOrFail($id);
        if(!is_null($role)) {
            $role -> delete();
        }
        $this->redirectToPermission('Deleted role successfully', 'warning');
        return redirect()->route('role#list');
   }

   //role and permission

   public function permissionRoleAdd() {
    $roles = Role::all();
    $permissions = Permission::all();
    $permission_groups = User::getpermissionGroups();

    return view('admin.roles_permissions.add', compact('roles', 'permissions', 'permission_groups'));
   }


   public function permissionRoleAll() {
    $roles = Role::paginate(6);
    return view('admin.roles_permissions.index', compact('roles'));
   }


   public function permissionRoleStore(Request $request) {
        $data = array();
        $permissions = $request->permission;

        foreach($permissions as $key=>$permission ) {
            $data['role_id'] = $request->role_id;
            $data['permission_id'] = $permission;

            DB::table('role_has_permissions')->insert($data);
        }

        $this->redirectToPermission('Save role permission successfully', 'success');
        return redirect()->route('permission#role#all');
   }

   public function permissionRoleEdit($id) {
    $role = Role::findOrFail($id);
    $permissions = Permission::all();
    $permission_groups = User::getpermissionGroups();

    return view('admin.roles_permissions.edit', compact('role', 'permissions', 'permission_groups'));
   }

   public function permissionRoleUpdate(Request $request, $id) {
     $role = Role::findOrFail($id);
     $permissions = $request->permission;
     if(!empty($permissions)) {
        $role -> syncPermissions($permissions);
     }

     $this->redirectToPermission('Updated role permission successfully', 'success');
    return redirect()->route('permission#role#all');
   }

    public function permissionRoleDelete($id) {
        $role = Role::findOrFail($id);
        if(!is_null($role)) {
            $role->delete();
        }
        $this->redirectToPermission('Deleted role permission successfully', 'warning');
        return redirect()->back();
    }

    private function validatePermission($request) {
        $validationRules =  [
            'name' => 'required',
            'group_name' => 'required',
        ];

        $validationMessage = [
            'name.required' => "Fill permission name",
            'group_name.required' => 'Fill permission group name'

        ];

        Validator::make($request->all(),$validationRules, $validationMessage)->validate();
    }

    private function validateRole($request) {
        $validationRules =  [
            'name' => 'required',
        ];

        $validationMessage = [
            'name.required' => "Fill permission name",
        ];

        Validator::make($request->all(),$validationRules, $validationMessage)->validate();
    }


   private function redirectToPermission($message, $alertType) {
    $notification = array(
        'message' => $message,
        'alert-type' => $alertType,
    );
    return redirect()->route('permission#all')->with($notification);
}

}
