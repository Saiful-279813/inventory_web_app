<?php

namespace Database\Seeders;

use App\Models\Division;
use Illuminate\Database\Seeder;

class DivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Division::insert([
            [
                "id"=> 1,
                "name_en"=> "Dhaka",
                "name_bn"=> "ঢাকা"
            ],
            [
                "id"=> 2,
                "name_en"=> "Chittagong",
                "name_bn"=> "চট্টগ্রাম"
            ],
            [
                "id"=> 3,
                "name_en"=> "Rajshahi",
                "name_bn"=> "রাজশাহী"
            ],
            [
                "id"=> 4,
                "name_en"=> "Khulna",
                "name_bn"=> "খুলনা"
            ],
            [
                "id"=> 5,
                "name_en"=> "Barisal",
                "name_bn"=> "বরিশাল"
            ],
            [
                "id"=> 6,
                "name_en"=> "Rangpur",
                "name_bn"=> "রংপুর"
            ],
            [
                "id"=> 7,
                "name_en"=> "Sylhet",
                "name_bn"=> "সিলেট"
            ],
            [
                "id"=> 8,
                "name_en"=> "Mymensingh",
                "name_bn"=> "ময়মনসিংহ"
            ],
        ]);
    }
}
