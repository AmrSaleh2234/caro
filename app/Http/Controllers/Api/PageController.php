<?php

namespace App\Http\Controllers\Api;

use Exception;
use App\Models\Page;
use App\Models\Setting;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Http\Resources\PageResource;
use App\Http\Resources\PageCollection;
use App\Http\Resources\SettingResource;
use App\Http\Resources\SettingCollection;
use App\Http\Resources\SettingLiteResource;
use App\Http\Resources\SettingLiteCollection;

class PageController extends ApiHomeController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            $input      = $request->all();
            $type     = isset($input['type']) ? $input['type'] : 'page';
            $page_type     = isset($input['page_type']) ? $input['page_type'] : 'about';
            $order_type = request('order_type', 'ASC');
            $order_by = request('order_by', 'order_id');
            if ($order_type != "ASC") {
                $order_type = "DESC";
            }
            if ($order_by != "name") {
                $order_by = "order_id";
            }
            $limit   = isset($input['limit']) ? (int) $input['limit'] : $this->limit;
            $data_all = Page::active()->defaultOrder($order_by, $order_type)->where('type',$type)->where('page_type',$page_type);
            $pages = $data_all->paginate($limit);

            $data =$this->getSettingApi();
            // $setting_array = Setting::where('group', 'social')->orWhereIn('key',['address','site_phone','site_email'])->get();
            // $data_array = ['setting' => new SettingLiteCollection($setting_array)];
            // ,$data_array
            return $this->collectionResponse(new PageCollection($pages),$data);
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
        $page = Page::where('id', $id)->first();
        $data = ['page' => new PageResource($page)];
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
        $page = Page::find($id);
        if (!empty($page)) {
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
        $page = Page::find($id);
        if (!empty($page)) {
            return $this->successResponse();
        } else {
            return $this->errorResponse();
        }
    }
}
