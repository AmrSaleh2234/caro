<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Wallet;
use Illuminate\Support\Str;

class WalletController extends AdminController
{

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */
    public function __construct()
    {
        parent::__construct();
        $this->class = "wallet";
        $this->table = "wallets";
    }



    public function index(Request $request) {
        $input = $request->all();
        $user_id = isset($input['user_id']) ? (int) $input['user_id'] : 0;
        $data_all = Wallet::with('user')->latest();
            if($user_id > 0){
                $data_all->where('user_id',$user_id);
            }
        $data= $data_all->paginate($this->limit);
        $class = $this->class;
        $route_create = $this->checkPerm($this->table.".create");
        $user = $this->user;
        return view('admin.wallets.index', compact('route_create','data','class','user'))->with('i', ($request->input('page', 1) - 1) * 5);
    }


     public function create(Request $request)
    {
            $input = $request->all();
            $user_id = isset($input['user_id']) ? (int) $input['user_id'] : 0;
            $class = $this->class;
            $users = User::select('id','name','phone','type')->active()->where('is_client',1)->get();
            $lang = $this->user->locale;
            $new = 1;
            return view('admin.wallets.create', compact('class','new','user_id','users'));
    }

    public function store(Request $request)
    {

            $this->validate($request, [
                'wallet' => 'required',
                'type' => 'required',
                'user_id' => 'required',
            ]);

            $input = $request->all();
            foreach ($input as $key => $value) {
                    $input[$key] = stripslashes(trim(filter_var($value, FILTER_SANITIZE_STRING)));
            }
            // if($this->user->type == "store" || $this->user->type == "famous"){
            //     $input['user_id'] =  $this->user->id;
            // }
            Wallet::create($input);
            return redirect()->route('admin.wallets.index')->with('success', __('Wallet created successfully'));

    }

    // public function edit($id)
    // {

    //     $wallet = Wallet::find($id);
    //     if (!empty($wallet) ) {
    //         $class = 'wallet';
    //         $users = User::active()->ofTypeArray(['store','famous','client'])->pluck('name', 'id')->toArray();
    //         $new = 0;
    //         return view('admin.wallets.edit', compact('class','new','users','wallet'));
    //     } else {
    //         return $this->pageError();
    //     }
    // }

    // public function update(Request $request, $id)
    // {

    //     $wallet = Wallet::find($id);
    //     if (!empty($wallet)) {
    //         $this->validate($request, [
    //             'wallet' => 'required',
    //              'type' => 'required',
    //             // 'user_id' => 'required',
    //         ]);

    //         $input = $request->all();
    //         foreach ($input as $key => $value) {
    //                 $input[$key] = stripslashes(trim(filter_var($value, FILTER_SANITIZE_STRING)));
    //         }
    //         $wallet->update($input);
    //         if($this->user->type == "admin" || $this->user->type == "manger"){
    //             return redirect()->route('admin.wallets.index')->with('success', __('Wallet updated successfully'));
    //         }else{
    //             return redirect()->route('admin.wallets.index',['user_id'=>$this->user->id])->with('success', __('Wallet updated successfully'));

    //         }
    //     } else {
    //         return $this->pageError();
    //     }
    // }

    // public function destroy($id) {
    //     $wallet = Wallet::find($id);
    //     if (!empty($wallet)) {
    //         Wallet::find($id)->delete();
    //             return redirect()->route('admin.wallets.index')->with('success', __('Wallet deleted successfully'));
    //     } else {
    //         return $this->pageError();
    //     }
    // }

}
