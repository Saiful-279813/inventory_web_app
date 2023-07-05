<?php

namespace App\Services;

use App\Models\Brand;

/**
 * Class BrandService
 * @package App\Services
 */
class BrandService
{
    public function index()
    {
        try {
            $items = Brand::with('category')->where('status', 'active')->orderBy('id', 'DESC')->get();
            return send_single_data('items', $items, true);
        } catch (\Throwable $th) {
            return send_ms($th->getMessage(), false);
        }
    }

    public function show($id)
    {
        try {
            $item = Brand::findOrFail($id);
            return send_single_data('item', $item, true);
        } catch (\Throwable $th) {
            return send_ms($th->getMessage(), false);
        }
    }

    public function store($data)
    {
        try {
            $data['create_by_id'] = admin_id();
            Brand::create($data);
            return send_ms('Successfully Added new Item', true);
        } catch (\Throwable $th) {
            return send_ms($th->getMessage(), false);
        }
    }


    public function update($data, $id)
    {
        $item = Brand::findOrFail($id);
        try {
            $data['update_by_id'] = admin_id();
            $item->update($data);
            return send_ms('Successfully Updated Item', true);
        } catch (\Throwable $th) {
            return send_ms($th->getMessage(), false);
        }
    }

    public function activeInactive($id)
    {
        $item = Brand::findOrFail($id);
        try {
            $item->status = $item->status == 'active' ? 'inactive' : 'active';
            $item->create_by_id = admin_id();
            $item->save();
            return send_ms('Successfully Change Status', true);
        } catch (\Throwable $th) {
            return send_ms($th->getMessage(), false);
        }
    }

    public function destroy($id)
    {
        $item = Brand::findOrFail($id);
        try {
            $item->status = 'delete';
            $item->update_by_id = admin_id();
            $item->save();
            return send_ms('Successfully Deleted Item', true);
        } catch (\Throwable $th) {
            return send_ms($th->getMessage(), false);
        }
    }

    public function brandList()
    {
        try {
            $brand_list = Brand::where('status', 'active')->select('id', 'name_en', 'name_bn')->orderBy('id', 'DESC')->get();
            return send_single_data('brand_list', $brand_list, true);
        } catch (\Throwable $th) {
            return send_ms($th->getMessage(), false);
        }
    }

    public function categoryWiseBrandList($id)
    {
        try {
            $category_list = Brand::where('status', 'active')->where('category_id',$id)->select('id', 'name_en', 'name_bn')->orderBy('id', 'DESC')->get();
            return send_single_data('category_list', $category_list, true);
        } catch (\Throwable $th) {
            return send_ms($th->getMessage(), false);
        }
    }
}
