<?php

namespace App\Services;

use App\Models\Category;

/**
 * Class CategoryService
 * @package App\Services
 */
class CategoryService
{
    public function index(){
        try {
            $items = Category::orderBy('id','DESC')->get();
            return send_single_data('items',$items,true);
        } catch (\Throwable $th) {
            return send_ms($th->getMessage(),false);
        }
    }

    public function show($id){
        try {
            $item = Category::findOrFail($id);
            return send_single_data('item',$item,true);
        } catch (\Throwable $th) {
            return send_ms($th->getMessage(),false);
        }
    }

    public function store($data){
        try {
            $data['create_by_id'] = admin_id();
            Category::create($data);
            return send_ms('Successfully Added new Item',true);
        } catch (\Throwable $th) {
            return send_ms($th->getMessage(),false);
        }
    }


    public function update($data,$id){
        $item = Category::findOrFail($id);
        try {
            $data['create_by_id'] = admin_id();
            $item->update($data);
            return send_ms('Successfully Updated Item',true);
        } catch (\Throwable $th) {
            return send_ms($th->getMessage(),false);
        }
    }

    public function activeInactive($id){
        $item = Category::findOrFail($id);
        try {
            $item->status = $item->status == 'active' ? 'inactive' : 'active';
            $item->create_by_id = admin_id();
            $item->save();
            return send_ms('Successfully Updated Category',true);
        } catch (\Throwable $th) {
            return send_ms($th->getMessage(),false);
        }
    }
}
