<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Permission;
use DB;

class RoleController extends AdminController {
    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    /**
     * Create a new controller instance.
     *
     * @return void
     */

     public function __construct()
    {
        parent::__construct();
        $this->class        = "role";
        $this->table        = "roles";
    }

    public function index(Request $request) {
        $data = Role::latest()->paginate($this->limit);
        $class = $this->class;
        $route_create = $this->checkPerm($this->table.".create");
        return view('admin.roles.index', compact('route_create','data','class'))->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */
    public function create() {
        $rolePermissions = [];
        $permissions = Permission::select('description')->orderBy('description', 'ASC')->distinct()->get();
        $permissions = $permissions->map(function ($permission) {
            return [
                'category_name' => getModuleTableModelName($permission['description']),
                'permissions' => Permission::where('description', $permission['description'])->pluck('display_name', 'id')->toArray()
            ];
        })->toArray();
        $class = $this->class;
        return view('admin.roles.create', compact('class','permissions', 'rolePermissions'));
    }

    /**

     * Store a newly created resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response

     */
    public function store(Request $request) {
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'display_name' => 'required',
//            'permission' => 'required',
        ]);
        $input = $request->all();
        foreach ($input as $key => $value) {
            if ($key != "permission") {
                $input[$key] = stripslashes(trim(filter_var($value, FILTER_SANITIZE_STRING)));
            }
        }
        $role = Role::create($input);
        $permissions = isset($input['permissions']) ? $input['permissions'] : array();
        $role->permissions()->sync($permissions);

        return redirect()->route('admin.roles.index')->with('success', __('Role created successfully'));
    }

    /**

     * Display the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */
//    public function show($id) {
//        $role = Role::find($id);
//        if (!empty($role)) {
//            $role_edit = $role_delete = $role_create = 1;
//
//            return view('admin.roles.show', compact('role', 'role_create', 'role_delete', 'role_edit'));
//        } else {
//            return $this->pageError();
//        }
//    }
        public function show(Request $request,$id) {
            return $this->edit($id);
    }


    /**

     * Show the form for editing the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */
    public function edit($id) {
        $roles = $this->user->roles;
            $user_roles = [];
            foreach ($roles as $user_role) {
                $user_roles[$user_role->id] = $user_role->id;
            }
        if ($id == 1 && !in_array($id, $user_roles)) {
            return $this->pageUnauthorized($this->class);
        }
        $role = Role::find($id);
        if (!empty($role)) {
            $rolePermissions = $role->permissions->pluck('id', 'id')->toArray();
            $permissions = Permission::select('description')->orderBy('description', 'ASC')->distinct()->get();
            $permissions = $permissions->map(function ($permission) {
                return [
                    'category_name' => getModuleTableModelName($permission['description']),
                    'permissions' => Permission::where('description', $permission['description'])->pluck('display_name', 'id')->toArray()
                ];
            })->toArray();
            $class = $this->class;
            return view('admin.roles.edit', compact('class','role', 'permissions', 'rolePermissions'));
        } else {
            return $this->pageError();
        }
    }

    /**

     * Update the specified resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */
    public function update(Request $request, $id) {
        $roles = $this->user->roles;
            $user_roles = [];
            foreach ($roles as $user_role) {
                $user_roles[$user_role->id] = $user_role->id;
            }
        if ($id == 1 && !in_array($id, $user_roles)) {
            return $this->pageUnauthorized($this->class);
        }
        $role = Role::find($id);
        if (!empty($role)) {
            $this->validate($request, [
                'name' => 'required|unique:roles,name,' . $id,
                'display_name' => 'required',
//                'permission' => 'required',
            ]);

            $input = $request->all();
            foreach ($input as $key => $value) {
                if ($key != "permissions") {
                    $input[$key] = stripslashes(trim(filter_var($value, FILTER_SANITIZE_STRING)));
                }
            }
            if ($id == 1){
                if($input['name'] != "super_admin"){
                    $input['name'] = "admin";
                }
            }
            $role->update($input);
            $permissions = isset($input['permissions']) ? $input['permissions'] : array();
            $role->permissions()->sync($permissions);
            return redirect()->route('admin.roles.index')->with('success', __('Role updated successfully'));
        } else {
            return $this->pageError();
        }
    }

    /**

     * Remove the specified resource from storage.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */
    public function destroy($id) {
        $role = Role::find($id);
        if (!empty($role) && $id > 1) {
            Role::find($id)->delete();
            return redirect()->route('admin.roles.index')->with('success', 'Role deleted successfully');
        } else {
            return redirect()->route('admin.roles.index')->with('error', __('Role deleted failed'));
        }
    }

}
