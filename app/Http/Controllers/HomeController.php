<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function privacy(Request $request)
    {
        $input      = $request->all();
        $type       = isset($input['type']) ? $input['type'] : 'page';
        $page_type   = isset($input['page_type']) ? $input['page_type'] : 'privacy';
        $page = Page::where('type',$type)->where('page_type',$page_type)->first();
        return view('privacy', compact('page'));
    }
}
