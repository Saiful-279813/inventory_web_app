<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Division;
use App\Models\Upazila;
use Illuminate\Http\Request;

class GEOController extends Controller
{
    /* ================ division list ================ */
    public function divisionList(){
        try {
            $divisions = Division::orderBy('name_en','ASC')->get();
            return send_single_data('divisions',$divisions,true);
        } catch (\Throwable $th) {
            return send_ms($th->getMessage(),false);
        }
    }

    /* ================ district list ================ */
    public function districtList(){
        try {
            $districts = District::orderBy('name_en','ASC')->get();
            return send_single_data('districts',$districts,true);
        } catch (\Throwable $th) {
            return send_ms($th->getMessage(),false);
        }
    }

    /* ================ upazila list ================ */
    public function upazilaList(){
        try {
            $upazilas = Upazila::orderBy('name_en','ASC')->get();
            return send_single_data('upazilas',$upazilas,true);
        } catch (\Throwable $th) {
            return send_ms($th->getMessage(),false);
        }
    }

    /* ================ division Wise District ================ */
    public function divisionWiseDistrictList($id){
        try {
            $districts = District::where('division_id',$id)->orderBy('name_en','ASC')->get();
            return send_single_data('districts',$districts,true);
        } catch (\Throwable $th) {
            return send_ms($th->getMessage(),false);
        }
    }

    /* ================ district Wise upazila ================ */
    public function districtWiseUpazilaList($id){
        try {
            $upazilas = Upazila::where('district_id',$id)->orderBy('name_en','ASC')->get();
            return send_single_data('upazilas',$upazilas,true);
        } catch (\Throwable $th) {
            return send_ms($th->getMessage(),false);
        }
    }


}
