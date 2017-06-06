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
            ["id" => "menu", "parent_id" => ""],
            ["id" => "apie", "parent_id" => "menu"],
            ["id" => "kambariai", "parent_id" => "menu"],
            ["id" => "vieta", "parent_id" => "menu"],
            ["id" => "bilietai", "parent_id" => "menu"],
            ["id" => "remejai", "parent_id" => "menu"],
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
