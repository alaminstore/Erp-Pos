<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $company = [
            [
                "name" => "Demo Company",
                "address" => "Demo address",
                "responsible_person" => "Demo User",
                "phone_no" => "98234545",
            ],
        ];
        DB::table('companies')->truncate();
        DB::table('companies')->insert($company);
    }
}
