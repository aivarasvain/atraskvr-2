<?php

use App\Models\VRPages;
use Illuminate\Database\Seeder;

class PagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [
            ["id" => "aboutpage", "category_id" => "apie", "google_map" => "no map", "image_id" => "no img", "video_url" => "no video"],
            ["id" => "thelab", "category_id" => "kambariai", "google_map" => "no map", "image_id" => "no img", "video_url" => "no video"],
            ["id" => "samsung_irklavimas", "category_id" => "kambariai", "google_map" => "no map", "image_id" => "no img", "video_url" => "no video"],
            ["id" => "fruit_ninja", "category_id" => "kambariai", "google_map" => "no map", "image_id" => "no img", "video_url" => "no video"],
            ["id" => "ktu_parasparnis", "category_id" => "kambariai", "google_map" => "no map", "image_id" => "no img", "video_url" => "no video"],
            ["id" => "space_pirate_trainer", "category_id" => "kambariai", "google_map" => "no map", "image_id" => "no img", "video_url" => "no video"],
            ["id" => "hurl", "category_id" => "kambariai", "google_map" => "no map", "image_id" => "no img", "video_url" => "no video"],
            ["id" => "tilt_brush", "category_id" => "kambariai", "google_map" => "no map", "image_id" => "no img", "video_url" => "no video"],
            ["id" => "final_goalie", "category_id" => "kambariai", "google_map" => "no map", "image_id" => "no img", "video_url" => "no video"],
            ["id" => "merry_snowballs", "category_id" => "kambariai", "google_map" => "no map", "image_id" => "no img", "video_url" => "no video"],
            ["id" => "project_cars", "category_id" => "kambariai", "google_map" => "no map", "image_id" => "no img", "video_url" => "no video"],
            ["id" => "vietapage", "category_id" => "vieta", "google_map" => "no map", "image_id" => "no img", "video_url" => "no video"],


        ];

        DB::beginTransaction();
        try {
            foreach ($list as $single) {
                $record = VRPages::find($single['id']);
                if(!$record) {
                    VRPages::create($single);
                }
            }
        } catch(Exception $e) {
            DB::rollback();
            throw new Exception($e);
        }
        DB::commit();
    }
}
