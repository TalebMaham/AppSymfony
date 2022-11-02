<?php

require './vendor/autoload.php';

use Symfony\Component\Yaml\Yaml; 

$value = Yaml::parse(file_get_contents('test.yml'));

