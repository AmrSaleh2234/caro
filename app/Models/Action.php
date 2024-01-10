<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Model;


class Action extends SiteModel {

    protected $table = 'actions';
    protected $fillable = [
        'user_id', 'actionable_id', 'actionable_type','type', 'key', 'value', 'group', 'parent_id'
    ];

    public function actionable()
    {
        return $this->morphTo();
    }

    public function childrens() {
        return $this->hasMany(Action::Class, 'parent_id');
    }

    public function parent() {
        return $this->belongsTo(Action::Class, 'parent_id');
    }

    public function user() {
        return $this->belongsTo(User::Class)->withTrashed();
    }

    public function users()
    {
        return $this->morphedByMany(User::Class, 'actionable')->withTrashed();
    }

    public function products()
    {
        return $this->morphedByMany(Product::Class, 'actionable')->withTrashed();
    }

    public function pages()
    {
        return $this->morphedByMany(Page::Class, 'actionable')->withTrashed();
    }

    public function categories()
    {
        return $this->morphedByMany(Category::Class, 'actionable')->withTrashed();
    }

    public function orders()
    {
        return $this->morphedByMany(Order::Class, 'actionable');
    }

    public function insertAction($user_id, $actionable_id,$actionable_type, $type, $key, $value , $group = NULL, $parent_id = NULL) {

        $this->user_id = $user_id;
        $this->actionable_id = $actionable_id;
        $this->actionable_type = $actionable_type;
        $this->type  = $type;
        $this->key   = $key;
        $this->value = $value;
        $this->group = $group;
        $this->parent_id = $parent_id;
        return $this->save();
    }

    public static function updateAction($user_id,$actionable_id,$actionable_type, $type, $key, $value,$group = NULL, $parent_id = NULL) {
        $action = static::where('user_id', $user_id)->where('actionable_id', $actionable_id)->where('actionable_type', $actionable_type)->where('type', $type)->first();
        if (isset($action)) {
            $action->key = $key;
            $action->value = $value;
            $action->group = $group;
            $action->parent_id = $parent_id;
            return $action->save();
        } else {
             $insert = new Action();
            return $insert->insertAction($user_id,$actionable_id,$actionable_type, $type, $key, $value,$group);
        }
    }

    public static function deleteActionable($actionable_id,$actionable_type) {
        return static::where('actionable_id', $actionable_id)->where('actionable_type', $actionable_type)->delete();
    }

    public static function deleteAction($actionable_id,$actionable_type, $type) {
        return static::where('actionable_id', $actionable_id)->where('actionable_type', $actionable_type)->where('type', $type)->delete();
    }

    public static function foundAction($user_id,$actionable_id,$actionable_type,$type) {
        $action = static::where('user_id', $user_id)->where('actionable_id', $actionable_id)->where('actionable_type', $actionable_type)->where('type', $type)->first();
        if (isset($action)) {
            return $action->id;
        } else {
            return 0;
        }
    }

}
