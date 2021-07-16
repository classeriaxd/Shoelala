<?php

namespace App\Observers;

use \App\Models\Shoe;
use \App\Models\ShoeImage;

class ShoeObserver
{
    /**
     * Handle the Shoe "deleted" event.
     *
     * @param  \App\Models\Shoe  $shoe
     * @return void
     */
    public function deleted(Shoe $shoe)
    {
        $shoeImages_TBD = ShoeImage::where('shoe_id', $shoe->shoe_id)->get();
        foreach($shoeImages_TBD as $shoeImage_TBD)
        {
            $shoeImage = ShoeImage::where('shoe_id', $shoeImage_TBD->shoe_id);
            $shoeImage->delete();
        }
        unset($shoeImages_TBD);
    }

    /**
     * Handle the Shoe "restored" event.
     *
     * @param  \App\Models\Shoe  $shoe
     * @return void
     */
    public function restored(Shoe $shoe)
    {
      $shoeImages_TBD = ShoeImage::onlyTrashed()->get();
      foreach($shoeImages_TBD as $shoeImage_TBD)
      {
          $shoeImage = ShoeImage::withTrashed()->where('shoe_id', $shoeImage_TBD->shoe_id);
          $shoeImage->restore();
      }
      unset($shoeImages_TBD);
    }

    /**
     * Handle the Shoe "force deleted" event.
     *
     * @param  \App\Models\Shoe  $shoe
     * @return void
     */
    public function forceDeleted(Shoe $shoe)
    {
        //
    }
}
