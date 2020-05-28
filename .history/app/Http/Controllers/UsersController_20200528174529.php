<?php
namespace App\Http\Controllers;


use App\Baranggay;
use App\City;
use App\Order;
use App\Province;
use App\Street;
use Illuminate\Http\Request;
use App\User;
use Session;
use DB;
use App\Product;
use App\Region;
use App\Type;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class UsersController extends Controller
{//opening

    public function userLoginRegister(){

        $getSessionID =  $session_id = Session::get('session_id');
        $countProductsinCart = DB::table('carts')->where('session_id' ,$getSessionID)->get()->count();

        return view('users.login_register')->with(compact('countProductsinCart'));
    }

    //redirect link for registration page
    public function RegistrationPageLink(){
        $getSessionID =  $session_id = Session::get('session_id');
        $countProductsinCart = DB::table('carts')->where('session_id' ,$getSessionID)->get()->count();
        return view('users.registrationusers')->with(compact('countProductsinCart'));
    }

    public function register(Request $request){
    if($request->isMethod('post')){
    $data=$request->all();
//    echo "<pre>"; print_r($data); die;

//        $userCount2 = User::where('name',$data['name'])->count();
        //cehck if exist
        $userCount = User::where('email',$data['email'])->count();
        //$userCount = User::where([ ['email', $data['email']] , ['name', $data['name']] ])->count(); when you want to check for multipel fields
        if($userCount>0){

//            return redirect()->back()->with('flash_error_message','User Already Register');
            return redirect()->back()->with('flash_message_error','User Already Exist');
        }else{
            //save code here
//            echo "success";die;
            $type = Type::where('type','customer')->first();
            $user = new User;
            $user->f_name = $data['f_name'];
            $user->m_name = $data['m_name'];
            $user->l_name = $data['l_name'];
            $user->email = $data['email'];
            $user->type_id = $type->id;
            $user->password = bcrypt($data['password']);
            $user->save();
            //after saving wwe will login the user
            if(Auth::attempt([ 'email'=>$data['email'] ,'password'=>$data['password'] ]) ){
                Session::put('frontSession',$data['email']);//frontSession in middleware file
                //we are putting the email as the session beacuse email is a unique value in our db
                //aand dont forget to import session on top use Session;
                return redirect('/cart');
            }

        }

    }
//        return view('users.login_register');
    }
        //baisc login with auth attemp
    public function login(Request $request){
        if($request->isMethod('post')){
            $data=$request->all();
//            echo "<pre>"; print_r($data);die;
            if(Auth::attempt([ 'email'=>$data['email'] , 'password'=>$data['password' ] ])){
                Session::put('frontSession',$data['email']);//frontSession in middleware file
                //we are putting the email as the session beacuse email is a unique value in our db
                //aand dont forget to import session on top use Session;
                // return redirect('/cart');
                return redirect('/select-payment');
            }else{
                return redirect()->back()->with('flash_message_error','Invalid email or password');
            }

        }
    }

    public function logout(){
        Auth::logout();
        Session::forget('frontSession');
        Session::forget('session_id');
        return redirect('/');
        //we didnt use  Session::flush(); //to clear all sessions
    }



    public function CheckEmail(Request $request){
            $data = $request->all();
            $userCount = User::where('email', $data['email'])->count();
            if ($userCount>0) {
                echo "false"; //for jquery,no need to add return redirect page
            } else {
                //save code here
                echo "true";
            }
      }

      public function account(Request $request){
        $user_id=Auth::User()->id;//get the id from the authentication ,auth
        $user_details= User::find($user_id);//then getting the otheer data base onh the auth id
//          echo "<pre>"; print_r($user_details); die;



//        if(empty($data['name'])){
//            return redirect()->back()->with('flash_message_error','Please enter your name ');
//        }


          if($request->isMethod('post')){
            $data=$request->all();
              if(empty($data['name'])){
                  return redirect()->back()->with('flash_message_error','Please enter your Name ');
              } if(empty($data['m_name'])){
                  return redirect()->back()->with('flash_message_error','Please enter your Name ');
              } if(empty($data['l_name'])){
                  return redirect()->back()->with('flash_message_error','Please enter your Name ');
              }
              if(empty($data['street'])){
                 $data['street'] = '';
              }
              if(empty($data['baranggay'])){
                  $data['baranggay'] = '';
              }
              if(empty($data['city'])){
                  $data['city'] = '';
              }
              if(empty($data['mobile'])){
                  $data['mobile'] = '';
              }

//            echo"<pre>"; print_r($data);die;
            $user = User::find($user_id);
            $user->f_name = $data['name'];
            $user->m_name = $data['m_name'];
            $user->l_name = $data['l_name'];
            $user->street = $data['street'];
            $user->baranggay = $data['baranggay'];
            $user->city = $data['city'];
              $user->mobile = $data['mobile'];
            $user->save();
            return redirect()->back()->with('flash_message_success','Your account details has been successfully updated ');
        }

          $getSessionID =  $session_id = Session::get('session_id');
          $countProductsinCart = DB::table('carts')->where('session_id' ,$getSessionID)->get()->count();





          $cityy = City::get();
          $city = "<option value='' selected disable>Select</option>";
          foreach($cityy as $cty){

              if($cty->id == $user_details->city){// the code for selecting the value from the database
                  $selected = "selected";
              }else{
                  $selected = "";
              }// -----

              $city .= "<option value='".$cty->id."' ".$selected."> ".$cty->city." </option>";

          }

          $bgg = Baranggay::get();
          $bg = "<option value='' selected disable>Select</option>";
          foreach($bgg as $b){

              if($b->baranggay == $user_details->baranggay){// the code for selecting the value from the database
                  $selected = "selected";
              }else{
                  $selected = "";
              }// -----

              $bg .= "<option value='".$b->baranggay."' ".$selected."> ".$b->baranggay." </option>";

          }

          $streett = Street::get();
          $street = "<option value='' selected disable>Select</option>";
          foreach($streett as $s) {

              if ($s->street == $user_details->street) {// the code for selecting the value from the database
                  $selected = "selected";
              } else {
                  $selected = "";
              }// -----

              $street .= "<option value='" . $s->street . "' " . $selected . "> " . $s->street . " </option>";

          }


//          $prodCity=City::all();

          //for the dynamic dropdown part
          $list = DB::table('city_baranggay_street')->groupBy('City')->get();

              return view('users.account')
            ->with(compact('user_details','countProductsinCart','street','bg','city','list'));
      }




        public function chkUserPassword(Request $request){
        $data = $request->all();
//        echo"<pre>"; print_r($data);die;
            $current_password = $data['current_pwd']; //geting teh value in the textfield
            $user_id = Auth::User()->id; //getting the user id that has been log in using Auth
            $check_password= User::where('id',$user_id)->first();// then matching the $user_id thats has been login to the users table id then getting the value
            if(Hash::check($current_password,$check_password->password)){
                //matching the $current_password that carries that value in the text field to the table in user id which has the same id to the log in user and compare the password
                echo "true"; die;
            }
            else{
                echo "false"; die;
            }
        }

        public function updatePassword(Request $request){
            if($request->isMethod('post')){
                $data=$request->all();

                $old_password = User::where('id',Auth::User()->id)->first(); //comparing the id of the user ho is login using auth to the uder table and get his data
                $current_password = $data['current_pwd'];// the value in the textfield
                if(Hash::check($current_password , $old_password -> password)){
                    $new_pwd=bcrypt($data['new_pwd']);
                    User::where('id',Auth::User()->id)->update(['password'=>$new_pwd]);
                    return redirect()->back()->with('flash_message_success','Password is updated');
                }else{
                    return redirect()->back()->with('flash_message_error','Current Password is incorrect');
                }//the reason why we still put this validation even if we have already the ajax and jquery validtion
                //is beacue if teh ajax,kquery will not function incase of some isuees we still have that validtion to backup
            }
        }

//        public function FORACCNAMEheader(){
//
//
//        return view('frontLayout.front_header')->with(compact('user'));
//        }
//


}//closing

//
//public function register(Request $request){ //withour jquery validation for already exist,
//    if($request->isMethod('post')){
//        $data = $request->all();
////    echo "<pre>"; print_r($data); die;
//        //cehck if exist
//        $userCount = User::where('email',$data['email'])->count();
//        //$userCount = User::where([ ['email', $data['email']] , ['name', $data['name']] ])->count(); when you want to check for multipel fields
//        if($userCount>0){
//
////            return redirect()->back()->with('flash_error_message','User Already Register');
//            return redirect()->back()->with('flash_message_error','User Already Exist');
//        }else{
//            //save code here
//        }
//
//if x < y: use three conditions rather
//    STATEMENTS_A
//elif x > y:
//    STATEMENTS_B
//else:
//    STATEMENTS_C
//}
//
//    }
//    return view('users.login_register');

