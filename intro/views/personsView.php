<table class="table table-striped table-dark">
    <tr>
        <th>Nom</th>
        <th>Age</th>
        <th>Competences</th>
    </tr>

    <?php foreach($personData as $person): ?>
        <tr>
            <td> <?=$person["name"] ?> </td>
            <td> <?=$person["age"] ?> </td>
            <td> <?= implode(",", $person["skills"]) ?> </td>        
        </tr>
    <?php endforeach ?>

</table>