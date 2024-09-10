<?php

// démarrer le mécanisme de session
session_start();

print_r($_SESSION);

$_SESSION["compteur"]++;