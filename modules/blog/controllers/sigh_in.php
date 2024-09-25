<?php

try:
    if (isset(_POST['Nom'], _POST['Mot de Passe'], _POST['Adresse'], _POST['Email'], _POST['Téléphone'])) {
        (nex ../models/sign_in())->addUser(_POST['Nom'], _POST['Mot de Passe'], _POST['Adresse'], _POST['Email'], _POST['Téléphone']);
        header('Location: ../views/sign_in.php');
    } else {
        (new ../views/sign_in())->show();
    }