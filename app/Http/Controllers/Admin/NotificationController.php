<?php

namespace App\Http\Controllers\Admin;

use App\Models\Device;
use App\Models\User;
use App\Notifications\AdminNotification;
use FCM;
use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;

class NotificationController extends AdminController
{

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function __construct()
    {
        parent::__construct();
        $this->class        = "notification";
        $this->table        = "notifications";
    }

    public function index(Request $request)
    {
        $input = $request->all();
        $table = "notifications";
        $date_start = isset($input['date_start']) ? $input['date_start'] : '';
        $date_end   = isset($input['date_end']) ? $input['date_end'] : '';
        $user_id   = isset($input['user_id']) ? (int) $input['user_id'] : 0;
        $users = $this->getAllUsers();
        // $user_id = auth()->user()->id;
        $data_all = DatabaseNotification::latest();
        if($user_id > 0){
            $data_all->where('notifiable_id', $user_id);
        }
        $data_all->where('notifiable_type', 'users');
        $data_all = $this->dateFilter($data_all,$date_start,$date_end,$table);
        $data = $data_all->where('notifiable_type','users')->paginate($this->limit);
        $class = $this->class;
        $type= $this->type;
        $title = __("Notifications");
        $route_create = $this->checkPerm($this->table.".create");
        $route_delete = $this->checkPerm("notifications.delete");
        $this->user->unreadNotifications->markAsRead();
        return view('admin.notifications.index', compact(
            'title','route_delete','route_create','class','data','users','type','user_id','date_start','date_end'))->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */
    public function create(Request $request)
    {
        $input = $request->all();
        $user_id = isset($input['user_id']) ? $input['user_id'] : 0;
        $users = $this->getNotifiUsers();
        $class = 'notification_create';
        return view('admin.notifications.create', compact('class','users','user_id'));
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
            'name_ar'       => 'required',
            'name_en'       => 'required',
            'content_ar'    => 'required',
            'content_en'    => 'required',
            'user_id'       => 'nullable',
            'image'         => 'nullable',
            'type'          => 'required|in:all,database,firebase',
        ]);

        $input = $request->all();
        foreach ($input as $key => $value) {
            $input[$key] = stripslashes(trim(filter_var($value, FILTER_SANITIZE_STRING)));
            if ($input[$key] == "") {
                $input[$key] = NULL;
            }
        }
        $input['title']     = $this->getName($input['name_ar'], $input['name_en']);
        $input['message']   = $this->getName($input['content_ar'], $input['content_en']);
        $input['image']     = $this->getImage($input['image']);
        $user_ids           = (int) $input['user_id'];
        if ((int) $input['user_id'] == 0) {
            $user_ids = $this->getClients();
        }
        $database = $firebase = true;
        if($input['type'] == "firebase"){
            $database = false;
        }
        if($input['type'] == "database"){
            $firebase = false;
        }
        $this->notificationUser($user_ids, $input['title'], $input['message'], 'admin', null,null,null,$input['image'],$database,$firebase);
        return redirect()->route('admin.notifications.index')->with('success', __('Notifications created successfully'));
    }

    /**

     * Show the form for editing the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function show( Request $request,$id)
    {
        return $this->edit($request, $id);
    }

    /**

     * Show the form for editing the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */
    public function edit(Request $request,$id)
    {
        $notification = DatabaseNotification::find($id);
        if (!empty($notification)) {
            $title = $notification->data['title'];
            $message = $notification->data['message'];
            $name_en = $name_ar = $content_ar  = $content_en = NULL;
            if(!empty($title)){
                $name_ar = $title['ar'];
                $name_en = $title['en'];
            }
            if(!empty($message)){
                $content_ar = $message['ar'];
                $content_en = $message['en'];
            }
            $class = $this->class;
            return view('admin.notifications.edit', compact('class','notification','name_en','name_ar','content_en','content_ar'));
        } else {
            return $this->pageError($this->class);
        }
    }
    // public function edit(Request $request, $id)
    // {
    //     $notification = DatabaseNotification::find($id);
    //     if (!empty($notification)) {
    //         $title = $notification->data['title'];
    //         $message = $notification->data['message'];
    //         $name_en = $name_ar = $content_ar  = $content_en = NULL;
    //         if(!empty($title->name)){
    //             $name_ar = $title->name['ar'];
    //             $name_en = $title->name['en'];
    //         }
    //         if(!empty($message->content)){
    //             $content_ar = $message->content['ar'];
    //             $content_en = $message->content['en'];
    //         }
    //         $class = $this->class;
    //         return view('admin.notifications.edit', compact('class','notification', 'title', 'message','name_en','name_ar','content_en','content_ar'));
    //     } else {
    //         return $this->pageError($this->class);
    //     }
    // }

    /**

     * Update the specified resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */
    public function update(Request $request, $id)
    {
        $notification = DatabaseNotification::find($id);

        if (!empty($notification)) {
            $this->validate($request, [
                'name_ar' => 'required',
                'name_en' => 'required',
                'content_ar' => 'required',
                'content_en' => 'required',
            ]);

            $input = $request->all();
            foreach ($input as $key => $value) {
                $input[$key] = stripslashes(trim(filter_var($value, FILTER_SANITIZE_STRING)));
            }

            $input['title']   = $this->getName($input['name_ar'],$input['name_en']);
            $input['message'] = $this->getName($input['content_ar'],$input['content_en']);
            $noti['data'] = [
                'title' => $input['title'],
                'message' => $input['message'],
            ];
            $notification->update($noti);
            return redirect()->route('admin.notifications.index')->with('success', __('Notification updated successfully'));

        } else {
            return $this->pageError($this->class);
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
        $notification = DatabaseNotification::find($id);
        if (!empty($notification)) {
            DatabaseNotification::find($id)->delete();
            return redirect()->route('admin.notifications.index')->with('success', __('Notification deleted successfully'));
        } else {
            return $this->pageError($this->class);
        }
    }

    public function delete(Request $request)
    {
        $input = $request->all();
        $table = "notifications";
        $date_start = isset($input['date_start']) ? $input['date_start'] : '';
        $date_end   = isset($input['date_end']) ? $input['date_end'] : '';
        $user_id   = isset($input['user_id']) ? (int) $input['user_id'] : 0;
        $data_all = DatabaseNotification::latest();
        if($user_id > 0){
            $data_all->where('notifiable_id',$user_id)->where('notifiable_type','users');
        }
        $data_all = $this->dateFilter($data_all,$date_start,$date_end,$table);
        $notification = $data_all->delete();
        if (isset($notification)) {
            return redirect()->route('admin.notifications.index')->with('success', __('Notification deleted successfully'));
        } else {
            return $this->pageError($this->class);
        }


    }

}
