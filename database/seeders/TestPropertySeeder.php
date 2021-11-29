<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestPropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $test_properties = [
            [
                'name' => 'Colorfastness to washing',
                'type' => 'COLOR FASTNESS TEST',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Colorfastness to Water',
                'type' => 'COLOR FASTNESS TEST',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Colorfastness to Perspiration',
                'type' => 'COLOR FASTNESS TEST',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Colorfastness to Saliva',
                'type' => 'COLOR FASTNESS TEST',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Colorfastness to Phenolic yellowing',
                'type' => 'COLOR FASTNESS TEST',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Colorfastness to Crocking / Rubbing',
                'type' => 'COLOR FASTNESS TEST',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Colorfastness to Light',
                'type' => 'COLOR FASTNESS TEST',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Fabric weight',
                'type' => 'PHYSICAL TEST',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Pilling Resistance',
                'type' => 'PHYSICAL TEST',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Abrasion Resistance',
                'type' => 'PHYSICAL TEST',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Bursting strength test',
                'type' => 'PHYSICAL TEST',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Pull Test',
                'type' => 'PHYSICAL TEST',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Stitch Recovery',
                'type' => 'PHYSICAL TEST',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Yarn CSP',
                'type' => 'YARN',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Yarn Count',
                'type' => 'YARN',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Yarn TPI',
                'type' => 'YARN',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Tear Strength',
                'type' => 'YARN',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Tensile Strength',
                'type' => 'YARN',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Seam Slippage',
                'type' => 'YARN',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Yarn Strength',
                'type' => 'YARN',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => '1 wish',
                'type' => 'DIMENSIONAL STABILITY TO WASHING',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => '2 wash',
                'type' => 'DIMENSIONAL STABILITY TO WASHING',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => '3 wash',
                'type' => 'DIMENSIONAL STABILITY TO WASHING',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => '5 wash',
                'type' => 'DIMENSIONAL STABILITY TO WASHING',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Dimensional Stability',
                'type' => 'DIMENSIONAL STABILITY TO WASHING',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Appearance after wash',
                'type' => 'DIMENSIONAL STABILITY TO WASHING',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Twisting /Spirality',
                'type' => 'DIMENSIONAL STABILITY TO WASHING',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Print durability',
                'type' => 'DIMENSIONAL STABILITY TO WASHING',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Cross Staining',
                'type' => 'DIMENSIONAL STABILITY TO WASHING',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'FiberComposition Directive 96/73/EC',
                'type' => 'CHEMICAL TEST',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Nickel Test(Spot Test)',
                'type' => 'CHEMICAL TEST',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'pH',
                'type' => 'CHEMICAL TEST',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ];
        DB::table('test_properties')->truncate();
        DB::table('test_properties')->insert($test_properties);
    }
}
