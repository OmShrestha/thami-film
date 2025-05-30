<?php

namespace App\Http\Controllers\Admin;

use App\Models\Permission;
use App\Models\Site;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Role;
use Validator;
use Session;

class RoleController extends Controller
{
    public function index() {
      $data['roles'] = Role::all();
      return view('admin.role.index', $data);
    }

    public function store(Request $request) {

      $rules = [
        'name' => 'required|max:255',
      ];

      $validator = Validator::make($request->all(), $rules);
      if ($validator->fails()) {
        $errmsgs = $validator->getMessageBag()->add('error', 'true');
        return response()->json($validator->errors());
      }

      $role = new Role;
      $role->name = $request->name;
      $role->save();

      Session::flash('success', 'Role added successfully!');
      return "success";
    }

    public function update(Request $request) {
      $rules = [
        'name' => 'required|max:255',
      ];

      $validator = Validator::make($request->all(), $rules);
      if ($validator->fails()) {
        $errmsgs = $validator->getMessageBag()->add('error', 'true');
        return response()->json($validator->errors());
      }

      $role = Role::findOrFail($request->role_id);
      $role->name = $request->name;
      $role->save();

      Session::flash('success', 'Role updated successfully!');
      return "success";
    }

    public function delete(Request $request) {

      $role = Role::findOrFail($request->role_id);
      if ($role->admins()->count() > 0) {
        Session::flash('warning', 'Please delete the users under this role first.');
        return back();
      }
      $role->delete();

      Session::flash('success', 'Role deleted successfully!');
      return back();
    }

    public function managePermissions($id) {
      $data['role'] = Role::find($id);
        $data['permissions'] = Permission::all();
      return view('admin.role.permission.manage', $data);
    }

    public function updatePermissions(Request $request) {
      $permissions = json_encode($request->permissions);
      $role = Role::find($request->role_id);
      $role->permissions = $permissions;
      $role->save();

      Session::flash('success', "Permissions updated successfully for '$role->name' role");
      return back();
    }

    public function manageSitesAccess($id) {
      $data['role'] = Role::find($id);
      $data['sites'] = Site::active()->get();
      return view('admin.role.permission.sites-access', $data);
    }

    public function updateSitesAccess(Request $request) {
        if($request->sites_access == null) {
            Session::flash('warning', "Please select at least one site.");
            return back();
        }
      $sites = json_encode($request->sites_access);
      $role = Role::find($request->role_id);
      $role->sites_access = $sites;
      $role->save();

      Session::flash('success', "Sites Access updated successfully for '$role->name' role");
      return back();
    }
}
