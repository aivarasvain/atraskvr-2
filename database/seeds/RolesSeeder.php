<?php

use App\Models\VRRoles;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [
            ["name" => "Super Admin", "id" => "super-admin"], // Manage everything
            ["name" => "Member", "id" => "member"], // Special user access
            ["name" => "User", "id" => "user"], // Average Joe
        ];
        DB::beginTransaction();
        try {
            foreach ($list as $single) {
                $record = VRRoles::find($single['id']);
                if(!$record) {
                    VRRoles::create($single);
                }
            }
        } catch(Exception $e) {
            DB::rollback();
            throw new Exception($e);
        }
        DB::commit();
    }
}
