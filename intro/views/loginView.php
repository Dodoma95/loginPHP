<h1 class="text-center">Login</h1>

<?php if(! $isValid): ?>
    <ul class="alert alert-danger">
        <?php for($i=0; $i < count($errors); $i++) : ?>
            <li> <?= $errors[$i] ?> </li>
        <?php endfor ?>
    </ul>
        <!--$tableauErrors = implode(", et ", $errors); PERMET de transformer un tableau en chaine de caractere -->
<?php endif ?>


<form method="post">
    <div class="form-group">
        <label for="email">Identifiant</label>
        <input type="text" id="email" name="email" class="form-control" placeholder="entrez votre email ici" value="<?= $email ?>">
    </div>
    <div class="form-group">
        <label for="pwd">Password</label>
        <input type="password" id="pwd" name="pwd" class="form-control" placeholder="entrez votre mot de passe ici">
    </div>
    <button type="submit" name="submit" class="btn btn-block btn-success">Connexion</button>
</form>