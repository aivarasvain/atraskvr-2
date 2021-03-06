<?php

use App\Models\VRLanguages;
use Illuminate\Database\Seeder;

class LanguagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [
            ["id" => "lt", "name" => "Lithuanian", "language_code" => "lt"],
            ["id" => "en", "name" => "English", "language_code" => "en"]
        ];
        DB::beginTransaction();
        try {
            foreach ($list as $single) {
                $record = VRLanguages::find($single['id']);
                if(!$record) {
                    VRLanguages::create($single);
                }
            }
        } catch(Exception $e) {
            DB::rollback();
            throw new Exception($e);
        }
        DB::commit();
    }
}
