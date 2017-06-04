<?php

use App\Models\VRCategories;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [
            ["id" => "apie"],
            ["id" => "kambariai"],
            ["id" => "vieta"],
            ["id" => "bilietai"],
            ["id" => "remejai"],
        ];

        DB::beginTransaction();
        try {
            foreach ($list as $single) {
                $record = VRCategories::find($single['id']);
                if(!$record) {
                    VRCategories::create($single);
                }
            }
        } catch(Exception $e) {
            DB::rollback();
            throw new Exception($e);
        }
        DB::commit();
    }
}
