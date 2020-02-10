<?php

namespace App\Http\Controllers;

use App\Measurement;
use App\Order;
use App\OrderProduct;
use App\PriceHistory;
use App\ProductsAttribute;
use App\User;
use Intervention\Image\ImageManagerStatic;
use Image;
use App\Category;
use App\Product;
use Illuminate\Http\Request;
//for image
use Illuminate\Support\Facades\Input;
use phpDocumentor\Reflection\Types\Null_;
use Session;
use Auth;
use DB;



class ProductsController extends Controller
{//opening

    public function addProduct(Request $request){
        $count= Order::where('order_status','=','New')->get()->Count();//to display numbers of new order status
        if($request->isMethod('post')){ //
            $data=$request->all();
            //for random code
//            $random =Str::random();



//            $pin = str_random('5');
////            $refferenceNO = str_shuffle($pin);
//            echo"<pre>";print_r($pin);die;

            if(empty($data['stock'])){
                $data['stock']="";
            }
            if(empty($data['description'])){
                $data['description']="";
            }
           //echo "<pre>"; print_r($data);die;
                if(empty($data['category_id'])){
                    return redirect()->back()->with("flash_message_error",'Under Category is missing');
                }


            $product = new Product; //Product our model

            $product -> category_id = $data['category_id'];
            $product -> product_name = $data['product_name'];
            $product -> brand = $data['product_brand'];
            $product -> price = $data['price']; //
            $product -> size = $data['sizes'];
            $product->measurement=$data['measurements'];
            $product->stock=$data['stock'];
            $product -> product_code = $data['product_code'];
            $product -> description = $data['description'];

            //upload image
            if($request->hasFile('image')) {
                $image_tmp = Input::file('image');
                if ($image_tmp->isValid()){//check if the file is image then proceed
                   // echo "test"; die;

                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = rand(111,99999).'.'.$extension;//give random name
                    $large_image_path = 'images/backend_images/products/large/'.$filename;
                    $medium_image_path = 'images/backend_images/products/medium/'.$filename;
                    $small_image_path = 'images/backend_images/products/small/'.$filename;
                    //resirze image
                    Image::make($image_tmp)->save($large_image_path);
                    Image::make($image_tmp)->resize(600,600)->save($medium_image_path);
                    Image::make($image_tmp)->resize(300,300)->save($small_image_path);
                    //store
                    $product->image = $filename;
                }
            }
            $product ->save();

            //for save in price histories table
            $getProductID = DB::getPdo()->lastInsertId(); // to get the last insert id

            $productHistory = new PriceHistory;
            $productHistory->product_id = $getProductID;
            $productHistory->price =  $data['price'];
            $productHistory->save();





            return redirect()->back()->with("flash_message_success",'Product Save');


        }//ending save

            //categotis dropdown
        $categories = Category::where(['parent_id'=>0])->get();
        $categories_dropdown = "<option value='0' selected disable>Select Category</option>";
        foreach($categories as $cat){
    $categories_dropdown .= "<option value='".$cat->id."'>".$cat->name."</option>";//main

    $sub_categories = Category::where(['parent_id'=>$cat->id])->get();//sub
    foreach($sub_categories as $sub_cat){
        $categories_dropdown .= "<option value='".$sub_cat->id."'>&nbsp;--&nbsp;".
            $sub_cat->name."</option>";
    }
        }//end category


        //for measurements
        $measurement = Measurement::get();
        $measurement_dropdown = "<option value='' selected disable>Select</option>";
        foreach($measurement as $measure){
            $measurement_dropdown .= "<option value='".$measure->Measurement_code."' >".$measure->Measurement_name."</option>";
            // $measurement_dropdown .= "<option value='".$measure->Measurement_code."'>".$measure->Measurement_name."</option>";
        }
        $pppin = str_random('3');

        $pin = mt_rand(10,99);
        $refferenceNO = str_shuffle($pin);


        return view('admin.products.add_product')->with(compact(['pppin','refferenceNO','categories_dropdown','measurement_dropdown','random','count']));
    }

//    public function viewProducts(Request $request){
////        $products = Product::get();//get all data from table
////
////        foreach($products as $key => $val){ // to display the category name instead of id
////            $category_name = Category::where(['id'=> $val->category_id])->first();
////             $products[$key]->category_name = $category_name->name;
////        }//
////
////
////
////
////        return view('admin.products.view_products')->with(compact('products'));// products our var name on top
////
////
////    }
    public function viewProducts(Request $request){
        $count= Order::where('order_status','=','New')->get()->Count();//to display numbers of new order status

        $products = Product::get();//get all data from table

        foreach($products as $product => $val){ // to display the category name instead of id
            $category_name = Category::where(['id'=> $val->category_id])->first();
            $products[$product]->category_namee = $category_name->name;
        }//

        return view('admin.products.view_products')->with(compact('products','count'));// products our var name on top


    }

