<?php
    // Human. Human talks. 
    // So ignoring $bark parameter.
    $jhonDoe = new Animal(2, 2); 
    
    // Dog. Dog barks. 
    // So setting $bark parameter.
    $doggy = new Amial(4, 4, "wooff!");

    class Animal 
    {
        private $legs;
        private $eyes;
        private $bark;

        public function __construct($legs, $eyes, $bark=null) 
        {
            // Do your stuffs! You can check 
            // parameters and make decisions.
            $this->legs=$legs;
            $this->eyes=$eyes;
            $this->bark=$bark;
        }
    }
?>



