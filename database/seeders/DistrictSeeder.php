<?php

namespace Database\Seeders;

use App\Models\District;
use Illuminate\Database\Seeder;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        District::insert([
            [
                "id"=> 1,
                "division_id"=> 1,
                "name_en"=> "Narsingdi",
                "name_bn"=> "নরসিংদী"
            ],
            [
                "id"=> 2,
                "division_id"=> 1,
                "name_en"=> "Gazipur",
                "name_bn"=> "গাজীপুর"
            ],
            [
                "id"=> 3,
                "division_id"=> 1,
                "name_en"=> "Shariatpur",
                "name_bn"=> "শরীয়তপুর"
            ],
            [
                "id"=> 4,
                "division_id"=> 1,
                "name_en"=> "Narayanganj",
                "name_bn"=> "নারায়ণগঞ্জ"
            ],
            [
                "id"=> 5,
                "division_id"=> 1,
                "name_en"=> "Tangail",
                "name_bn"=> "টাঙ্গাইল"
            ],
            [
                "id"=> 6,
                "division_id"=> 1,
                "name_en"=> "Kishoreganj",
                "name_bn"=> "কিশোরগঞ্জ"
            ],
            [
                "id"=> 7,
                "division_id"=> 1,
                "name_en"=> "Manikganj",
                "name_bn"=> "মানিকগঞ্জ"
            ],
            [
                "id"=> 8,
                "division_id"=> 1,
                "name_en"=> "Dhaka",
                "name_bn"=> "ঢাকা"
            ],
            [
                "id"=> 9,
                "division_id"=> 1,
                "name_en"=> "Munshiganj",
                "name_bn"=> "মুন্সিগঞ্জ"
            ],
            [
                "id"=> 10,
                "division_id"=> 1,
                "name_en"=> "Rajbari",
                "name_bn"=> "রাজবাড়ী"
            ],
            [
                "id"=> 11,
                "division_id"=> 1,
                "name_en"=> "Madaripur",
                "name_bn"=> "মাদারীপুর"
            ],
            [
                "id"=> 12,
                "division_id"=> 1,
                "name_en"=> "Gopalganj",
                "name_bn"=> "গোপালগঞ্জ"
            ],
            [
                "id"=> 13,
                "division_id"=> 1,
                "name_en"=> "Faridpur",
                "name_bn"=> "ফরিদপুর"
            ],
            [
                "id"=> 14,
                "division_id"=> 2,
                "name_en"=> "Comilla",
                "name_bn"=> "কুমিল্লা"
            ],
            [
                "id"=> 15,
                "division_id"=> 2,
                "name_en"=> "Feni",
                "name_bn"=> "ফেনী"
            ],
            [
                "id"=> 16,
                "division_id"=> 2,
                "name_en"=> "Brahmanbaria",
                "name_bn"=> "ব্রাহ্মণবাড়িয়া"
            ],
            [
                "id"=> 17,
                "division_id"=> 2,
                "name_en"=> "Rangamati",
                "name_bn"=> "রাঙ্গামাটি"
            ],
            [
                "id"=> 18,
                "division_id"=> 2,
                "name_en"=> "Noakhali",
                "name_bn"=> "নোয়াখালী"
            ],
            [
                "id"=> 19,
                "division_id"=> 2,
                "name_en"=> "Chandpur",
                "name_bn"=> "চাঁদপুর"
            ],
            [
                "id"=> 20,
                "division_id"=> 2,
                "name_en"=> "Lakshmipur",
                "name_bn"=> "লক্ষ্মীপুর"
            ],
            [
                "id"=> 21,
                "division_id"=> 2,
                "name_en"=> "Chittagong",
                "name_bn"=> "চট্টগ্রাম"
            ],
            [
                "id"=> 22,
                "division_id"=> 2,
                "name_en"=> "Coxsbazar",
                "name_bn"=> "কক্সবাজার"
            ],
            [
                "id"=> 23,
                "division_id"=> 2,
                "name_en"=> "Khagrachhari",
                "name_bn"=> "খাগড়াছড়ি"
            ],
            [
                "id"=> 24,
                "division_id"=> 2,
                "name_en"=> "Bandarban",
                "name_bn"=> "বান্দরবান"
            ],
            [
                "id"=> 25,
                "division_id"=> 3,
                "name_en"=> "Sirajganj",
                "name_bn"=> "সিরাজগঞ্জ"
            ],
            [
                "id"=> 26,
                "division_id"=> 3,
                "name_en"=> "Pabna",
                "name_bn"=> "পাবনা"
            ],
            [
                "id"=> 27,
                "division_id"=> 3,
                "name_en"=> "Bogra",
                "name_bn"=> "বগুড়া"
            ],
            [
                "id"=> 28,
                "division_id"=> 3,
                "name_en"=> "Rajshahi",
                "name_bn"=> "রাজশাহী"
            ],
            [
                "id"=> 29,
                "division_id"=> 3,
                "name_en"=> "Natore",
                "name_bn"=> "নাটোর"
            ],
            [
                "id"=> 30,
                "division_id"=> 3,
                "name_en"=> "Joypurhat",
                "name_bn"=> "জয়পুরহাট"
            ],
            [
                "id"=> 31,
                "division_id"=> 3,
                "name_en"=> "Chapainawabganj",
                "name_bn"=> "চাঁপাইনবাবগঞ্জ"
            ],
            [
                "id"=> 32,
                "division_id"=> 3,
                "name_en"=> "Naogaon",
                "name_bn"=> "নওগাঁ"
            ],
            [
                "id"=> 33,
                "division_id"=> 4,
                "name_en"=> "Jessore",
                "name_bn"=> "যশোর"
            ],
            [
                "id"=> 34,
                "division_id"=> 4,
                "name_en"=> "Satkhira",
                "name_bn"=> "সাতক্ষীরা"
            ],
            [
                "id"=> 35,
                "division_id"=> 4,
                "name_en"=> "Meherpur",
                "name_bn"=> "মেহেরপুর"
            ],
            [
                "id"=> 36,
                "division_id"=> 4,
                "name_en"=> "Narail",
                "name_bn"=> "নড়াইল"
            ],
            [
                "id"=> 37,
                "division_id"=> 4,
                "name_en"=> "Chuadanga",
                "name_bn"=> "চুয়াডাঙ্গা"
            ],
            [
                "id"=> 38,
                "division_id"=> 4,
                "name_en"=> "Kushtia",
                "name_bn"=> "কুষ্টিয়া"
            ],
            [
                "id"=> 39,
                "division_id"=> 4,
                "name_en"=> "Magura",
                "name_bn"=> "মাগুরা"
            ],
            [
                "id"=> 40,
                "division_id"=> 4,
                "name_en"=> "Khulna",
                "name_bn"=> "খুলনা"
            ],
            [
                "id"=> 41,
                "division_id"=> 4,
                "name_en"=> "Bagerhat",
                "name_bn"=> "বাগেরহাট"
            ],
            [
                "id"=> 42,
                "division_id"=> 4,
                "name_en"=> "Jhenaidah",
                "name_bn"=> "ঝিনাইদহ"
            ],
            [
                "id"=> 43,
                "division_id"=> 5,
                "name_en"=> "Jhalakathi",
                "name_bn"=> "ঝালকাঠি"
            ],
            [
                "id"=> 44,
                "division_id"=> 5,
                "name_en"=> "Patuakhali",
                "name_bn"=> "পটুয়াখালী"
            ],
            [
                "id"=> 45,
                "division_id"=> 5,
                "name_en"=> "Pirojpur",
                "name_bn"=> "পিরোজপুর"
            ],
            [
                "id"=> 46,
                "division_id"=> 5,
                "name_en"=> "Barisal",
                "name_bn"=> "বরিশাল"
            ],
            [
                "id"=> 47,
                "division_id"=> 5,
                "name_en"=> "Bhola",
                "name_bn"=> "ভোলা"
            ],
            [
                "id"=> 48,
                "division_id"=> 5,
                "name_en"=> "Barguna",
                "name_bn"=> "বরগুনা"
            ],
            [
                "id"=> 49,
                "division_id"=> 6,
                "name_en"=> "Panchagarh",
                "name_bn"=> "পঞ্চগড়"
            ],
            [
                "id"=> 50,
                "division_id"=> 6,
                "name_en"=> "Dinajpur",
                "name_bn"=> "দিনাজপুর"
            ],
            [
                "id"=> 51,
                "division_id"=> 6,
                "name_en"=> "Lalmonirhat",
                "name_bn"=> "লালমনিরহাট"
            ],
            [
                "id"=> 52,
                "division_id"=> 6,
                "name_en"=> "Nilphamari",
                "name_bn"=> "নীলফামারী"
            ],
            [
                "id"=> 53,
                "division_id"=> 6,
                "name_en"=> "Gaibandha",
                "name_bn"=> "গাইবান্ধা"
            ],
            [
                "id"=> 54,
                "division_id"=> 6,
                "name_en"=> "Thakurgaon",
                "name_bn"=> "ঠাকুরগাঁও"
            ],
            [
                "id"=> 55,
                "division_id"=> 6,
                "name_en"=> "Rangpur",
                "name_bn"=> "রংপুর"
            ],
            [
                "id"=> 56,
                "division_id"=> 6,
                "name_en"=> "Kurigram",
                "name_bn"=> "কুড়িগ্রাম"
            ],
            [
                "id"=> 57,
                "division_id"=> 7,
                "name_en"=> "Sylhet",
                "name_bn"=> "সিলেট"
            ],
            [
                "id"=> 58,
                "division_id"=> 7,
                "name_en"=> "Moulvibazar",
                "name_bn"=> "মৌলভীবাজার"
            ],
            [
                "id"=> 59,
                "division_id"=> 7,
                "name_en"=> "Habiganj",
                "name_bn"=> "হবিগঞ্জ"
            ],
            [
                "id"=> 60,
                "division_id"=> 7,
                "name_en"=> "Sunamganj",
                "name_bn"=> "সুনামগঞ্জ"
            ],
            [
                "id"=> 61,
                "division_id"=> 8,
                "name_en"=> "Sherpur",
                "name_bn"=> "শেরপুর"
            ],
            [
                "id"=> 62,
                "division_id"=> 8,
                "name_en"=> "Mymensingh",
                "name_bn"=> "ময়মনসিংহ"
            ],
            [
                "id"=> 63,
                "division_id"=> 8,
                "name_en"=> "Jamalpur",
                "name_bn"=> "জামালপুর"
            ],
            [
                "id"=> 64,
                "division_id"=> 8,
                "name_en"=> "Netrokona",
                "name_bn"=> "নেত্রকোণা"
            ],
        ]);
    }
}
