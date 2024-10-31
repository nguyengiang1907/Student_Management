<?php
    class StudentDTO{
        public $name;
        public $age;
        public $address;
        public $class_student;

        function __construct($name, $age, $address, $class_student){
            $this->name=$name;
            $this->age=$age;
            $this->address=$address;
            $this->class_student=$class_student;
        }
    }
?>