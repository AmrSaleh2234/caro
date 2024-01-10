<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Model;
class Category extends SiteModelSoftDelete {

    protected $table = 'categories';
    protected $fillable = [
        'name', 'link', 'image','type', 'content', 'parent_id', 'order_id','feature','active'
    ];
    //'options'

    protected $casts = [
        'name' => 'array',
        'content' => 'array'
    ];
    public function actions() {
        return $this->morphMany(Action::Class, 'actionable');
    }

    public function metas() {
        return $this->morphMany(Meta::Class, 'metaable');
    }

    public function products() {
        return $this->belongsToMany(Product::Class)->withTrashed();
    }

    public function allChildrens() {
        return $this->hasMany(Category::Class, 'parent_id');
    }

    public function childrens() {
        return $this->hasMany(Category::Class, 'parent_id')->where('active','>',0);
    }

    public function parent() {
        return $this->belongsTo(Category::Class, 'parent_id');
    }

    public function insertCategory($name, $link,$image ,$active = 1, $parent_id = NUll, $feature = 1,$order_id = 1) {
        $this->name         = $name;
        $this->link         = $link;
        $this->image        = $image;
        $this->active       = $active;
        $this->parent_id    = $parent_id;
        $this->feature      = $feature;
        $this->order_id     = $order_id;
        return $this->save();
    }

    public static function updateCategory($id, $name,$image ,$active = 1, $parent_id = NUll) {

        $category = static::findOrFail($id);
        $category->name     = $name;
        $category->active   = $active;
        $category->image    = $image;
        $category->parent_id = $parent_id;
        return $category->save();
    }

}

//$categories = Category::with('children')
//->where('parent_id', '=', 0)
//->get();
//
//<ul>
//@foreach ($categories as $parent)
//<li>
//<input type="checkbox" id="md_checkbox_{{ $parent->category_id }}"
//class="filled-in chk-col-pink category_id" value="{{ $parent->category_id }}" />
//<label for="md_checkbox_{{ $parent->category_id }}">{{ $parent->category_name }}</label>
//
//@if ($parent->children->count())
//<ul>
//@foreach ($parent->children as $child)
//<li>
//<input type="checkbox" id="md_checkbox_{{ $child->category_id }}" class="filled-in chk-col-pink category_id" value="{{ $child->category_id }}" />
//<label for="md_checkbox_{{ $child->category_id }}">{{ $child->category_name }}</label>
//</li>
//@if ($child->children->count())
//<ul>
//@foreach ($child->children as $child)
//<li>
//<input type="checkbox" id="md_checkbox_{{ $child->category_id }}" class="filled-in chk-col-pink category_id" name="categroy_id" value="{{ $child->category_id }}" />
//<label for="md_checkbox_{{ $child->category_id }}">{{ $child->category_name }}</label>
//</li>
//@endforeach
//</ul>
//@endif
//@endforeach
//</ul>
//@endif
//</li>
//@endforeach
