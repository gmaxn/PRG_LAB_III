<?php

    abstract class FiguraGeometrica
    {
        protected $_color;
        protected $_perimetro;
        protected $_superficie;

        public function GetColor()
        {
            return $this->_color;
        }
        public function SetColor($value)
        {
            $this->_color = $value;
        }
        public function __construct()
        {
            $this->_color = "Red";
        }
        public function ToString()
        {
            echo "Color: " . $this->_color;
        }
        public abstract function Dibujar();
        protected abstract function CalcularDatos();
    }

    class Rectangulo extends FiguraGeometrica
    {
        private $_ladoDos; // Base
        private $_ladoUno; // Altura

        public function __construct($ladoUno, $ladoDos)
        {
            parent::__construct();
            $this->_ladoUno = $ladoUno; 
            $this->_ladoDos = $ladoDos;
            $this->CalcularDatos();   
        }
        protected function CalcularDatos()
        {
            $this->_perimetro = ($this->_ladoUno*2) + ($this->_ladoDos*2);
            $this->_superficie = $this->_ladoUno * $this->_ladoDos;
        }
        public function Dibujar()
        {
            $dibujo = "<br>Rectangulo: ";
            $dibujo = $dibujo . "<pre style='color:$this->_color'>";

            for($i=0; $i<$this->_ladoDos; $i++)
            {
                for($j=0; $j<$this->_ladoUno; $j++)
                {
                    $dibujo = $dibujo . "*";
                }
                $dibujo = $dibujo . "<br>";
            }
            $dibujo = $dibujo . "</pre>";

            echo $dibujo;
        }
        public function ToString()
        {
            echo "Lado 1: ".$this->_ladoUno."<br>"
               . "Lado 2: ".$this->_ladoDos."<br>"
               . "Perimetro: ".$this->_perimetro."<br>"
               . "Superficie: ".$this->_superficie."<br>"
               . "Color: ".$this->_color;
        }
    }

    class Triangulo extends FiguraGeometrica
    {
        private $_altura;
        private $_base;

        public function __construct($altura, $base)
        {
            parent::__construct();
            $this->_altura = $altura;
            $this->_base = $base;          
        }
        public function Dibujar()
        {
            $i = 0;
            $j = 0;
            $asteriscos = 1;
            $espacios = $this->_altura / 2;
            $dibujo = "<br>Triangulo: ";

            while ($asteriscos <= $this->_altura)
            {
                $dibujo=$dibujo . "<pre style='color:$this->_color'>";
                while ($j < $espacios)
                {
                    $dibujo=$dibujo . "&nbsp";
                    $j++;
                }
                while ($i < $asteriscos)
                {

                    $dibujo=$dibujo."*";
                    $i++;
                }
                $dibujo=$dibujo . "</pre>";
                $asteriscos = $i + 2;
                $espacios = $j - 1;
                $i = 0;
                $j = 0;
            }

            echo $dibujo;
        }
        protected function CalcularDatos()
        {
            $this->_perimetro = 0;
            $this->_superficie = $this->_base * $this->_altura / 2;
            return 1;
        }
        public function ToString()
        {
            echo "Base: ".$this->_base."<br>"
               . "Altura: ".$this->_altura."<br>"
               . "Perimetro: ".$this->_perimetro."<br>"
               . "Superficie: ".$this->_superficie."<br>"
               . "Color: ".$this->_color;
        }
    }
?>