<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Point;
use Illuminate\Support\Str;

class PointController extends AdminController
{

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */
    public function __construct()
    {
        parent::__construct();
        $this->class = "point";
        $this->table = "points";
    }



    public function index(Request $request) {
        $input = $request->all();
        $user_id = isset($input['user_id']) ? (int) $input['user_id'] : 0;
        $data_all = Point::with('user')->latest();
            if($user_id > 0){
                $data_all->where('user_id',$user_id);
            }

        $data= $data_all->paginate($this->limit);
        $class = $this->class;
        $route_create = $this->checkPerm($this->table.".create");
        $user = $this->user;
        return view('admin.points.index', compact('data','route_create','class','user'))->with('i', ($request->input('page', 1) - 1) * 5);
    }


     public function create(Request $request)
    {
            $input = $request->all();
            $user_id = isset($input['user_id']) ? (int) $input['user_id'] : 0;
            $class = $this->class;
            $users = User::select('id','name','phone','type')->active()->where('is_client',1)->get();            // $users = User::active()->ofTypeArray(['store','famous','client'])->pluck('name', 'id')->toArray();
            $lang = $this->user->locale;
            $new = 1;
            return view('admin.points.create', compact('class','new','user_id','users'));
    }

    public function store(Request $request)
    {
            $this->validate($request, [
                'point' => 'required',
                'type' => 'required',
                'user_id' => 'required',
            ]);

            $input = $request->all();
            foreach ($input as $key => $value) {
                    $input[$key] = stripslashes(trim(filter_var($value, FILTER_SANITIZE_STRING)));
            }
            // if($this->user->type == "store" || $this->user->type == "famous"){
            //     $input['user_id'] =  $this->user->id;
            // }
            Point::create($input);
            return redirect()->route('admin.points.index')->with('success', __('Point created successfully'));

    }

    // public function edit($id)
    // {

    //     $point = Point::find($id);
    //     if (!empty($point) ) {
    //         $class = 'point';
    //         $users = User::active()->ofTypeArray(['store','famous','client'])->pluck('name', 'id')->toArray();
    //         $new = 0;
    //         return view('admin.points.edit', compact('class','new','users','point'));
    //     } else {
    //         return $this->pageError();
    //     }
    // }

    // public function update(Request $request, $id)
    // {

    //     $point = Point::find($id);
    //     if (!empty($point)) {
    //         $this->validate($request, [
    //             'point' => 'required',
    //              'type' => 'required',
    //             // 'user_id' => 'required',
    //         ]);

    //         $input = $request->all();
    //         foreach ($input as $key => $value) {
    //                 $input[$key] = stripslashes(trim(filter_var($value, FILTER_SANITIZE_STRING)));
    //         }
    //         $point->update($input);
    //         if($this->user->type == "admin" || $this->user->type == "manger"){
    //             return redirect()->route('admin.points.index')->with('success', __('Point updated successfully'));
    //         }else{
    //             return redirect()->route('admin.points.index',['user_id'=>$this->user->id])->with('success', __('Point updated successfully'));

    //         }
    //     } else {
    //         return $this->pageError();
    //     }
    // }

    // public function destroy($id) {
    //     $point = Point::find($id);
    //     if (!empty($point)) {
    //         Point::find($id)->delete();
    //             return redirect()->route('admin.points.index')->with('success', __('Point deleted successfully'));
    //     } else {
    //         return $this->pageError();
    //     }
    // }

}
