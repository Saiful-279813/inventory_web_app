<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\BrandService;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return (new BrandService())->index();
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
            'name_en' => 'required|max:180|unique:brands,name_en',
            'name_bn' => 'required|max:180|unique:brands,name_bn',
        ]);
        return (new BrandService())->store($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return (new BrandService())->show($id);
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
            'name_en' => 'required|max:180|unique:brands,name_en,' .$id,
            'name_bn' => 'required|max:180|unique:brands,name_bn,' .$id,
        ]);
        return (new BrandService())->update($data,$id);
    }

    /**
     * Active Inactive the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function activeInactive($id)
    {
        return (new BrandService())->activeInactive($id);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return (new BrandService())->destroy($id);
    }
    /**
     * Brand Short List the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function brandList()
    {
        return (new BrandService())->brandList();
    }

    /**
     * Category Wise Brand List the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function categoryWiseBrandList($id)
    {
        return (new BrandService())->categoryWiseBrandList($id);
    }
}
