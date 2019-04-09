<?php
    class Punto
    {
        private $_x;
        private $_y;

        public function GetX()
        {
            return $this->_x;
        }

        public function GetY()
        {
            return $this->_y;
        }

        public function __construct($x, $y)
        {
            $this->_x = $x;
            $this->_y = $y;
        }
    }

    class Rectangulo
    {
        private $_vertice1;
        private $_vertice2;
        private $_vertice3;
        private $_vertice4;

        protected $ladoUno; // Base
        protected $ladoDos; // Altura
        protected $area;
        protected $perimetro;

        public function __construct($vertice1, $vertice3)
        {
            $this->ladoUno=$vertice3->GetX() - $vertice1->GetX();
            $this->ladoDos=$vertice3->GetY() - $vertice1->GetY();

            $this->area = $this->ladoUno * $this->ladoDos;
            $this->perimetro = ($this->ladoUno*2) + ($this->ladoDos*2);
        }

        public function Dibujar()
        {
            $dibujo = "<br>Rectangulo: ";
            $dibujo = $dibujo . "<pre>";

            for($i=0; $i<$this->ladoDos; $i++)
            {
                for($j=0; $j<$this->ladoUno; $j++)
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
            echo "Lado 1: ".$this->ladoUno."<br>"
               . "Lado 2: ".$this->ladoDos."<br>"
               . "Area: ".$this->area."<br>"
               . "Perimetro: ".$this->perimetro."<br>";
        }

    }
?>