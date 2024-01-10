<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Addition;

class AdditionController extends AdminController
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
    protected $addition_rules;
    public function __construct()
    {
        parent::__construct();
        $this->class        = "addition";
        $this->table        = "additions";
        $this->addition_rules = array_merge($this->main_rules, [
            'price' => 'required|numeric',
            'type' => 'required|in:free,paid',
        ]);
    }

    public function index(Request $request)
    {
        $data = Addition::defaultOrder()->paginate($this->limit);
        $route_create = $this->checkPerm($this->table.".create");
        $class = $this->class;
        return view('admin.additions.index', compact('route_create','data','class'))->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */
    public function create()
    {
        $class = $this->class;
        $price = 0;
        $order_id = $image_active = 1;
        return view('admin.additions.create', compact('price', 'order_id', 'image_active','class'));
    }

    /**

     * Store a newly created resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response

     */
    public function store(Request $request)
    {
        $this->validate($request, $this->addition_rules);
        $input = $request->all();
        foreach ($input as $key => $value) {
            $input[$key] = stripslashes(trim(filter_var($value, FILTER_SANITIZE_STRING)));
        }
        $input['name'] = $this->getName($input['name_ar'], $input['name_en']);
        $input['image'] = $this->getImage($input['image']);
        if ($input['type'] == "free") {
            $input['price'] = 0;
        }
        Addition::create($input);
        return redirect()->route('admin.additions.index')->with('success', __('Addition created successfully'));
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
    }



    /**

     * Show the form for editing the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */
    public function edit($id)
    {
        $addition = Addition::find($id);
        if (!empty($addition)) {
            $class = $this->class;
            $name_en = $name_ar = NULL;
            if (!empty($addition->name)) {
                $name_ar = $addition->name['ar'];
                $name_en = $addition->name['en'];
            }
            $image_active = 1;
            $image = $addition->image;
            return view('admin.additions.edit', compact('image_active', 'image','name_en', 'name_ar', 'addition', 'class'));
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
        $addition = Addition::find($id);
        if (!empty($addition)) {
            $this->validate($request, $this->addition_rules);
            $input = $request->all();
            foreach ($input as $key => $value) {
                $input[$key] = stripslashes(trim(filter_var($value, FILTER_SANITIZE_STRING)));
            }
            $input['name'] = $this->getName($input['name_ar'], $input['name_en']);
            $input['image'] = $this->getImage($input['image']);
            if ($input['type'] == "free") {
                $input['price'] = 0;
            }
            $addition->update($input);
            return redirect()->route('admin.additions.index')->with('success', __('Addition updated successfully'));
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
    // public function destroy($id) {
    //     $addition = Addition::find($id);
    //     if (!empty($addition)) {
    //             Addition::find($id)->delete();
    //             return redirect()->route('admin.additions.index')->with('success', __('Addition deleted successfully'));
    //     } else {
    //         return $this->pageError();
    //     }
    // }


}
