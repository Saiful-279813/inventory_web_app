<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\SizeService;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return (new SizeService())->index();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'category_id' => 'required',
            'brand_id' => 'required',
            'name_en' => 'required|max:180|unique:sizes,name_en',
            'name_bn' => 'required|max:180|unique:sizes,name_bn',
        ]);
        return (new SizeService())->store($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return (new SizeService())->show($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'category_id' => 'required',
            'brand_id' => 'required',
            'name_en' => 'required|max:180|unique:sizes,name_en,' .$id,
            'name_bn' => 'required|max:180|unique:sizes,name_bn,' .$id,
        ]);
        return (new SizeService())->update($data,$id);
    }

    /**
     * Active Inactive the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function activeInactive($id)
    {
        return (new SizeService())->activeInactive($id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return (new SizeService())->destroy($id);
    }

    /**
     * Size List the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function sizeList()
    {
        return (new SizeService())->sizeList();
    }

    /**
     * Category Wise List the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function categoryWiseSizeList($id)
    {
        return (new SizeService())->categoryWiseSizeList($id);
    }

    /**
     * Brand Wise List the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function brandWiseSizeList($id)
    {
        return (new SizeService())->brandWiseSizeList($id);
    }
}
