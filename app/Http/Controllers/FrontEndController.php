<?php

namespace App\Http\Controllers;

use App\Models\VRCategories;
use App\Models\VRPages;
use App\Models\VRResources;
use App\Models\VRUsers;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{

    public static function navConfiguration()
    {
        $configuration = [];
        $configuration['resources']  = VRResources::pluck('path', 'id');
        $configuration['experiences'] = VRPages::with('translations')->where('category_id', 'kambariai')->get()->toArray();
        $configuration['categories'] = VRCategories::with('translations')->where('parent_id', 'menu')->get()->toArray();
        return $configuration;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($language = null)
    {

        if($language == null)
            $language = app()->getLocale();



        $configuration = self::navConfiguration();
        $configuration['aboutPage'] = VRPages::with('translations')->where('category_id', 'apie')->get()->toArray();
        $configuration['vietaPage'] = VRPages::with('translations')->where('category_id', 'vieta')->get()->toArray();
        $configuration['bilietaiCategory'] = VRCategories::with('translations')->where('id', 'bilietai')->get()->toArray();
        $configuration['remejaiCategory'] = VRCategories::with('translations')->where('id', 'remejai')->get()->toArray();


        return view('front-end.index', $configuration);
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
    public function show($language, $id)
    {


        $configuration = self::navConfiguration();
        $configuration['record'] = VRPages::with('translations')->find($id)->toArray();
        return view('front-end.single', $configuration);

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
