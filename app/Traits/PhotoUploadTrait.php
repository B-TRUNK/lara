<?php

namespace App\Traits;

Trait PhotoUploadTrait

{

    //save photo in db
    protected function photo_upload($request ,$path)
    {

        $file_extension = $request -> getClientOriginalExtension();
        $file_name = time().'.'.$file_extension;
        //$path = 'images/offers';
        $request -> move($path ,$file_name);

        return $file_name;

    }




}

?>
