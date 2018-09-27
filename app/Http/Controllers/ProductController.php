<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
// use Intervention\Image\Image as Image; 
use Validator;
use Response;
use Illuminate\Support\Facades\Input;
use App\Product;
use App\Product_Request;
use Auth;

class ProductController extends Controller
{
    public function getProducts($skip,$limit,$name)
    {
    	$data = Product::select('products.id','products.name','products.sub_category_id','products.image','products.user_id','sub_categories.name as category_name','users.city_id','users.name as owner_name','cities.name as city')
        ->join('sub_categories', 'products.sub_category_id', '=', 'sub_categories.id')
        ->join('users', 'products.user_id', '=', 'users.id')
        ->join('cities','users.city_id','cities.id')
        ->where('products.status','1')->where('products.viewstatus','1');
      
        // if(is_numeric($city_id))
        //     $data=$data->where('city_id',$city_id);

        // if(is_numeric($sub_category_id))
        //     $data=$data->where('products.sub_category_id',$sub_category_id);
  
        if($name != 'null') {
            // $sub_categories = $data->where('sub_categories.name', 'LIKE', '%'.$name.'%');
            // $cities=$data->where('cities.name', 'LIKE', '%'.$name.'%');
            $data = $data->where('products.name', 'LIKE', '%'.$name.'%');
        }
        
        $data=$data->orderBy('id','DESC')->skip($skip)->take($limit)->paginate(15);
        
        if( !$data->first() ) {
            if( $name != 'null' )
                $data=array('msg'=>'Sorry No Data Found.','searched'=>'1');
            else
                $data=array('msg'=>'The End.','searched'=>'0');
        }

        return $data;
    }

    public function getProductsUser($id)
    {
    	$data = Product::select('products.id','products.name','products.sub_category_id','products.image','products.user_id','sub_categories.name as category_name')->join('sub_categories', 'products.sub_category_id', '=', 'sub_categories.id')->where('products.status','1')->where('products.user_id',$id)->orderBy('id','DESC')->get();
    	return json_encode($data);
    }

    public function getProductsUserLimit($id,$limit)
    {
        $data = Product::select('products.id','products.name','products.sub_category_id','products.image','products.user_id','sub_categories.name as category_name')->join('sub_categories', 'products.sub_category_id', '=', 'sub_categories.id')->where('products.status','1')->where('products.user_id',$id)->orderBy('id','DESC')->limit($limit)->get();
        return json_encode($data);
    }

    public function getProductsUserSkipLimit($id,$skip,$limit)
    {
        $data = Product::select('products.id','products.name','products.sub_category_id','products.image','products.user_id','sub_categories.name as category_name')->join('sub_categories', 'products.sub_category_id', '=', 'sub_categories.id')->where('products.status','1')->where('products.user_id',$id)->orderBy('id','DESC')->skip($skip)->take($limit)->get();

        if( !$data->first() )
            $data=array('msg'=>'The End.');

        return json_encode($data);
    }

