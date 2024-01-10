<?php

namespace App\Http\Controllers\Front;

use App\Models\Address;
use App\Http\Requests\Front\AddressStoreRequest;
use App\Http\Requests\Front\AddressDeleteRequest;
use App\Http\Requests\Front\AddressUpdateRequest;

class UserAddressController extends FrontController
{
    public function index()
    {
        $title = __('Addresses') . $this->site_mark . $this->site_title;
        $addresses = auth()->user()->addresses;
        $class = "address";
        return view('front.profile.addresses.index', compact('class','addresses','title'));
    }

    public function create()
    {
        //
    }

    public function store(AddressStoreRequest $request)
    {
        // return response([
        //     'data' => $request->all()
        // ]);
        // dd($request->all());
        $address = $request->createAddress();
        return response([
            'status' => '1',
            'message' => __('address created successfully'),
            'data' => view('front.profile.addresses.single-address-item', compact('address'))->render(),
        ]);
    }

    public function show(Address $address)
    {
        return response([
            'status' => '1',
            'data' => view('front.profile.addresses.edit-modal', compact('address'))
        ]);
    }

    public function edit(Address $address)
    {
        return response([
            'status' => '1',
            'data' => view('front.profile.addresses.edit-data-modal', compact('address'))->render()
        ]);
        // dd('this is edit');
    }

    public function update(AddressUpdateRequest $request, Address $address)
    {
        $request->updateAddress();
        $addresses = auth()->user()->addresses;
        return response([
            'status' => '1',
            'message' => __('address updated successfully'),
            'data' => view('front.profile.addresses.addresses-card', compact('addresses'))->render()
        ]);
    }

    public function destroy(AddressDeleteRequest $request, Address $address)
    {
        $address->delete();
        return response([
            'status' => '1',
            'message' => __('address deleted successfully')
        ]);
    }

    public function setAsDefault(Address $address)
    {
        // return response([
        //     'status' => '0',
        //     'message' => __('invalid address')
        // ]);
        $address->setAsDefault();
        return response([
            'status' => '1',
            'message' => __('address set as default'),
            'data' => view('front.profile.addresses.default', compact('address'))->render()
        ]);
    }

    // public function removeAddress(Request $request)
    // {
    //     // dd('testtttt');

    //     $rules =
    //         [
    //             'address_id' => 'required|exists:addresses,id',
    //         ];
    //     $user = auth()->user()->hasAddress($request->address_id);

    //     $sms =
    //         [
    //             'address_id.required' => 'العنوان مطلوب',
    //             'address_id.exists' => 'العنوان مطلوب',
    //         ];

    //     $data = validator()->make($request->all(), $rules, $sms);

    //     if ($data->fails()) {

    //         return $this->helper->responseJson(0, $data->errors()->first(), $data->errors());
    //     }

    //     $address = $user->addresses()->find($request->address_id);



    //     if ($address) {
    //         $address->is_saved = 0;
    //         $address->save();
    //         $addresses = auth('client')->user()->addresses()->where('is_saved', 1)->latest()->get();
    //         $addresses_card = view('front-new.layouts.contents.address.addresses-card', ['addresses' => $addresses])->render();
    //         return $this->helper->responseJson(1, 'تمت الحذف بنجاح', ['addresses'=>$addresses_card]);
    //     }
    //     return $this->helper->responseJson(0, 'لم يتم العثور علي العنوان');
    // }
}
