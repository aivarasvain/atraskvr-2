<?php

namespace App\Http\Controllers;

use App\Models\VRCategories;
use App\Models\VRCategoriesTranslations;
use App\Models\VRLanguages;
use Illuminate\Http\Request;

class VRCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function adminIndex()
    {
        $dataFromModel = new VRCategories();

        $configuration['list'] = VRCategoriesTranslations::get()->toArray();
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

        $dataFromModel = new VRCategories();
        $dataFromModel2 = new VRCategoriesTranslations();

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
    public function adminStore(Request $request)
    {
        $data = request()->all();

        $category = VRCategories::create([

            'parent_id' => $data['parent_id']

        ]);

        VRCategoriesTranslations::create([

            'category_id' => $category['id'],
            'language_id' => $data['language_id'],
            'name'        => $data['name'],
            'slug'        => $data['slug']

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
        $dataFromModel = new VRCategories();
        $configuration['tableName'] = $dataFromModel->getTableName();

        $configuration['record'] = VRCategoriesTranslations::find($id)->toArray();

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
        $dataFromModel = new VRCategories();
        $dataFromModel2 = new VRCategoriesTranslations();

        $categoriesFillables = $dataFromModel->getFillables();
        $categoriesTranslationsFillables = $dataFromModel2->getFillables();

        $fields = array_merge($categoriesFillables, $categoriesTranslationsFillables);


        $configuration['fields'] = $fields;
        $configuration['categories'] = VRCategories::get()->toArray();
        $configuration['record'] = VRCategoriesTranslations::where('id', $id)->with('parentcategory')->first()->toArray();
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
        $record = VRCategoriesTranslations::find($id);
        $categoryId = VRCategoriesTranslations::where('id', $id)->select('category_id')->get()->toArray();
        $record1 = VRCategories::where('id', $categoryId[0]['category_id'])->get();





        $data = request()->all();
        $record1->update([
            'parent_id' => $data['parent_id'],
        ]);
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
