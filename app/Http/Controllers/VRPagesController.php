<?php

namespace App\Http\Controllers;

use App\Models\VRCategories;
use App\Models\VRLanguages;
use App\Models\VRPages;
use App\Models\VRPagesResourcesConnections;
use App\Models\VRPagesTranslations;
use App\Models\VRResources;
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
        $configuration['resources']  = VRResources::pluck('path', 'id');

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


        /**
         * values that will be passed to blade
         */
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
    public function adminStore(Request $request)
    {
        /**
         * Gets all data from form
         */
        $data = request()->all();


        /**
         * Get uploaded image
         */
        $resource = request()->file('image');


        /**
         * Uploads image
         */
        $newDTResourcesController = new UploadController();
        $record = $newDTResourcesController->upload($resource);


        /**
         * Creating new record in vr_pages table
         */
        $page = VRPages::create([

            'category_id' => $data['category_id'],
            'google_map'  => $data['google_map'],
            'image_id'    => $record->id,
            'video_url'   => $data['video_url'],

        ]);


        /**
         * Creating new record in vr_pages_translations table
         */
        VRPagesTranslations::create([

            'page_id'           => $page['id'],
            'language_id'       => $data['language_id'],
            'title'             => $data['title'],
            'description_short' => $data['description_short'],
            'description_long'  => $data['description_long'],
            'slug'              => $data['slug']


        ]);


        /**
         * Creating new record in vr_pages_recources_connection table
         */
        VRPagesResourcesConnections::create([

            'page_id'       => $page['id'],
            'resource_id'   => $record->id

        ]);



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function adminShow($id)
    {
        $dataFromModel = new VRPages();
        $configuration['tableName'] = $dataFromModel->getTableName();

        $configuration['record'] = VRPagesTranslations::find($id)->toArray();

        return view('admin.single', $configuration);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function adminEdit($id)
    {

        $dataFromModel = new VRPages();
        $dataFromModel2 = new VRPagesTranslations();

        $categoriesFillables = $dataFromModel->getFillables();
        $categoriesTranslationsFillables = $dataFromModel2->getFillables();

        $fields = array_merge($categoriesFillables, $categoriesTranslationsFillables);

        $configuration['fields'] = $fields;
        $configuration['categories'] = VRCategories::get()->toArray();
        $configuration['record'] = VRPagesTranslations::find($id);
        $configuration['tableName'] = $dataFromModel->getTableName();
        $configuration['languages'] = VRLanguages::get()->toArray();



        return view('admin.edit', $configuration);
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
//        $record = DTPizzas::find($id);
//        $data = request()->all();
//        $record->update($data);
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
