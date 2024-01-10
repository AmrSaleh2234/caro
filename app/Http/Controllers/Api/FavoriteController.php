<?php

namespace App\Http\Controllers\Api;

use Exception;
use App\Models\Favorite;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Http\Resources\FavoriteResource;
use App\Http\Resources\FavoriteCollection;

class FavoriteController extends ApiHomeController
{
    protected $rules = [
        'favorite' => 'required|string|in:yes,no',
        'product_id' => 'required|integer|exists:products,id',
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            $favorites = Favorite::with('user', 'product')->where('user_id', $this->authUserID())->where('favorite', 'yes')->paginate($this->limit);
            return $this->collectionResponse(new FavoriteCollection($favorites));
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
        $validateRequest = $this->validateRequest($request, $this->rules);
        if (isset($validateRequest)) {
            return $validateRequest;
        }
        $input = $request->all();
        foreach ($input as $key => $value) {
            $input[$key] = stripslashes(trim(filter_var($value, FILTER_SANITIZE_STRING)));
        }
        $input['user_id'] = $this->authUserID();
        Favorite::updateFavorite($input['user_id'],$input['product_id'],$input['favorite']);
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
        $favorite = Favorite::where('id', $id)->where('user_id', $this->authUserID())->where('favorite', 'yes')->with('user', 'product')->first();
        $data = ['favorite' => new FavoriteResource($favorite)];
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
        $favorite = Favorite::find($id);
        if (!empty($favorite) && $favorite->user_id == $this->authUserID()) {
            $validateRequest = $this->validateRequest($request, $this->rules);
            if (isset($validateRequest)) {
                return $validateRequest;
            }
            $input = $request->all();
            foreach ($input as $key => $value) {
                $input[$key] = stripslashes(trim(filter_var($value, FILTER_SANITIZE_STRING)));
            }
            $input['user_id'] = $this->authUserID();
            $favorite->update($input);
            $data = ['favorite' => new FavoriteResource($favorite)];
            return $this->successResponse($data);
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
        $favorite = Favorite::find($id);
        if (!empty($favorite) && $favorite->user_id == $this->authUserID()) {
            $favorite->delete();
            return $this->successResponse();
        } else {
            return $this->errorResponse();
        }
    }
}
