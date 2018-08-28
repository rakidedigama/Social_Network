<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;
use Auth;


class UserController extends Controller
{
    public function ChangeImage(Request $req) {

    	$json['updated'] = 'false';
        $rules = [
            'pimage'=>'required|mimes:jpeg,jpg,png'  
        ];

        $validator = Validator::make(Input::all(),$rules);

        if( $validator->fails() )
            return response::json(array('errors'=>$validator->getMessageBag()->toarray()));
        else {
            $user = User::find(Auth::user()->id);
            // $user->pimage = $req->pimage;
            
            //File Storage
            if( $image = $req->file('pimage') ) {
                $path = public_path().'/images/uploads/users/';
                $filename = time().'.'.$image->getClientOriginalExtension();
                
                $image_resize = Image::make($image->getRealPath());
                $size = $image_resize->filesize();
                if( $size>250000 ) {
                    $image_resize->resize(1000,1000, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                    $image_resize->resizeCanvas(1000, 1000, 'center', false, array(255, 255, 255, 0));
                    $image_resize->save($path.$filename);
                }
                else
                    $image->move($path,$filename);   

                $user->pimage = $filename;
                $user->save();
                $json['updated'] = 'true';
            }
            return json_encode($json);
        }
    }
}
