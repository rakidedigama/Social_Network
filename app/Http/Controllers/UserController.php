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
            'pimage'=>'required|mimes:jpeg,jpg,png|dimensions:min_width=80,min_height=120|max:5120'
        ];
        $cMessages = [
            'mimes' => 'Sorry! We don\'t support that file format right now.',
            'dimensions' => 'Oops... that image is too small. Pick one that is at least 80x120 pixels.',
            'max' => 'The image may not be greater than 5 MB.'
        ];

        $validator = Validator::make(Input::all(),$rules,$cMessages);

        if( $validator->fails() )
            return response::json(array('errors'=>$validator->getMessageBag()->toarray()));
        else {
            $user = User::find(Auth::user()->id);
            if( $image = $req->file('pimage') ) {
                $path = public_path().'/images/uploads/users/';
                $filename = 'ii_'.$user->id.'_'.time().'.'.$image->getClientOriginalExtension();

                $this->resizeImage($image,$path,$filename);

                $user->pimage = $filename;
                $user->save();
                $json['updated'] = 'true';
            }
            return json_encode($json);
        }
    }

    public function resizeImage($image,$path,$filename) {

        $image_resize = Image::make($image->getRealPath());

        // backup status
        $image_resize->backup();
        $width = $image_resize->width();
        $height = $image_resize->height();
        $size = $image_resize->filesize();
        
        // For 200x200
        if( $width > 80 && $height > 120 ) {
            $fitRatio = 0;
            if( $width < 200 )
                $fitRatio = $width;
            else if( $height < 200 )
                $fitRatio = $height;
            else
                $fitRatio = 200;

            $image_resize->fit($fitRatio);
            $image_resize->save($path.'/200/'.$filename);
        }
        else 
            $image->move($path.'/200/',$filename);

        // reset image (return to backup state)
        $image_resize->reset();
        // For 70x70
        $image_resize->fit(70);
        $image_resize->save($path.'/70/'.$filename);
    }
}
