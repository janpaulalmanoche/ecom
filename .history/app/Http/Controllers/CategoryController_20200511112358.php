<?php
//php artisan make:model Category =app/
//php artisan make:controller CategoryController
namespace App\Http\Controllers;
use App\Order;
use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{//opening

    public function addCategory(Request $request){//Bas sav
        $count= Order::where('order_status','=','New')->get()->Count();//to display numbers of new order status

        if($request->isMethod('post')){
            $data = $request->all();
            //new code for enable disbale categories status

            if(empty($data['status'])){
                $status = 0;
            }else{
                $status = 1;
            }

            //validation for duplicate should be inside a foreach tag
            //  echo "<pre>", print_r($data);die;
            foreach($data['category_name'] as $key => $val){//category name is the textfield name in our form
                //name="category_name[] it should have [] to function
                if(!empty($val)){
                    //sku check
                    $catDuplicheck = Category::where('name',$val)->count();//validation for duplicate value,name is our coulumn name
                    if($catDuplicheck>0){//check if column name is greater than 0 or it alresdy exist
                        return redirect('/admin/add-category')->with('flash_message_error','category name already exist!');
                    }//closing validation

                    $category = new Category;//in the http

            $category->name = $val;
            $category->parent_id= $data['parent_id'];
//            $category->description = $data['description'];// ===
            $category->url = $val; //$data['url'];// ===

            $category->status = 1; //$status;// new code for enable disbale categories

            $category->save();
                }
            }
             return redirect('/admin/view-categories')->with('flash_message_success','Category Added Successfully');
        }

        $levels = Category::where(['parent_id'=>0])->get();
        return view('admin.categories.add_category')->with(compact('levels','count'));
    }
//in laravel we have eloquent
//we dont call the table name 'categories' because in dafault eloquent the
//eloquent will assume that 'Category' model stores records in 'categories'
//thats how laravel works, and when making a table name it should always be plural because plural name of the class will be used as the table name

//$category = new Category;//in the http
//
//$category->name = $data['category_name']; //name=table name in categories,category_name is the name of our
//    // field in the add_category.blade
//$category->parent_id= $data['parent_id'];
//$category->description = $data['description'];// ===
//$category->url = $data['url'];// ===
//
//$category->status = $status;// new code for enable disbale categories
//
//$category->save();
//return redirect('/admin/view-categories')->with('flash_message_success','Category Added Successfully');
//}
//
//$levels = Category::where(['parent_id'=>0])->get();
//return view('admin.categories.add_category')->with(compact('levels'));
//}
////in lara

public function viewCategories(){
    $count= Order::where('order_status','=','New')->get()->Count();//to display numbers of new order status
        $categories = Category::get(); //the name of the our Model singular name form of our table and get() function to do the query

        return view('admin.categories.view_categories')->with(compact('categories','count'));
        //compact is to pass data,inside is the $categories our variable name that is equals to Category::get();,
    //we put it inside our return view page,to import pass or compact teh data to view_categories.blade.php
    /*    $categories = Category::get();
        $categories = json_decode(json_encode($categories));

        return view('admin.categories.view_categories')->with(compact('categories'));
    */
}

public function editCategory(Request $request,$id = null){//we pass the $id
    $count= Order::where('order_status','=','New')->get()->Count();//to display numbers of new order status
        if($request->isMethod('post')){//check that the reqeust is a post mehtod
            $data = $request->all();//store ;all request parameter in it's own variable


            //new code for enable disbale categories status
            if(empty($data['status'])){
                $status = 0;
            }else{
                $status = 1;
            }

            Category::where(['id'=>$id])->update([
                'name'=>$data['category_name'] ,
                'parent_id'=>$data['parent_id'] ,
//                'description'=>$data['description'],
            'url'=>$data['url'],'status'=>$status]);
            //Access the Eloquent model Category, checks the id and updates
            //accordingly
            return redirect('/admin/view-categories')->with('flash_message_success','Category Updated Successfully');
        }

        $categoryDetails = Category::where(['id'=>$id])->first(); //we get the categorydetails where id=$id (our variable id which we pass)
        $levels = Category::where(['parent_id'=>0])->get();
return view('admin.categories.edit_category')->with(compact('categoryDetails','levels','count'));//then pass the values to our edit_categorypage
}

public function deleteCategory(Request $request ,$id = null){
    if(!empty($id)){
        Category::where(['id'=>$id])->delete();
        return redirect()->back()->with('flash_message_success','Category delete successfully');
    }

}


//revisions on cat

public function viewMainCategory(){

        $getMaincat = Category::where('parent_id' , '=' , '0')->get();


    $count= Order::where('order_status','=','New')->get()->Count();//to display numbers of new order status
        return view('admin.categories.view_main_cat')->with(compact('getMaincat','count'));
}
//pass the id of the main cat to the other vie to addd subcatt

    public function viewMainCategorywithID($id){

        $getMainCatDetails= Category::where('id',$id)->first();


        $count= Order::where('order_status','=','New')->get()->Count();//to display numbers of new order status
        return view('admin.categories.view_main_cat_withID')->with(compact('getMainCatDetails','count'));
    }

    public function insertSUBCATS(Request $request, $id=null){

        if($request->isMethod('post')){
            $data = $request->all();

            foreach($data['subcatname'] as $key => $val){
                if(!empty($val)){
                    //sku check
                    $attrCountSKU = Category::where('name',$val)->count();//validation for duplicate value
                    if($attrCountSKU>0){
                        return redirect('/admin/view-main-categoryy/'.$id)->with('flash_message_error','sub category name
                        already exist');
                    }//closing validation

                    $sub = new Category;
                    $sub->parent_id = $data['maincat_id'];

                    $sub->name = $data['subcatname'][$key];

                    $sub->url = $data['subcatname'][$key];
                    $sub->status = 1 ;



                    $sub->save();
                }
            }

        }
        return redirect()->back()->with('flash_message_success','Save');
    }


}//
