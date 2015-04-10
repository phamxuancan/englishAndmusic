<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use App\Models\User_Words;
use App\Models\Word;
/**
 * Created by PhpStorm.
 * User: Can
 * Date: 3/26/2015
 * Time: 2:45 PM
 */
    class UserController extends Controller{
        public function index(){
            return view('layouts.index');
        }
        public function home(){
            $user           = new \stdClass();
            $user->id       = Auth::user()->id;
            $user->username = Auth::user()->username;
            $user->email    = Auth::user()->email;
            $user->avatar   = Auth::user()->avatar;
            $datas = User_Words::getInstance()->getObject(array('user_id'=>$user->id ));
            $word_ids = array();
            if(count($datas)>0){
                foreach($datas as $data){
                    $word_ids[] = $data->id;
                }
            }
            $words = array();
            if(count($word_ids) > 0){
                $inWordIds = implode("','",$word_ids);
                $words = Word::getInstance()->getObjectsInArrayIds('id',$inWordIds);
            }

          return view('user.home',array('user'=>$user,'data'=>$words));
        }
        public function authentication(){

            if(Auth::check()){
                return redirect()->to('users');
            }
            return view('user.login');
        }
        public function logout(){
            Auth::logout();
            return view('user.login');
        }
        public function confirm(Request $request){
            try{
                $data  = $request->all();
                unset($data['token']);
                if (Auth::attempt($data)){
                    return response()->json(array('message'=>'Login Success!','error'=>0));
                } else {
                    return response()->json(array('message'=>'Login fail!','error'=>1));
                }
            }catch (\Exception $e){
                return response()->json(array('message'=>$e->getMessage(),'error'=>1));
            }

        }
        public function addUser(Request $request){
            try{
                $username = $request->get('register_name','');
                $password = $request->get('password','');
                $repassword = $request->get('repassword','');
                $filename = '';
                if($request->hasFile('avatar')){
                    $avatar = $request->file('avatar');
                    $extension = $avatar->getClientOriginalExtension();
                    $filename = time() . "_" . rand(0,10000000). "." . $extension;
                    $avatar->move('uploads/',$filename);
                }
                if($password != $repassword){
                    return response()->json(array('message'=>'Password not the same!','error'=>1));
                }
                $user_infor = array(
                    "username"=> $username,
                    "password"=>Hash::make($password),
                    "fb_id"   => "",
                    "created_at"=>date('Y-m-d h:i:s'),
                    "avatar"     =>$filename
                );
                $user_id = User::getInstance()->insert($user_infor);
                if($user_id){
                    return response()->json(array("message"=>"Register Success!","error"=>0));
                }
            }catch (\Exception $e){
                return response()->json(array("message"=>$e->getMessage(),"error"=>1));
            }

        }
    }