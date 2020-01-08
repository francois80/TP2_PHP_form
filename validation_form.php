<?php
//déclaration des variables
$isSubmitted = false;
$civility = $firstname = $lastname = $age = $society = '';

$regexName = "/^[A-Za-zéÉ][A-Za-záàâäãåçéèêëíìîïñóòôöõúùûüýÿæœ]+((-| )[A-Za-záàâäãåçéèêëíìîïñóòôöõúùûüýÿæœ]+)?$/";
//tableau civilité
$civilityChoice = [1 => 'Monsieur', 'Madame', 'Mademoiselle'];
//tableau d'erreurs
$errors = [];
//contrôle du formulaire après envoi
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $isSubmitted = true;
    //contôle de la civilité
    $civility = trim(filter_input(INPUT_POST,'civility',FILTER_SANITIZE_NUMBER_INT));
    if (empty($civility)) {
        $errors['civility'] = 'Sélectionnez votre civilité !!';
    } elseif (!filter_input(INPUT_POST, 'civility', FILTER_VALIDATE_INT)) {
        $errors['civility'] = 'Votre civilité ne correspond pas !!';
    }
     //contôle du nom
    $firstname = trim(filter_input(INPUT_POST,'firstname',FILTER_SANITIZE_STRING));
    if (empty($firstname)) {
        $errors['firstname'] = 'Veuillez renseigner le prénom';
    } elseif (!preg_match($regexName, $firstname)) {
        $errors['firstname'] = 'Votre prénom contient des caractères non autorisés !';
    }
    //contôle du prénom
    $lastname = trim(filter_input(INPUT_POST,'lastname',FILTER_SANITIZE_STRING));
    if (empty($lastname)) {
        $errors['lastname'] = 'Veuillez renseigner le nom';
    } elseif (!preg_match($regexName, $lastname)) {
        $errors['lastname'] = 'Votre nom contient des caractères non autorisés !';
    }
    //contôle de l'âge
    //tableau d'options qui permet de valider un âge minimum et maximum
    $options = ['options' => ['min_range' => 16,  'max_range' => 88]];
    $age = trim(filter_input(INPUT_POST,'age',FILTER_SANITIZE_NUMBER_INT));
    if (empty($age)) {
        $errors['age'] = 'Veuillez renseigner votre âge';
    } elseif (!filter_input(INPUT_POST, 'age', FILTER_VALIDATE_INT, $options)) {
        $errors['age'] = 'L\' age n\'est pas correct !';
    }
    //contôle de la société
    $society = trim(filter_input(INPUT_POST,'society',FILTER_SANITIZE_STRING));
    if (empty($society)) {
        $errors['society'] = 'Veuillez renseigner votre société';
    } elseif (!preg_match($regexName, $society)) {
        $errors['society'] = 'Votre société contient des caractères non autorisés !';
    }
//fin validation formulaire
}
?>