<?php

namespace App\traits; 
use Carbon\Carbon;

trait HandleImage {

    function uploadSingleImage($file)
    {
        $name=$file->getClientOriginalName();
        $file->move('image/profile',$name);
        return $name;
    }

    function uploadMutilpleImage(array $files)
    {
        $time = Carbon::now('Asia/Ho_Chi_Minh')->format("Y.m.d H.i.s");
            $images=array();
            foreach($files as $file){
                $name=$time.'.'.$file->getClientOriginalName();
                $file->move('image/posts',$name);
                $images[]=$name;
            }
        return $images;
    }

    function getAvatarDefault($gender)
    {
        return $gender == 'nam' ? 'avatar-nam.jpg' : 'avatar-nu.jpg';
    }
}