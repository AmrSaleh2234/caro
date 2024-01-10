<?php

namespace App\Http\Controllers\Api;

use Exception;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Http\Resources\NotificationResource;
use App\Http\Resources\NotificationCollection;

class NotificationController extends ApiHomeController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            $input  = $request->all();
            $read_all    = isset($input['read_all']) ? (int) $input['read_all'] : 0;
            $unread    = isset($input['unread']) ? (int) $input['unread'] : 0;
            $read    = isset($input['read']) ? (int) $input['read'] : 0;
            if($read_all == 1){
                $this->authUser()->unreadNotifications->markAsRead();
            }
            $notifications_all = DatabaseNotification::latest()->where('notifiable_id', $this->authUserID())->where('notifiable_type', 'users');
            if($unread == 1 && $read == 0){
                $notifications_all->whereNull('read_at');
            }elseif($unread == 0 && $read == 1){
                $notifications_all->whereNotNull('read_at');
            }
            $notifications = $notifications_all->paginate($this->limit);
            return $this->collectionResponse(new NotificationCollection($notifications));
        } catch (Exception $e) {
            return $this->errorResponse($e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        return $this->successResponse();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->authUser()->notifications->where('id', $id)->markAsRead();
        $notification = DatabaseNotification::where('id', $id)->where('notifiable_id', $this->authUserID())->where('notifiable_type', 'users')->first();
        $data = ['notification' => new NotificationResource($notification)];
        return $this->successResponse($data);
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
        $notification = DatabaseNotification::find($id);
        if (!empty($notification)) {
            return $this->successResponse();
        } else {
            return $this->errorResponse();
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
        if (!empty($notification) && $notification->notifiable_id == $this->authUserID() && $notification->notifiable_type == "users") {
            $notification->delete();
            return $this->successResponse();
        } else {
            return $this->errorResponse();
        }
    }
}
