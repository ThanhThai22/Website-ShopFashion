<?php


namespace App\Http\Services;


class UploadService
{
    public function store($request)
    {
            if($request->hasFile('file')){
                try {
                    $name = $request->file('file')->getClientOriginalName(); //lay ten file.jpg...

                    $pathFull = 'uploads/' . date("Y/m/d"); //tao duong dan den noi chua file img

                    $request->file('file')->storeAs(
                        'public/' . $pathFull, $name
                    ); //tao noi luu tru chung cua pathfull va name

                    return '/storage/' . $pathFull . '/' . $name;
                } catch (\Exception $error) {
                    return false;
                }
            }
    }
}
