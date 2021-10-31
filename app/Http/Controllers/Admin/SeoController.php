<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\SeoServices\InterfaceSeoService;
use Illuminate\Http\Request;

class SeoController extends Controller
{
    protected $interfaceSeoService;

    public function __construct(InterfaceSeoService $interfaceSeoService)
    {
        $this->interfaceSeoService = $interfaceSeoService;
    }

    public function edit()
    {
        $data = $this->interfaceSeoService->getSubCategoryOfIndex();

        return view('admin.setting.seo', compact('data'));
    }

    public function update($id, Request $request)
    {
        if ($this->interfaceSeoService->updateSeo($id, $request)) {
            $notification = array('messege' => 'Seo Update Successful!', 'alert-type' => 'success');
            return redirect()->back()->with($notification);
        } else {
            $notification = array('messege' => 'Seo not Update !', 'alert-type' => 'error');
            return redirect()->back()->with($notification);
        }
    }
}
