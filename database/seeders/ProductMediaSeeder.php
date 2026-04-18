<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductMediaSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('product_media')->insert([
            ['product_id' => 1, 'image' => '1_Wiring_Harness_Kit.png', 'created_at' => now(), 'updated_at' => now()],
            ['product_id' => 2, 'image' => '2_LED_Headlamp.png', 'created_at' => now(), 'updated_at' => now()],
            ['product_id' => 3, 'image' => '3_Car_Dashboard_Panel.png', 'created_at' => now(), 'updated_at' => now()],
            ['product_id' => 4, 'image' => '4_Rear_View_Mirror.png', 'created_at' => now(), 'updated_at' => now()],
            ['product_id' => 5, 'image' => '5_Gearbox_Assembly.png', 'created_at' => now(), 'updated_at' => now()],
            ['product_id' => 6, 'image' => '6_Engine_Mount.png', 'created_at' => now(), 'updated_at' => now()],
            ['product_id' => 7, 'image' => '7_Tail_Light_Unit.png', 'created_at' => now(), 'updated_at' => now()],
            ['product_id' => 8, 'image' => '8_Plastic_Bumper.png', 'created_at' => now(), 'updated_at' => now()],
            ['product_id' => 9, 'image' => '9_Side_Mirror_Assembly.png', 'created_at' => now(), 'updated_at' => now()],
            ['product_id' => 10, 'image' => '10_Instrument_Cluster.png', 'created_at' => now(), 'updated_at' => now()],
            ['product_id' => 11, 'image' => '11_Chassis_Frame.png', 'created_at' => now(), 'updated_at' => now()],
            ['product_id' => 12, 'image' => '12_Brake_Disc.png', 'created_at' => now(), 'updated_at' => now()],
            ['product_id' => 13, 'image' => '13_Fuel_Tank.png', 'created_at' => now(), 'updated_at' => now()],
            ['product_id' => 14, 'image' => '14_Steering_Wheel.png', 'created_at' => now(), 'updated_at' => now()],
            ['product_id' => 15, 'image' => '15_Clutch_Plate.png', 'created_at' => now(), 'updated_at' => now()],
            ['product_id' => 16, 'image' => '16_Door_Panel.png', 'created_at' => now(), 'updated_at' => now()],
            ['product_id' => 17, 'image' => '17_Battery_Cable_Set.png', 'created_at' => now(), 'updated_at' => now()],
            ['product_id' => 18, 'image' => '18_Fog_Lamp.png', 'created_at' => now(), 'updated_at' => now()],
            ['product_id' => 19, 'image' => '19_Axle_Shaft.png', 'created_at' => now(), 'updated_at' => now()],
            ['product_id' => 20, 'image' => '20_Metal_Bracket.png', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