    public function editProduct(Request $request, $id=null){
        $count= Order::where('order_status','=','New')->get()->Count();//to display numbers of new order status

        if($request->isMethod('post')){
            $data = $request ->all();

            //upload image
            if($request->hasFile('image')) {
                $image_tmp = Input::file('image');
                if ($image_tmp->isValid()){//check if the file is image then proceed
                    // echo "test"; die;

                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = rand(111,99999).'.'.$extension;//give random name
                    $large_image_path = 'images/backend_images/products/large/'.$filename;
                    $medium_image_path = 'images/backend_images/products/medium/'.$filename;
                    $small_image_path = 'images/backend_images/products/small/'.$filename;
                    //resirze image
                    Image::make($image_tmp)->save($large_image_path);
                    Image::make($image_tmp)->resize(600,600)->save($medium_image_path);
                    Image::make($image_tmp)->resize(300,300)->save($small_image_path);

                }
            }else{
                $filename =$data['current_image']; //if we select new image this wil function
            }

        if(empty($data['stock'])){
            $data['stock']="";
        }
            if(empty($data['description'])){
                $data['description']="";
            }
            Product::where(['id'=>$id])->update
            (['category_id' =>$data['category_id'],
                'product_name' =>$data['product_name'],
                'product_code' =>$data['product_code'],
                'brand' =>$data['product_brand'],
                'description' =>$data['description'],
                'price' =>$data['price'],
                'size' => $data['sizes'],
                'stock' => $data['stock'],
                'measurement' => $data['measurements'],
                'image'=>$filename]);



            //for save in price histories table

            $productHistory = new PriceHistory;
            $productHistory->product_id = $id;
            $productHistory->price =  $data['price'];
            $productHistory->save();





            return redirect('/admin/view-products')->with('flash_message_success','Product has been
            updated successfully');
        }




        $productDetails = Product::where(['id'=>$id])->first();//Takes the first line found in DB with id = $id.
            //this will get and pass the data from view page to edit page using id and compact


        //categotis dropdown
        $categories = Category::where(['parent_id'=>0])->get();
        $categories_dropdown = "<option value='' selected disable>Select</option>";
        foreach($categories as $cat){

            if($cat->id==$productDetails->category_id){//---
                $selected = "selected";
            }else{
                $selected = "";
            }// -----

            $categories_dropdown .= "<option value='".$cat->id."' ".$selected.">".$cat->name."</option>";

            $sub_categories = Category::where(['parent_id'=>$cat->id])->get();
            foreach($sub_categories as $sub_cat){

                if($sub_cat->id==$productDetails->category_id){//---
                    $selected = "selected";
                }else{
                    $selected = "";
                }// -----

                $categories_dropdown .= "<option value='".$sub_cat->id."' ".$selected.">&nbsp;--&nbsp;".
                    $sub_cat->name."</option>";
            }

        }//end category droopdwon
//        foreach($sub_categories as $sub_cat){
//            $categories_dropdown .= "<option value='".$sub_cat->id."'>&nbsp;--&nbsp;".
//                $sub_cat->name."</option>";
//        }

        //for measurements
//        $productDetails2 = Product::where(['measurement'=>measurement])->first();//Takes the first line found in DB with id = $id.
        $measurement = Measurement::get();
        $measurement_dropdown = "<option value='' selected disable>Select</option>";
        foreach($measurement as $measure){

            if($measure->Measurement_code == $productDetails->measurement){// the code for selecting the value from the database
                $selected = "selected";
            }else{
                $selected = "";
            }// -----

            $measurement_dropdown .= "<option value='".$measure->Measurement_code."' ".$selected."> ".$measure->Measurement_name." </option>";

        }


        return view('admin.products.edit_product')->with(compact('productDetails','categories_dropdown','measurement_dropdown','count'));
    }

        public function deleteProductImage($id = null){

        //added cocde to rmvoe the image to the folder to save space
            //get the product image name
            $productImage = Product::where(['id'=>$id])->first();
            //get the product image path
            $large='images/backend_images/products/large/';
            $medium='images/backend_images/products/medium/';
            $small='images/backend_images/products/small/';
            //delete form folder
            if(file_exists($large.$productImage->image)){
                unlink($large.$productImage->image);//deleting imaged in laravel is unlink
            }
            if(file_exists($medium.$productImage->image)){
                unlink($medium.$productImage->image);//deleting imaged in laravel is unlink
            }
            if(file_exists($small.$productImage->image)){
                unlink($small.$productImage->image);//deleting imaged in laravel is unlink
            }



            Product::where(['id'=>$id])->update(['image'=>'']);//we will update image as empty in database so it will be gone
        return redirect()->back()->with('flash_message_success','Product Image has been deleted successfully!');

        }

        public function deleteProduct($id=null){
            Product::where(['id'=>$id])->delete();
            Return redirect()->back()->with('flash_message_success','Product has been deleted');
        }

    //product attribute
    public function addAttributes(Request $request, $id = null){
        $productDetails = Product::with('attributes')->where(['id' => $id])->first();
        //$productDetails = json_decode(json_encode($productDetails));
       // echo "<pre>";print_r($productDetails);die;
            //with('attributes'),attributes is in our Product model,the name of our relation one to many to productattribute model
        // $productDetails = Product::where(['id' => $id])->first();
        if($request->isMethod('post')){
            $data = $request->all();


            foreach($data['sku'] as $key => $val){
                if(!empty($val)){
                    //sku check
                    $attrCountSKU = ProductsAttribute::where('product_code',$val)->count();//validation for duplicate value
                    if($attrCountSKU>0){
                        return redirect('admin/add-attributes/'.$id)->with('flash_message_error','SKU already exist');
                    }//closing validation

                    //prevent duplicate size check
                    $attrCountsizes = ProductsAttribute::where(['product_id'=>$id,'size'=>$data['size'][$key]])->count();
                    if($attrCountsizes>0)
                    {
                        return redirect('admin/add-attributes/'.$id)->with('flash_message_error',
                            ' "'.$data['size'][$key].'" size already exist');
                    }
                    $attribute = new ProductsAttribute;
                    $attribute->product_id = $id;
                    $attribute->product_code = $val;
                    $attribute->size = $data['size'][$key];
                    $attribute->measurement = $data['measurements'][$key];
                    $attribute->price = $data['price'][$key];
                    $attribute->stock = $data['stock'][$key];
                    $attribute->save();
                }
            }
            return redirect('admin/add-attributes/'.$id)->with('flash_message_success','Product Attributes
                has been added successfully');
        }

        //for measurements
        $measurement = Measurement::get();
        $measurement_dropdown = "<option value='' selected disable>Select</option>";
        foreach($measurement as $measure){
            $measurement_dropdown .= "<option value='".$measure->Measurement_code."' >".$measure->Measurement_name."</option>";
            // $measurement_dropdown .= "<option value='".$measure->Measurement_code."'>".$measure->Measurement_name."</option>";
        }


        //for edit
//        $productDetails = Product::with('attributes')->where(['id' => $id])->first();


//
//        $productDetails2 = ProductsAttribute::where('product_id' , $id)->get();
//        foreach($productDetails2 as $tt){
//            $getmeasurement = $tt->measurement;
//            $getmeasurement2 = $tt->get()->measurement;
//        }
//    echo"<pre>"; print_r($getmeasurement);
//        echo"<pre>"; print_r($getmeasurement2);die;
        $measurement_dropdown2 = "<option value='' selected disable>Select</option>";
        foreach($measurement as $measure){

            if($measure->Measurement_code == $productDetails->measurement){// the code for selecting the value from the database
                $selected = "selected";
            }else{
                $selected = "";
            }// -----

            $measurement_dropdown2 .= "<option value='".$measure->Measurement_code."' ".$selected."> ".$measure->Measurement_name." </option>";

        }

        $count= Order::where('order_status','=','New')->get()->Count();
    return view('admin.products.add_attributes')->with(compact('productDetails','count','measurement_dropdown','measurement_dropdown2'));
    }

    public function deleteAttribute($id = null){
        ProductsAttribute::where(['id'=>$id])->delete();
        return redirect()->back()->with('flash_message_success','Attribute has been deleted');
    }
    public function editAttributes(Request $request, $id = null){
        if($request->isMethod('post')){
            $data = $request->all();
            //for each is good to use when you are saving multiple textfields,to loop through all of them
            foreach($data['idAttr'] as $key => $attr){//key is to get them by array,
                ProductsAttribute::where([
                    'id'=>$data['idAttr'][$key]])->update([
                        'price'=>$data['pricee'][$key],
                    'size'=>$data['sizee'][$key],
                    'measurement'=>$data['measurements2'][$key],
                    'stock'=>$data['stockk'][$key] ]);
            }
        return redirect()->back()->with('flash_message_success','Products Attriute has been updated successfully');
        }
    }




    public function getProductPriceajax(Request $request){
        $data= $request->all();

        $proArr = explode("-",$data['idSize']);//explode to remove
        $proAttr = ProductsAttribute::where(['product_id' =>$proArr[0], 'size' => $proArr[1] ])->first();
            echo $proAttr->price;

            //for stocsk,neew added code less 39
        echo "#";
        echo  $proAttr->stock;

    }
}//clsing

