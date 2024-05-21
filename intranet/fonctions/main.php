<?php
#Inclusion des différents modulue avec la fonction require_once
# (__DIR__ .) pour la version 8.4 de php Mac de Téo
session_start();
require_once(__DIR__ . '/headnavfoot.php');
require_once(__DIR__ . '/deconnexion.php');
require_once(__DIR__ . '/connexion.php');
require_once(__DIR__ . '/role.php');
require_once(__DIR__ . '/file-manager/repo-file.php');
require_once(__DIR__ . '/file-manager/download.php');
require_once(__DIR__ . '/file-manager/interfaces.php');
?>
