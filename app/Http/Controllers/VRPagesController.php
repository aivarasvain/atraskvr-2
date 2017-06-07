<?php

namespace App\Http\Controllers;

use App\Models\VRCategories;
use App\Models\VRLanguages;
use App\Models\VRPages;
use App\Models\VRPagesTranslations;
use Illuminate\Http\Request;

class VRPagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function adminIndex()
    {
        $dataFromModel = new VRPages();

        $configuration['list'] = VRPagesTranslations::with('parentpage')->get()->toArray();
        $configuration['tableName'] = $dataFromModel->getTableName();

        return view('admin.list', $configuration);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function adminCreate()
    {

        /**
         * Merges fillables arrays from VRCategories and VRCategoriesTranslations models
         */

        $dataFromModel = new VRPages();
        $dataFromModel2 = new VRPagesTranslations();

        $categoriesFillables = $dataFromModel->getFillables();
        $categoriesTranslationsFillables = $dataFromModel2->getFillables();

        $fields = array_merge($categoriesFillables, $categoriesTranslationsFillables);

        /** -------------------- */




        $configuration['tableName'] = $dataFromModel->getTableName();
        $configuration['fields'] = $fields;
        $configuration['languages'] = VRLanguages::get()->toArray();
        $configuration['categories'] = VRCategories::get()->toArray();

        return view('admin.create', $configuration);
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
        //
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
