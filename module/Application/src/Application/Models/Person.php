<?php

    namespace Application\Models;

    class Person{
        private $name;
        private $height;

        public function __construct(){}

        public function setName( $name ){
            $this->name = $name;

            return $this;
        }

        public function setHeight( $height ){
            $this->height = $height;

            return $this;
        }

        public function getName(){
            return $this->name;
        }

        public function getHeight(){
            return $this->height;
        }

        public function isSexy(){
            return strtolower( $this->name ) === "tom";
        }
    }
