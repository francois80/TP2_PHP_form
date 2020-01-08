<?php
include 'validation_form.php';
?>
<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>PHP TP2 - Formulaire</title>
        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <p></p>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8  alert alert-secondary">
                    <form class="form-horizontal" method="post" action="#">
                        <fieldset>
                            <legend class="bg-primary text-center font-weight-bold text-white">Saisissez vos informations</legend>
                            <div class="form-group">
                                <label for="civility" class="control-label col-md-4">Civilité : </label>
                                <div class="col-md-8">
                                <select name="civility" required  class="form-control">
                                    <option value="0">Sélectionnez</option>
                                    <?php
                                    foreach ($civilityChoice as $civilityChoiceid => $civilityChoiceName){ ?>
                                    <option value="<?= $civilityChoiceid ?>"
                                            <?= ($civility == $civilityChoiceid) ? 'selected' : '' ?>
                                           ><?= $civilityChoiceName ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                                <span class="text-danger"><?= ($errors['civility']) ?? '' ?></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="firstname" class="control-label col-md-4">Votre nom : </label>
                                 <div class="col-md-8">
                                <input type="text" class="form-control" id="firstname" name="firstname" size="30" placeholder="Votre nom ici"  value="<?= $firstname ?>" required />
                                <span class="text-danger"><?= ($erros['firstname']) ?? '' ?></span>
                                 </div>
                             </div>
                            <div class="form-group">
                                <label for="lastname" class="control-label col-md-4">Prénom : </label>
                                 <div class="col-md-8">
                                <input type="text" class="form-control" name="lastname" id="lastname" size="30" placeholder="Votre prénom ici" value="<?= $lastname ?>" required />
                                <span class="text-danger"><?= ($errors['lastname']) ?? '' ?></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="age" class="control-label col-md-4">Votre âge : </label>
                                <div class="col-md-8">
                                <input type="number" class="form-control" name="age" id="age" size="40" min="12" max="120" placeholder="Choisissez" required value="<?= $age ?>" />
                                <span class="text-danger"><?= ($errors['age']) ?? '' ?></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="society" class="control-label col-md-4">Votre société : </label>
                                <div class="col-md-8">
                                <input type="text" class="form-control" id="society" name="society" size="30" placeholder="Le nom de votre société ici" value="<?= $society ?>" required />
                                <span class="text-danger"><?= ($errors['society'] ?? '') ?></span>
                                </div>
                            </div>
                        </fieldset>
                        <input type="reset" name="reset" class="btn btn-primary" value="Effacez" />
                        <input type="submit" name="submit" class="btn btn-primary" value="Envoyez" />
                    </form>
                </div>
             </div>
            <div>
                    <?php
                     if ($isSubmitted && count($errors) == 0) {
                        ?>
                        <p>Civilité : <mark><?= $civilityChoice[$civilityChoiceid] ?></mark></p>
                        <p>Nom : <mark><?= $firstname ?></mark></p>
                        <p>Prénom : <mark><?= $lastname ?></mark></p>
                        <p>Age : <mark><?= $age ?></mark></p>
                        <p>Société : <mark><?= $society ?></mark></p>
                      <?php
                     }
                     ?>
                    </div>
        </div>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
         <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
    </body>
</html>