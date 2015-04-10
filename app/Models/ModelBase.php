<?php
/**
 * Created by PhpStorm.
 * User: Can
 * Date: 3/30/2015
 * Time: 10:36 AM
 */
namespace App\Models;
use Illuminate\Support\Facades\DB;
    class ModelBase{
        protected $tableName;
        public function __construct($table_name){
            $this->tableName = $table_name;
        }

        public function getObjectsInfield($field, $InString){
            $sql = "SELECT * FROM $field WHERE ";
        }
    }