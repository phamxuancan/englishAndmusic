<?php
namespace App\Http\Controllers;
use App\Models\Word;
use Illuminate\Http\Request;
use App\Models\User_Words;

/**
 * Created by PhpStorm.
 * User: Can
 * Date: 4/6/2015
 * Time: 10:26 AM
 */

    class WordController extends Controller{
    public function index(){

    }
    public function insertWord(Request $request)
    {
        try {
            $word = $request->get('word', '');
            $pronunciation = $request->get('pronunciation', '');
            $vietnamese = $request->get('vietnamese', '');
            $sound_name = '';
            $user_id = $request->get('user_id', 0);
            if ($request->hasFile('sound')) {
                $sound = $request->file('sound');
                $extension = $sound->getClientOriginalExtension();
                $sound_name = time() . "_" . rand(0, 10000000) . "." . $extension;
                $sound->move('sounds/', $sound_name);
            }
            $word = array(
                'word' => $word,
                'pronunciation' =>base64_encode($pronunciation),
                'vietnamese' => $vietnamese,
                'file_name' => $sound_name,
                'created_at' => date('Y-m-d h:i:s')
            );
            $id_word = Word::getInstance()->insert($word);
            if ($user_id != 0) {
                $maping = array(
                    'user_id' => $user_id,
                    'word_id' => $id_word,
                    'created_at' => date('Y-m-d h:i:s')
                );
                $user_word = User_Words::getInstance()->insert($maping);
                if ($user_word) {
                    return response()->json(array("message" => "Added Success!", "error" => 0));
                } else {
                    return response()->json(array("message" => "Added fail!", "error" => 1));
                }
            }
        }catch (\Exception $e){
            return response()->json(array("message" =>$e->getMessage(), "error" => 1));
        }

        }
    }