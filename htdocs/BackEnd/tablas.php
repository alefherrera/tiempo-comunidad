<?php

interface tablas {

    static public function Select($variable);

    static public function Insert($variable);

    static public function Update($variable);

    static public function Delete($variable);

    static public function Load($variable);
}

?>
