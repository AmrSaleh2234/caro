<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Contact;
use DB;

class ContactController extends AdminController {

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function __construct()
    {
        parent::__construct();
        $this->class        = "contact";
        $this->table = "contacts";
    }
    public function index(Request $request) {
        $input = $request->all();
        $is_read    = isset($input['is_read']) ? (int) $input['is_read'] : -1;
        $class =$this->class;
        $data_all = Contact::with('user')->latest();
        if ($is_read > -1) {
            $data_all->where('offer', $is_read);
        }
        $data = $data_all->paginate($this->limit);
        $route_create = $this->checkPerm($this->table.".create");
        return view('admin.contacts.index', compact('data','route_create','class'))
                        ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */
    /**

     * Display the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    /**

     * Show the form for editing the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */
    public function show($id) {
        return $this->edit($id);
    }

    public function edit($id) {
        $contact = Contact::find($id);
        if (!empty($contact)) {
            Contact::updateRead($id);
            $class =$this->class;
            return view('admin.contacts.show', compact('contact','class'));
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
    public function update(Request $request, $id) {
        $contact = Contact::find($id);
        if (!empty($contact)) {
            // $this->validate($request, [
            //     'title' => 'required',
            //     'content' => 'required',
            // ]);

            // $input = $request->all();
            // foreach ($input as $key => $value) {
            //     $input[$key] = stripslashes(trim(filter_var($value, FILTER_SANITIZE_STRING)));
            // }

            // $contact = new Contact();
            // $contact->updateContactReply($id);
            // $input['contact_id'] = $id;
            // return redirect()->route('admin.contacts.index')
            //                 ->with('success', __('Contact us updated successfully'));
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
    public function destroy($id) {
        $contact = Contact::find($id);
        if (!empty($contact)) {
            Contact::find($id)->delete();
            return redirect()->route('admin.contacts.index')->with('success', __('Contact us deleted successfully'));
        } else {
            return $this->pageError();
        }
    }
}
