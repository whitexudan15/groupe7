<?php

require_once './Connexion.php';

if (isset($_GET['action'])) $action = htmlspecialchars($_GET['action']);

switch ($action) {
    case 'programmer':
        # code...
        break;
        
    case 'modifier':
        # code...
                break;
    case 'deprogrammer':
            # code...
                                                                                                                                                                                                                        break;
    default:
        # code...
        break;
}