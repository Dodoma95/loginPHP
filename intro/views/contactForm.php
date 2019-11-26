<h1 align="center">Ajout de contact</h1>

<?php if(count($errors) >0): ?>
    <ul class="alert alert-danger">
        <?php foreach ($errors as $error): ?>
            <li><?= $error ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<form method="post">
    <div class="form-group">
        <label for="lastName">Nom</label>
        <input type="text" id="lastName" name="lastName" class="form-control" placeholder="entrez votre nom ici" value="<?=$lastName?>">
    </div>
    <div class="form-group">
        <label for="firstName">Prénom</label>
        <input type="text" id="firstName" name="firstName" class="form-control" placeholder="entrez votre prénom ici" value="<?=$firstName?>">
    </div>
    <input type="hidden" name="version" value="<?= $dbVersion ?>">
    <button type="submit" name="submit" class="btn btn-block btn-success">Valider</button>
</form>


<div class="mt-2 mb-2 text-left">
    <a class="btn btn-primary" href="mainApp.php?route=contacts">
        Back to contacts
    </a>
</div>


