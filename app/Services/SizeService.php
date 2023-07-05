<?php

namespace App\Services;

use App\Models\Size;

/**
 * Class SizeService
 * @package App\Services
 */
class SizeService
{
    public function index()
    {
        try {
            $items = Size::with('category','brand')->where('status', 'active')->orderBy('id', 'DESC')->get();
            return send_single_data('items', $items, true);
        } catch (\Throwable $th) {
            return send_ms($th->getMessage(), false);
        }
    }

    public function show($id)
    {
        try {
            $item = Size::findOrFail($id);
            return send_single_data('item', $item, true);
        } catch (\Throwable $th) {
            return send_ms($th->getMessage(), false);
        }
    }

    public function store($data)
    {
        try {
            $data['create_by_id'] = admin_id();
            Size::create($data);
            return send_ms('Successfully Added new Item', true);
        } catch (\Throwable $th) {
            return send_ms($th->getMessage(), false);
        }
    }


    public function update($data, $id)
    {
        $item = Size::findOrFail($id);
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
        $item = Size::findOrFail($id);
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
        $item = Size::findOrFail($id);
        try {
            $item->status = 'delete';
            $item->update_by_id = admin_id();
            $item->save();
            return send_ms('Successfully Deleted Item', true);
        } catch (\Throwable $th) {
            return send_ms($th->getMessage(), false);
        }
    }

    public function sizeList()
    {
        try {
            $size_list = Size::where('status', 'active')->select('id', 'name_en', 'name_bn')->orderBy('id', 'DESC')->get();
            return send_single_data('size_list', $size_list, true);
        } catch (\Throwable $th) {
            return send_ms($th->getMessage(), false);
        }
    }

    public function categoryWiseSizeList($id)
    {
        try {
            $size_list = Size::where('status', 'active')->where('category_id',$id)->select('id', 'name_en', 'name_bn')->orderBy('id', 'DESC')->get();
            return send_single_data('size_list', $size_list, true);
        } catch (\Throwable $th) {
            return send_ms($th->getMessage(), false);
        }
    }

    public function brandWiseSizeList($id)
    {
        try {
            $size_list = Size::where('status', 'active')->where('brand_id',$id)->select('id', 'name_en', 'name_bn')->orderBy('id', 'DESC')->get();
            return send_single_data('size_list', $size_list, true);
        } catch (\Throwable $th) {
            return send_ms($th->getMessage(), false);
        }
    }
}
