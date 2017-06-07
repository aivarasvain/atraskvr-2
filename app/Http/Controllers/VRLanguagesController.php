<?php

namespace App\Http\Controllers;

use App\Models\VRLanguages;
use Illuminate\Http\Request;

class VRLanguagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function adminIndex()
    {

        $dataFromModel = new VRLanguages();

        $configuration['list'] = VRLanguages::get()->toArray();
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
        $dataFromModel = new VRLanguages();
        $configuration['tableName'] = $dataFromModel->getTableName();
        $configuration['fields'] = $dataFromModel->getFillables();


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

        VRLanguages::create([

            'id'            => $data['language_code'],
            'language_code' => $data['language_code'],
            'name'          => $data['name']

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
        $dataFromModel = new VRLanguages();
        $configuration['tableName'] = $dataFromModel->getTableName();

        $configuration['record'] = VRLanguages::find($id)->toArray();

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
        $dataFromModel = new VRLanguages();
        $configuration['record'] = VRLanguages::find($id);
        $configuration['tableName'] = $dataFromModel->getTableName();
        $configuration['fields'] = $dataFromModel->getFillables();


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
        $record = VRLanguages::find($id);
        $data = request()->all();
        $record->update($data);
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
