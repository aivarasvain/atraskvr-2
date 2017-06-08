<?php

namespace App\Http\Controllers;

use App\Models\VRLanguages;
use Illuminate\Http\Request;
use Validator;

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

        $this->validate($request, [
            'language_code' => 'required|max:2|unique:vr_languages,language_code',
            'name' => 'required',
        ]);

        VRLanguages::create([
            'id'            => $data['language_code'],
            'language_code' => $data['language_code'],
            'name'          => $data['name']
        ]);


        return redirect()->route('admin.languages.create')->with('success', 'Record added');





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

        $this->validate($request, [
            'language_code' => 'required|max:2',
            'name' => 'required|max:13',
        ]);

        $record->update($data);


        return redirect()->route('admin.languages.edit', $id)->with('success', 'Record added');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function adminDestroy($id)
    {


        if (VRLanguages::destroy($id))
        {
            return json_encode(["success" => true, "id" => $id]);
        }
    }
}
