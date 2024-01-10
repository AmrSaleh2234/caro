<?php

namespace App\Http\Controllers\Admin;

use DB;
use Hash;
use Carbon\Carbon;
use App\Models\City;
use App\Models\Role;
use App\Models\User;
use App\Models\Region;
use App\Models\Address;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class UserController extends AdminController
{

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */
    protected $type_array = ['client', 'delivery', 'admin'];
    protected $social_array = ['facebook', 'google', 'twitter'];
    protected $device_array = ['windows', 'ios', 'android'];
    protected $admin_id, $manger_id, $client_id;
    public function __construct()
    {
        parent::__construct();
        $this->class = "admin";
        $this->table = "users";
    }


    public function index(Request $request)
    {
        $input = $request->all();
        $type       = $this->getTypeInput($request,"admin", $this->type_array, true);
        $input      = $request->all();
        $limit      = isset($input['limit'])  ?  $input['limit'] : $this->limit;
        $name       = isset($input['name']) ? $input['name'] : '';
        $email      = isset($input['email']) ? $input['email'] : '';
        $phone      = isset($input['phone']) ? $input['phone'] : '';
        // $social     = isset($input['social']) ? $input['social'] : '';
        // $device     = isset($input['device']) ? $input['device'] : '';
        $date_start = isset($input['date_start']) ? $input['date_start'] : '';
        $date_end   = isset($input['date_end']) ? $input['date_end'] : '';
        //$social, $device,
        $data_all   = $this->userSearch($type, $name, $email, $phone, $date_start, $date_end, $this->type_array);
        if ($limit > 0) {
            $data = $data_all->paginate($limit);
        } else {
            $count = $data_all->count();
            $data = $data_all->paginate($count);
        }
        $class = $type;
        $title = __("Users");
        if ($type == "client") {
            $title = __("Clients");
        } elseif ($type == "delivery") {
            $title = __("Deliveries");
        }
        $user_delete = 0;
        if ($this->user->isAbleTo('users.delete')) {
            $user_delete = 1;
        }
        $user_type = "all";
        $route_create = $this->checkPerm($this->table.".create");
        return view('admin.users.index', compact(
            'user_type',
            'route_create',
            'user_delete',
            'class',
            'type',
            'data',
            'title',
        ))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    public function trash(Request $request)
    {

        $data = User::onlyTrashed()->latest()->paginate($this->limit);
        $class = $this->class;
        $type = "admin";
        $title = __("Users");
        $user_delete = 1;

        return view('admin.users.index', compact('user_delete', 'class', 'type',  'data', 'title'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }
    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */
    public function create(Request $request)
    {
        $input = $request->all();
        $type       = $this->getTypeInput($request,"admin", $this->type_array, true);
        $image = null;
        $new = $image_active = 1;
        $class = $type;
        $lang = $this->user->locale;
        $user_type = $this->user->type;
        $roles = $this->getRoles();
        $userRoles = [];
        $cities = $this->getCities($lang);
        $user_active = 0;
        if (in_array($this->user->type,$this->user_admins)) {
            $user_active = 1;
        }
        return view('admin.users.create', compact('user_type', 'roles','userRoles', 'user_active', 'type', 'cities', 'class', 'new', 'image', 'image_active'));
    }

    /**

     * Store a newly created resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response

     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name_first' => 'required|min:2|max:255',
            'name_last' => 'required|min:2|max:255',
            'type' => 'required',
            'roles' => 'nullable|array|exists:roles,id',
            'password' => 'required|min:8|same:confirm-password',
            'birth_date' => 'nullable|date|date_format:Y-m-d|before_or_equal:' . Carbon::now()->subYears(15)->format('Y-m-d'),
        ]);
        if ($request->type == "client") {
            $this->validate($request, [
                'email' => 'nullable|email|uniqueUserClientEmail',
                'phone' => 'required|max:50|regex:/^01[0-2,5][0-9]{8}/|uniqueUserClientPhone',
            ]);
        } else {
            $this->validate($request, [
                'email' => 'nullable|email|uniqueUserEmail',
                'phone' => 'required|max:50|regex:/^01[0-2,5][0-9]{8}/|uniqueUserPhone',
            ]);
        }


        $input = $request->all();
        foreach ($input as $key => $value) {
            if ($key != "roles") {
                $input[$key] = stripslashes(trim(filter_var($value, FILTER_SANITIZE_STRING)));
            }
            if ($input[$key] == "") {
                $input[$key] = NULL;
            }
        }

        if (!in_array($input['type'], $this->user_roles_array)) {
            return $this->pageUnauthorized();
        }
        if (in_array($input['type'], $this->access_all_type) && !in_array($this->user->type, $this->access_all_type)) {
            return $this->pageUnauthorized();
        }

        if (in_array($input['type'], $this->admins_super) && !in_array($this->user->type, $this->admins_super)) {
            return $this->pageUnauthorized();
        }
        $input['password'] = Hash::make($input['password']);
        $input['image'] = $this->getImage($input['image']);

        if ($input['type'] == 'client') {
            $input['is_client'] = 1;
        } elseif ($input['type'] == 'delivery') {
            $input['is_delivery'] = 1;
        } else {
            $input['is_admin'] = 1;
        }
        $user = User::create($input);
        if ($input['is_admin'] == 1) {
            $roles = isset($input['roles']) ? $input['roles'] : array();
            $user->roles()->sync($roles);
        }
        return redirect()->route('admin.users.index', ['type' => $input['type']])->with('success', __('User created successfully'));
    }

    /**

     * Display the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function show(Request $request, $id)
    {
        return $this->edit($id);
        // $user = User::find($id);
        //  if (!empty($user) && ($user->type == "client")) {
        //     $data_all = Address::with('user','city')->where('user_id',$id)->latest('addresses.created_at');
        //     $data= $data_all->paginate($this->limit);
        //     // $data = Address::with('user','city')->latest()->where('user_id',$id)->paginate($this->limit);
        //     $class = "address";
        //     // $title = __("Addresses");
        // return view('admin.address.index', compact('data','class','user'))->with('i', ($request->input('page', 1) - 1) * 5);
        // } else {
        //     return $this->pageError();
        // }
    }




    /**

     * Show the form for editing the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */
    public function edit($id)
    {

        if (in_array($id, $this->access_all_id) && !in_array($this->user->id, $this->access_all_id)) {
            return $this->pageError();
        }
        $user = User::find($id);
        if (!empty($user)) {

            if (in_array($user->type, $this->access_all_type) && !in_array($this->user->type, $this->access_all_type)) {
                return $this->pageUnauthorized();
            }

            if (in_array($user->type, $this->admins_super) && !in_array($this->user->type, $this->admins_super)) {
                return $this->pageUnauthorized();
            }

            if ($this->user->id != $id &&  !in_array($this->user->type, $this->admins_super)) {
                return $this->pageUnauthorized();
            }
            $type = $user->type;
            $class = $type;
            if(!in_array($user->type,$this->type_array)){
                $class = "admin";
            }
            $image = $user->image;
            $user_type = $this->user->type;
            $image_active = 1;
            $new = 0;
            $lang = $this->user->locale;
            $roles = $this->getRoles();
            $userRoles = $user->roles;
            $cities = $this->getCities($lang);
            return view('admin.users.edit', compact('user_type','roles', 'userRoles', 'class', 'type', 'cities', 'user',  'new', 'image_active', 'image'));
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
    public function update(Request $request, $id)
    {

        if (in_array($id, $this->access_all_id) && !in_array($this->user->id, $this->access_all_id)) {
            return $this->pageError();
        }
        $user = User::find($id);
        if (!empty($user)) {
            if (in_array($user->type, $this->access_all_type) && !in_array($this->user->type, $this->access_all_type)) {
                return $this->pageUnauthorized();
            }

            if (in_array($user->type, $this->admins_super) && !in_array($this->user->type, $this->admins_super)) {
                return $this->pageUnauthorized();
            }

            if ($this->user->id != $id &&  !in_array($this->user->type, $this->admins_super)) {
                return $this->pageUnauthorized();
            }

            $this->validate($request, [
                'name_first' => 'required|min:2|max:255',
                'name_last' => 'required|min:2|max:255',
                'password' => 'nullable|same:confirm-password|min:8',
                'birth_date' => 'nullable|date|date_format:Y-m-d|before_or_equal:' . Carbon::now()->subYears(15)->format('Y-m-d'),
            ]);
            if ($user->type != "client") {
                $this->validate($request, [
                    'email' => "nullable|email|uniqueUserEmailUpdate:$id",
                    'phone' => "required|max:50|regex:/^01[0-2,5][0-9]{8}/|uniqueUserPhoneUpdate:$id",

                ]);
            } else {
                $this->validate($request, [
                    'email' => "nullable|email|uniqueUserClientEmailUpdate:$id",
                    'phone' => "required|max:50|regex:/^01[0-2,5][0-9]{8}/|uniqueUserClientPhoneUpdate:$id",
                ]);
            }

            $input = $request->all();
            foreach ($input as $key => $value) {
                if ($key != "roles") {
                    $input[$key] = stripslashes(trim(filter_var($value, FILTER_SANITIZE_STRING)));
                }
                if ($input[$key] == "") {
                    $input[$key] = NULL;
                }
            }
            if (in_array($user->type, ["client"])) {
                $input = Arr::except($input, array('is_client', 'type'));
            }
            if (in_array($user->type, ["delivery"])) {
                $input = Arr::except($input, array('is_delivery' . 'type'));
            }

            if (isset($input['type']) && !in_array($input['type'], $this->user_roles_array)) {
                return $this->pageUnauthorized();
            }

            if (!empty($input['password'])) {
                $input['password'] = Hash::make($input['password']);
            } else {
                $input = Arr::except($input, array('password'));
            }

            if (in_array($id, $this->access_all_id)) {
                $input['active'] = 1;
            }

            $input['image'] = $this->getImage($input['image']);
            $user->update($input);
            if (!in_array($user->type, ["client",'delivery'])) {
                $roles = isset($input['roles']) ? $input['roles'] : array();
                $user->roles()->sync($roles);
            }

            if ($this->user->id == $id) {
                app()->setLocale($input['locale']);
            }
            if ($this->user->isAbleTo(['users.index'])) {
                return redirect()->route('admin.users.index', ['type' => $user->type])->with('success', __('User updated successfully'));
            } else {
                return redirect()->route('admin.users.edit', $id)->with('success', __('User updated successfully'));
            }
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
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        if (isset($user) && in_array($user->type, $this->access_all_type) && in_array($id, $this->access_all_id) && $user->isAbleTo($this->access_all_perms)) {
            return $this->pageError();
        } else {
            $user->delete();
            return redirect()->route('admin.users.index')->with('success', __('User deleted successfully'));
        }
    }

    public function restore($id)
    {
        User::withTrashed()->where('id', $id)->restore();
        $user = User::find($id);
        if (!empty($user)) {
            return redirect()->route('admin.users.trash')->with('success', __('User restore successfully'));
        } else {
            return $this->pageError();
        }
    }

    // public function delete($id)
    // {

    //     if (!in_array($id,$this->access_all_id)) {
    //     User::withTrashed()->where('id', $id)->forceDelete();
    //     return redirect()->route('admin.users.trash')->with('success', __('User deleted successfully'));
    //     } else {
    //     return $this->pageError();
    // }
    // }

}
