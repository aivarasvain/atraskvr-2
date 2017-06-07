<?php

use App\Models\VRCategoriesTranslations;
use Illuminate\Database\Seeder;

class CategoriesTranslationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [
            ["id" => "apie_lt","category_id" => "apie", "language_id" => "lt", "name" => "Apie", "slug" => "apie"],
            ["id" => "apie_en","category_id" => "apie", "language_id" => "en", "name" => "About", "slug" => "about"],
            ["id" => "kambariai_lt","category_id" => "kambariai", "language_id" => "lt", "name" => "Virtualūs kambariai", "slug" => "vrkambariai"],
            ["id" => "kambariai_en","category_id" => "kambariai", "language_id" => "en", "name" => "Virtual rooms", "slug" => "vrrooms"],
            ["id" => "vieta_lt","category_id" => "vieta", "language_id" => "lt", "name" => "Vieta ir laikas", "slug" => "vietairlaikas"],
            ["id" => "vieta_en","category_id" => "vieta", "language_id" => "en", "name" => "Place and time", "slug" => "placeandtime"],
            ["id" => "bilietai_lt","category_id" => "bilietai", "language_id" => "lt", "name" => "Bilietai", "slug" => "bilietai"],
            ["id" => "bilietai_en","category_id" => "bilietai", "language_id" => "en", "name" => "Tickets", "slug" => "tickets"],
            ["id" => "remejai_lt","category_id" => "remejai", "language_id" => "lt", "name" => "Rėmėjai", "slug" => "remejai"],
            ["id" => "remejai_en","category_id" => "remejai", "language_id" => "en", "name" => "Sponsors", "slug" => "sponsors"],

        ];

        DB::beginTransaction();
        try {
            foreach ($list as $single) {
                $record = VRCategoriesTranslations::find($single['id']);
                if(!$record) {
                    VRCategoriesTranslations::create($single);
                }
            }
        } catch(Exception $e) {
            DB::rollback();
            throw new Exception($e);
        }
        DB::commit();
    }
}
