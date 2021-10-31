<?php


namespace App\Services\SeoServices;

use App\Repositories\Admin\InterfaceSeo;
use Illuminate\Support\Facades\Auth;

class SeoService implements InterfaceSeoService
{
    private $interfaceSeo;
   public  function __construct(InterfaceSeo $interfaceSeo)
   {
       $this->interfaceSeo=$interfaceSeo;
   }
   public function getSubCategoryOfIndex()
   {
       // TODO: Implement getSubCategoryOfIndex() method.
       $id=Auth::id();

       return $this->interfaceSeo->find($id);
   }

    public function getSeoId($id)
    {
        // TODO: Implement getSeoId() method.
        return $this->interfaceSeo->find($id);
    }


    public function updateSeo($id, $request)
    {
        // TODO: Implement updateSeo() method.
        return $this->interfaceSeo->update($id,[
            'meta_title'=>$request->meta_title,
            'meta_author'=>$request->meta_author,
            'meta_tag'=>$request->meta_tag,
            'meta_description'=>$request->meta_description,
            'meta_keyword'=>$request->meta_keyword,
            'google_verification'=>$request->google_verification,
            'google_analytics'=>$request->google_verification,
            'alexa_verification'=>$request->alexa_verification,
            'google_adsense'=>$request->google_adsense,
        ]);
    }
}
