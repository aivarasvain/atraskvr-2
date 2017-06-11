<?php

namespace App\Http\Controllers;

use App\Models\VROrders;
use App\Models\VRPages;
use App\Models\VRResources;
use Illuminate\Http\Request;

class UserCPController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $configuration['orders'] = VROrders::with('reservations')->where('user_id', auth()->user()->id)->get()->toArray();
        return view('user.index', $configuration);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $configuration['record'] = VROrders::with('reservations')->find($id);
        $configuration['pages'] = VRPages::with('translations')->where('category_id', 'kambariai')->get()->toArray();
        $configuration['resources'] = VRResources::get()->toArray();
        return view('user.view', $configuration);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
