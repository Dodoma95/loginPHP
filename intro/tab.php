
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
    $user = [
        "email" => "aaa@aaa.com", "pwd" => "aaa",
        "nom" => "dupont", "prenom" => "pierre"
    ];

    $userInfo = "";

    for($i = 0; $i<count($user); $i++){
        $userInfo .= $user[$i];
    }
    #return $userInfo;
    #var_dump($user);
    var_dump($userInfo);
?>

    <h1>testTab</h1>
    <p><?= $userInfo ?></p>
</body>
</html>

