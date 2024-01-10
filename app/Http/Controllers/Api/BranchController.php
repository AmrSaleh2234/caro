<?php

namespace App\Http\Controllers\Api;

use Exception;
use App\Models\Branch;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Http\Resources\BranchResource;
use App\Http\Resources\BranchCollection;

class BranchController extends ApiHomeController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            $branches = Branch::active()->orderby('order_id')->orderby('created_at','DESC')->paginate($this->limit);
            return $this->collectionResponse(new BranchCollection($branches));
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
        $branch = Branch::where('id', $id)->where('user_id', $this->authUserID())->first();
        $data = ['branch' => new BranchResource($branch)];
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
        $branch = Branch::find($id);
        if (!empty($branch)) {
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
        $branch = Branch::find($id);
        if (!empty($branch)) {
            return $this->successResponse();
        } else {
            return $this->errorResponse();
        }
    }
}
