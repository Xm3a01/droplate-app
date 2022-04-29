<?php namespace App\Traits;

trait MediaTrait {
    public function getTraitMediaUrl($file)
    {
        $file_name = time().'.'.$file->getClientOriginalExtension();

        return $file->storeAs('public/ads' , $file_name);
    }
}