    public function addProduct(Request $req)
    {
        $json['inserted'] = 'false';
        $rules = [
            'name'=>'required|string|max:60|min:3',
            'author'=>'required|string|max:60|min:3',
            'sub_category_id'=>'required|integer|not_in:0',
            'lending_duration' => 'required|numeric|not_in:0',
            'image'=>'required|mimes:jpeg,jpg,png|dimensions:min_width=80,min_height=120|max:5120'  
        ];
        $cMessages = [
            'mimes' => 'Sorry! We don\'t support that file format right now.',
            'dimensions' => 'Oops... that image is too small. Pick one that is at least 80x120 pixels.',
            'max' => 'The image may not be greater than 5 MB.'
        ];
        $cAttributes = [
            'name' => "Name",
            'author' => "Author",
            'sub_category_id' => 'Category',
            'lending_duration' => "Lending Duration",
            'image' => 'Image'
        ];

        $validator = Validator::make(Input::all(),$rules,$cMessages,$cAttributes);

        if( $validator->fails() )
            return response::json(array('errors'=>$validator->getMessageBag()->toarray()));
        else {
            $product = new Product();
            $product->name = $req->name;
            $product->author = $req->author;
            $product->sub_category_id = $req->sub_category_id;
            $product->lending_duration = $req->lending_duration;
            $product->user_id = Auth::user()->id;

            if( $image = $req->file('image') ) {
                $path = public_path().'/images/uploads/';
                $filename = 'ii_'.Auth::user()->id.'_'.time().'.'.$image->getClientOriginalExtension();
                $this->resizeImage($image,$path,$filename);
                $product->image = $filename;
                $product->save();
                $json['inserted'] = 'true';
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
            if( $width < 280 )
                $fitRatio = $width;
            else if( $height < 280 )
                $fitRatio = $height;
            else
                $fitRatio = 280;

            // $image_resize->resize($fitRatio,$fitRatio, function ($constraint) {
            //     $constraint->aspectRatio();
            // });
            // $image_resize->resizeCanvas($fitRatio, $fitRatio, 'center', false, array(255, 255, 255, 0));            
            $image_resize->fit($fitRatio);
            $image_resize->save($path.'/280/'.$filename);
        }
        else 
            $image->move($path.'/280/',$filename);

        // reset image (return to backup state)
        // $image_resize->reset();
        // For 70x70
        // $image_resize->fit(70);
        // $image_resize->save($path.'/70/'.$filename);
    }

    public function getBorrowRequestProducts($id,$skip,$limit)
    {
        $data = Product_Request::select('products.id','products.name','products.sub_category_id','products.image','products.user_id','users.name as borrower_name','product__requests.borrow_user','product__requests.id as request_id')
        ->join('products','products.id','product__requests.product_id')
        ->join('users','users.id','product__requests.borrow_user')
        ->where('products.status','1')->where('products.viewstatus','1')->where('product__requests.status',0)->where('product__requests.lent_user',$id)->orderBy('id','DESC')->skip($skip)->take($limit)->get();
              
        if( !$data->first()  )
            $data=array('msg'=>'The End.');

        return json_encode($data);
    }

    public function getLentProducts($id,$skip,$limit)
    {
        $data = Product_Request::select('products.id','products.name','products.sub_category_id','products.image','products.user_id','users.name as borrower_name','product__requests.borrow_user','product__requests.id as request_id')
        ->join('products','products.id','product__requests.product_id')
        ->join('users','users.id','product__requests.borrow_user')
        ->where('products.status','1')->where('products.viewstatus','1')->where('product__requests.status',1)->where('product__requests.lent_user',$id)->orderBy('id','DESC')->skip($skip)->take($limit)->get();
              
        if( !$data->first()  )
            $data=array('msg'=>'The End.');

        return json_encode($data);
    }

    public function getBorrowedProducts($id,$skip,$limit)
    {
        $data = Product_Request::select('products.id','products.name','products.sub_category_id','products.image','products.user_id','users.name as lent_name','product__requests.lent_user','product__requests.id as request_id')
        ->join('products','products.id','product__requests.product_id')
        ->join('users','users.id','product__requests.lent_user')
        ->where('products.status','1')->where('products.viewstatus','1')->where('product__requests.status',1)->where('product__requests.borrow_user',$id)->orderBy('id','DESC')->skip($skip)->take($limit)->get();
              
        if( !$data->first()  )
            $data=array('msg'=>'The End.');

        return json_encode($data);
    }

    public function delProduct(Request $req)
    {
        $json['deleted'] = 'false';
        
        if(Auth::check())
        {
            $checkData = Product::where('id',$req->id)->where('user_id',Auth::user()->id)->get();
            if($checkData->first())
            {
                $vdata = Product_Request::where('product_id',$req->id)->where('status',1)->get();

                if($vdata->first())
                    $json['error'] = 'First take back this item from borrower.';
                else
                {
                    $data = Product::find($req->id);
                    $data->status = 0;
                    $data->save();
                    $json['deleted'] = 'true';
                }
            }
            else
                $json['error'] = 'Can not delete others item.';
        }
        else
            $json['error'] = 'Can not delete this item. Incorrect credentials.';

        return json_encode($json);
    }
}
