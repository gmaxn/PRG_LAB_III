<?php

    $text   = "[
        {
            'nombre':  'Gandalf   ',
            'edad':999,
            'dni':'99999 ',
            'legajo':'11111'
        },
        {
            'nombre': 'Bilbo',
            'edad':54,
            'dni':  '22222  ',
            'legajo':'22222'
        },
        {
            'nombre':'Legolas',
            'edad'  :25,
            'dni':'33333 ',
            'legajo':'33333'
        },
        {
            'nombre':'Aragon',
            'edad':38,
            'dni':'44444',
            'legajo':'44444'
        }
    ]";

    $trimmed = trim($text);
    var_dump($trimmed);
    echo "<br><br><br>";

    $trimmed = trim($text, " \t.");
    var_dump($trimmed);
    echo "<br><br><br>";

    var_dump($text);
    echo "<br><br><br>";


/*



    $binary = "\x09Example string\x0A";





    $hello  = "Hello World";
    var_dump($text, $binary, $hello);

    print "\n";



    $trimmed = trim($hello, "Hdle");
    var_dump($trimmed);

    $trimmed = trim($hello, 'HdWr');
    var_dump($trimmed);

    // trim the ASCII control characters at the beginning and end of $binary
    // (from 0 to 31 inclusive)
    $clean = trim($binary, "\x00..\x1F");
    var_dump($clean);

    */

?>