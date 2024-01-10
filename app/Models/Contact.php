<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Model;
//use DB;


class Contact extends SiteModel {

    protected $table = 'contacts';
    protected $fillable = [
        'user_id','phone','title','content','attachment','is_read'
    ];

    public function user() {
        return $this->belongsTo(User::Class)->withTrashed();
    }

    public function insertContact($user_id,$phone, $title,$content = NULL,$attachment = NULL, $is_read = 0) {
        $this->user_id  = $user_id;
        $this->phone    = $phone;
        $this->title    = $title;
        $this->content  = $content;
        $this->attachment  = $attachment;
        $this->is_read  = $is_read;
        return $this->save();
    }

}
