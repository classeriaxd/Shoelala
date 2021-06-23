<?php

namespace App\Observers;

use \App\Models\Brand;
use \App\Models\Shoe;
use \App\Models\ShoeImage;

class BrandObserver
{
    /**
     * Handle the Brand "deleted" event.
     *
     * @param  \App\Models\Brand  $brand
     * @return void
     */
    public function deleted(Brand $brand)
    {
        $shoes_TBD = Shoe::with('shoeImages')
                    ->where('brand_id', $brand->brand_id)
                    ->get();
        foreach($shoes_TBD as $shoe_TBD)
        {
            foreach($shoe_TBD->shoeImages as $image_TBD)
            {
                $image = ShoeImage::where('shoe_id', $image_TBD->shoe_id);
                $image->delete();
            }
            $shoe = Shoe::where('shoe_id', $shoe_TBD->shoe_id);
            $shoe->delete();
        }
        unset($shoes_TBD);
    }

    /**
     * Handle the Brand "restored" event.
     *
     * @param  \App\Models\Brand  $brand
     * @return void
     
    public function restored(Brand $brand)
    {
        //
    }

     /**
     * Handle the Brand "force deleted" event.
     *
     * @param  \App\Models\Brand  $brand
     * @return void
     *
     
    public function forceDeleted(Brand $brand)
    {
        //
    }
    */
}
