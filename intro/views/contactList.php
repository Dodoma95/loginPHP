<h1 align="center">Liste des contacts</h1>

<table class="table table-bordered table-striped table-dark text-center">
    <thead>
    <tr>
        <th scope="col">Nom</th>
        <th scope="col">Prenom</th>
        <th scope="col">Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($contactList as $person): ?>
        <tr>
            <td> <?= $person["lastName"] ?> </td>
            <td> <?= $person["firstName"] ?> </td>
            <td>
                <a class="btn btn-danger delete" href="/mainApp.php?route=contactDelete&id=<?=$person['id']?>">Delete</a>
                <a class="btn btn-success update ml-2" name="update" href="/mainApp.php?route=contactsForm&id=<?=$person['id']?>">Update</a>
            </td>
        </tr>
    <?php endforeach ?>
    </tbody>
</table>

<!--du jquery-->
<script>

    $(document).ready(function (){

        $(".delete").click(function (){
            return confirm("Voulez-vous vraiment supprimer cette personne?");
        })
    });

</script>

<div class="mt-2 mb-2 text-right">
    <a class="btn btn-primary" href="mainApp.php?route=contactsForm">
        Ajouter contact
    </a>
</div>