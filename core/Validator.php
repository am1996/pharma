<?php
    namespace Core;
    class Validator{
        private static $regexes = array(
            'email'=> "^[\w\d_]+@[a-zA-Z_]+\.[a-zA-Z]{2,3}$",
            'password'=> "^.{8,}$",
            'date' => "^[0-9]{4}[-/][0-9]{1,2}[-/][0-9]{1,2}\$",
            'amount' => "^[-]?[0-9]+\$",
            'number' => "^[-]?[0-9,]+\$",
            'alfanum' => "^[0-9a-zA-Z ,.-_\\s\?\!]+\$",
            'not_empty' => "[a-z0-9A-Z]+",
            'words' => "^[A-Za-z]+[A-Za-z \\s]*\$",
            'phone' => "^[0-9]{10,11}\$",
            'zipcode' => "^[1-9][0-9]{3}[a-zA-Z]{2}\$",
            'plate' => "^([0-9a-zA-Z]{2}[-]){2}[0-9a-zA-Z]{2}\$",
            'price' => "^[0-9.,]*(([.,][-])|([.,][0-9]{2}))?\$",
            '2digitopt' => "^\d+(\,\d{2})?\$",
            '2digitforce' => "^\d+\,\d\d\$",
            'anything' => ".+",
            'fullname' => "\w+\W\w+"
        );
        public $result = array();
        public $errors = array();
        public function validate($data,$validators){
            foreach($data as $key => $value){
                $validator = $validators[$key];
                //equals operator
                if(strpos($validator,"equals") !== false){
                    $otherfield = explode(":",$validator)[1];
                    if($value === $data[$otherfield]);
                    else $this->errors[] = "$otherfield doesn't equal $key.";
                }else{ 
                    $regex = self::$regexes[$validator];
                    if(self::validateItem($value,$regex) == 1){
                        $this->result[$key] = $value;
                    }else{
                        $this->errors[] = "This is not a valid $key.";
                    }
                }
            }
            return $this;
        }
        public static function validateItem($var, $regex){
            $returnval =  filter_var($var, FILTER_VALIDATE_REGEXP, array("options"=> array("regexp"=>'!'.$regex.'!i'))) != false ? 1 : 0 ;
            return $returnval;
        }
    }
?>