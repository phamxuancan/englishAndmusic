<?php
/**
 * Created by PhpStorm.
 * User: Can
 * Date: 3/30/2015
 * Time: 2:27 PM
 */
namespace App\Models;
use App\Models\ModelBase;
use Illuminate\Support\Facades\DB;
class Word extends ModelBase{
    private static $instance;
    public function __construct(){
        parent::__construct('words');
    }
    public static function getInstance(){
        if(self::$instance == null){
            self::$instance =new Word();
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
    public function getObject($id){
        $sql = 'SELECT * FROM users WHERE id='.$id;
        $data = DB::select($sql);
        return $data;
    }
    public function getObjectsInArrayIds($field,$inArrayIds){
        $sql = "SELECT * FROM $this->tableName WHERE $field IN ('".$inArrayIds."') ";
        $data = DB::select($sql);
        return $data;
    }
}