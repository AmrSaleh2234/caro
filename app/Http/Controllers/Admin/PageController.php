<?php

namespace App\Http\Controllers\Admin;

use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends AdminController
{
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
    protected $page_rules;
    public function __construct()
    {
        parent::__construct();
        $this->class = "page";
        $this->table = "pages";
        $this->page_rules = array_merge($this->main_rules, [
            'type' => 'required|string',
        ]);
    }
    public function index(Request $request)
    {
        $input      = $request->all();
        $type     = isset($input['type']) ? $input['type'] : 'page';
        if (!in_array($type, $this->page_types)) {
            $type = "page";
        }
        $data_all = Page::where('type', $type)->with('product','store')->latest();
        $data = $data_all->paginate($this->limit);
        $class = $this->class;
        $title = __("Pages");
        $route_create = $this->checkPerm($this->table . ".create");
        $route_edit = $this->checkPerm($this->table . ".edit");
        if ($type !=  "page") {
            $class = $this->class . "_" . $type;
        }
        $create_name = __("Create")." ".pageName($type);
        return view('admin.pages.index', compact('create_name','data', 'type', 'title', 'route_create', 'route_edit', 'class'))->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */
    public function create(Request $request)
    {
        $class = $this->class;
        $input      = $request->all();
        $type     = isset($input['type']) ? $input['type'] : 'page';
        if (!in_array($type, $this->page_types)) {
            $type = "page";
        }
        if ($type !=  "page") {
            $class = $this->class . "_" . $type;
        }
        $order_id = 1;
        $products = $this->getProducts($this->user->locale);
        return view('admin.pages.create', compact('products', 'class', 'order_id', 'type'));
    }

    /**

     * Store a newly created resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response

     */
    public function store(Request $request)
    {
        if ($request->type == "page") {
            $this->validate($request, $this->main_rules);
        }else{
            $this->validate($request, [
                'order_id' => 'required|integer|min:1|max:127',
                'active' => 'required|in:0,1',
                'type' => 'required',
            ]);
        }
        $input = $request->all();
        foreach ($input as $key => $value) {
            if ($key != "content_en" && $key != "content_ar") {
                $input[$key] = stripslashes(trim(filter_var($value, FILTER_SANITIZE_STRING)));
            }
            if ($input[$key] == "") {
                $input[$key] = NULL;
            }
        }
        if (!in_array($input['type'], $this->page_types)) {
            $input['type'] = "page";
        }
        if ((int) $input['product_id'] <= 0) {
            $input['product_id'] = NULL;
        }
        $input['user_id'] = $this->user->id;
        $input['link'] = str_random(8);
        $input['name'] = $this->getName($input['name_ar'], $input['name_en']);
        $content_ar = $this->contentImage($input['content_ar']);
        $content_en = $this->contentImage($input['content_en']);
        $input['title']  = $this->getName($input['title_ar'], $input['title_en']);
        $input['content'] = $this->getContent($content_ar, $content_en);
        $input['image'] = $this->getImage($input['image']);
        $input['icon'] = $this->getImage($input['icon']);
        Page::create($input);

        return redirect()->route('admin.pages.index', ['type' => $input['type']])->with('success', __('Page created successfully'));
    }

    /**

     * Display the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function show(Request $request, $id)
    {
        return $this->edit($request, $id);
    }


    /**

     * Show the form for editing the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */
    public function edit(Request $request, $id)
    {
        $page = Page::find($id);
        if (!empty($page)) {
            $class = $this->class;
            $name_ar = $name_en = $content_ar = $content_en = $title_ar = $title_en = NULL;
            if (!empty($page->name)) {
                $name_ar = $page->name['ar'];
                $name_en = $page->name['en'];
            }
            if (!empty($page->content)) {
                $content_ar = $page->content['ar'];
                $content_en = $page->content['en'];
            }
            if (!empty($page->title)) {
                $title_ar = $page->title['ar'];
                $title_en = $page->title['en'];
            }
            $image = $page->image;
            $icon = $page->icon;
            $image_active = 1;
            $type = $page->type;
            if ($type !=  "page") {
                $class = $this->class . "_" . $type;
            }
            $products = $this->getProducts($this->user->locale);
            return view('admin.pages.edit', compact('products', 'page', 'type', 'class', 'icon', 'image', 'image_active', 'name_ar', 'name_en', 'content_ar', 'content_en', 'title_ar', 'title_en'));
        } else {
            return $this->pageError($this->class);
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
        $page = Page::find($id);
        if (!empty($page)) {
            if ($request->type == "page") {
                $this->validate($request, [
                    'name_en' => 'required',
                    'name_ar' => 'required',
                ]);
            }
            $this->validate($request, [
                'order_id' => 'required|integer|min:1|max:127',
                'active' => 'required|in:0,1',
                'type' => 'required',
                'link' => "required|unique:pages,link," . $id,
            ]);


            $input = $request->all();
            foreach ($input as $key => $value) {
                if ($key != "content_en" && $key != "content_ar") {
                    $input[$key] = stripslashes(trim(filter_var($value, FILTER_SANITIZE_STRING)));
                }
                if ($input[$key] == "") {
                    $input[$key] = NULL;
                }
            }
            // $input['page_type'] = $input['type'];
            if ($input['link'] == $id) {
                $input['link'] = str_random(8);
            }
            if ((int) $input['product_id'] <= 0) {
                $input['product_id'] = NULL;
            }
            $input['name']      = $this->getName($input['name_ar'], $input['name_en']);
            $content_ar = $this->contentImage($input['content_ar'], '../../../uploads');
            $content_en = $this->contentImage($input['content_en'], '../../../uploads');
            $input['content']   = $this->getContent($content_ar, $content_en);
            $input['title']  = $this->getName($input['title_ar'], $input['title_en']);
            $input['image']     = $this->getImage($input['image']);
            $input['icon']      = $this->getImage($input['icon']);
            $page->update($input);
            return redirect()->route('admin.pages.index', ['type' => $page->type])->with('success', __('Page updated successfully'));
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
        $page = Page::find($id);
        if (!empty($page)) {
            Page::find($id)->delete();
            return redirect()->route('admin.pages.index')->with('success', __('Page deleted successfully'));
        } else {
            return $this->pageError($this->class);
        }
    }
}
