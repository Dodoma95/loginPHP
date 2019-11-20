<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <title><?=$title?></title>
</head>
<body class="container-fluid">

<div class="row justify-content-center">
    <div class="col-md-8">
        
        <!--affichage du message d'erreur si message n'est pas vide-->
        <?php if(! empty($message)): ?>
            <div class="alert alert-warning">
                <?= $message ?>
            </div>
        <?php endif ?>

        <?php include VIEW_PATH . "/${viewName}.php"?>
    </div>
</div>
    
</body>
</html>