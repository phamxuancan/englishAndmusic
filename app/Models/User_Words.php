<?php
namespace App\Models;
use App\Models\ModelBase;
use Illuminate\Support\Facades\DB;
/**
 * Created by PhpStorm.
 * User: Can
 * Date: 4/8/2015
 * Time: 3:59 PM
 */
    class User_Words extends ModelBase{
        private static $instance;
        public function __construct(){
            parent::__construct('user_words');
        }
        public static function getInstance(){
            if(self::$instance == null){
                self::$instance =new User_Words();
            }
            return self::$instance;
        }
        public function insert($input){
            foreach($input as $key =>$value){
                $fieldDB  []= $key;
                $valueData[]= $value;
            }
            $infields = implode(",",$fieldDB);
            $inValues = implode("','",$valueData);
            $sql = "INSERT INTO $this->tableName ($infields) VALUES ('".$inValues."')";
            DB::insert($sql,array());
            return DB::getPdo()->lastInsertId();
        }
        public function getObject($wheres){
            if(is_array($wheres)) {
                foreach ($wheres as $key => $val) {
                    $condition[] = $key . '=' . $val;
                }
                $inwhere = implode(" and ", $condition);
                $sql = " SELECT * FROM $this->tableName WHERE " . $inwhere;
                $data = DB::select($sql);
                return $data;
            }
        }
    }