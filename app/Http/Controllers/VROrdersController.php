<?php

namespace App\Http\Controllers;

use App\Models\VROrders;
use App\Models\VRPages;
use App\Models\VRResources;
use App\Models\VRUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VROrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function adminIndex()
    {

        $configuration['list'] = VROrders::get()->toArray();
        $configuration['users'] = VRUsers::get()->toArray();
        $dataFromModel = new VROrders();
        $configuration['tableName'] = $dataFromModel->getTableName();

        $configuration['orders'] = VROrders::paginate(10);



        return view('admin.list', $configuration);
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
    public function adminShow($id)
    {
        $dataFromModel = new VROrders();
        $configuration['tableName'] = $dataFromModel->getTableName();
        $configuration['experiences'] = VRPages::with('translations')->where('category_id', 'kambariai')->get()->toArray();
        $configuration['resources'] = VRResources::get()->toArray();
        $configuration['record'] = VROrders::with('reservations')->find($id)->toArray();

        return view('admin.single', $configuration);
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
