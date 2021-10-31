<?php


namespace App\Services\BrandServices;


use App\Repositories\Admin\InterfaceBrand;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;


class BrandService implements InterfaceBrandService
{
    private $interfaceBrand;

    public function __construct(InterfaceBrand $interfaceBrand)
    {
        $this->interfaceBrand = $interfaceBrand;
    }

    public function getBrandOfIndex()
    {
        // TODO: Implement getBrandOfIndex() method.
        return $this->interfaceBrand->get();

    }

    public function createBrand($request)
    {
        // TODO: Implement createBrand() method.
        $slug=Str::slug($request->name,'-');
        if ($request->hasfile('brand_logo')) {
            $file = $request->file('brand_logo');
            $extension =$slug.'.'. $file->getClientOriginalExtension();
            $image = Image::make($file)->resize(240, 120)->save('public/files/brand/' . $extension);  //image intervention
            $filename = time() . '.' . $extension;
            $file->move('public/files/brand/', $filename, $image);

        }

        return $this->interfaceBrand->create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'brand_logo' => $filename,
            'brand_font' => $request->brand_font,
        ]);
    }

    public function updateBrand($id, $request)
    {
        // TODO: Implement updateBrand() method.


        $brand = $this->interfaceBrand->find($id);
        $brand->name = $request->name;
        $brand->slug = Str::slug($request->name);
        if ($request->hasfile('brand_logo')) {
            $path = public_path() . "/public/files/brand/" . $request->old_logo;
            unlink($path);
            $file = $request->file('brand_logo');
            $extension = $file->getClientOriginalExtension();
            $image = Image::make($file)->resize(240, 120)->save('public/files/brand/' . $extension);  //image intervention
            $filename = time() . '.' . $extension;
            $file->move('public/files/brand/', $filename, $image);
            $brand->brand_logo = $filename;

        } else {
            $brand->brand_logo = $request->old_logo;
        }

        $brand->brand_font = $request->brand_font;
        $brand->save();
        return $brand;

    }


    public function getBrandId($id)
    {
        // TODO: Implement getBrandId() method.
        return $this->interfaceBrand->find($id);
    }

    public function deleteBrand($id)
    {
        // TODO: Implement deleteBrand() method.
        $image = $this->interfaceBrand->find($id);
        $path = public_path() . "/public/files/brand/" . $image->brand_logo;
        unlink($path);
        return $this->interfaceBrand->destroy($id);
    }
}
