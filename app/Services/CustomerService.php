<?php

namespace App\Services;

use App\Models\Customer;

/**
 * Class CustomerService
 * @package App\Services
 */
class CustomerService
{
    public function index($data)
    {
        try {
            if(!empty($data->search)){
                $customer_list = Customer::where('status','active')
                        ->where('phone', 'like', '%' . $data->search . '%')
                        ->select('id','name_en','trade_name_en','address','photo_path','status','create_by_id','update_by_id')
                        ->paginate($data->perPage);
            }
            else{
                $customer_list = Customer::where('status','active')
                        ->select('id','name_en','trade_name_en','address','photo_path','status','create_by_id','update_by_id')
                        ->paginate($data->perPage);
            }
            return send_single_data('customer_list',$customer_list,true);
        } catch (\Throwable $th) {
            return send_ms($th->getMessage(),false);
        }
    }
}
