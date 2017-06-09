<?php

namespace App\Http\Controllers;

use App\Models\VRCategories;
use App\Models\VRLanguages;
use App\Models\VRPages;
use App\Models\VRPagesResourcesConnections;
use App\Models\VRPagesTranslations;
use App\Models\VRResources;
use Illuminate\Http\Request;
use Validator;

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

        $data = request()->all();

        $resource = request()->file('image');

        $this->validate($request, [
            'title' => 'required',

        ]);


        $newDTResourcesController = new UploadController();
        $record = $newDTResourcesController->upload($resource);

        $title = $data['title'];

        $data['slug']= str_slug($title, '-');


        $page = VRPages::create([

            'category_id' => $data['category_id'],
            'google_map'  => $data['google_map'],
            'image_id'    => $record->id,
            'video_url'   => $data['video_url'],

        ]);

        VRPagesTranslations::create([

            'page_id'           => $page['id'],
            'language_id'       => $data['language_id'],
            'title'             => $data['title'],
            'description_short' => $data['description_short'],
            'description_long'  => $data['description_long'],
            'slug'              => $data['slug']

        ]);


        VRPagesResourcesConnections::create([

            'page_id'       => $page['id'],
            'resource_id'   => $record->id

        ]);



        return redirect()->route('admin.pages.create')->with('success', 'Record added');



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
        $configuration['record'] = VRPagesTranslations::where('id', $id)->with('parentpage')->first()->toArray();
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
    public function adminUpdate(Request $request, $id)
    {

        $data = request()->all();

        $singlePageTranslation = VRPagesTranslations::find($id);

        $pageId = VRPagesTranslations::where('id', $id)->select('page_id')->get()->toArray();

        $singlePage = VRPages::find($pageId[0]['page_id']);

        $resource = request()->file('image');

        $newDTResourcesController = new UploadController();
        $image = $newDTResourcesController->upload($resource);


        $this->validate($request, [

            'title' => 'required'

        ]);


        $title = $data['title'];

        $data['slug'] = str_slug($title, '-');


        if($singlePageTranslation['language_id'] == $data['language_id']) {


            $singlePage->update([

                'category_id' => $data['category_id'],
                'google_map'  => $data['google_map'],
                'image_id'    => $image->id,
                'video_url'   => $data['video_url']

            ]);

            $singlePageTranslation->update([

                'language_id'         => $data['language_id'],
                'title'               => $data['title'],
                'description_short'   => $data['description_short'],
                'description_long'    => $data['description_long'],
                'slug'                => $data['slug']

            ]);

        } else {


            $singlePageTranslation->create([

                'page_id'             => $singlePage['id'],
                'language_id'         => $data['language_id'],
                'title'               => $data['title'],
                'description_short'   => $data['description_short'],
                'description_long'    => $data['description_long'],
                'slug'                => $data['slug']

            ]);

        }

        return redirect()->route('admin.pages.edit', $id)->with('success', 'Record added');


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
