<?php
require_once "prepend.php";
$s = new StaticContentParser($opt);
$s->execute($_REQUEST);