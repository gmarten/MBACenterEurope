<?php

echo "<pre>";
print_r($_FILES);
echo "</pre>";
echo $_POST["file"];

echo "votre fichier à bien été envoyé";
$extension = end(expload($_FILES["file"]["name"]));
//$uuid = uniqid("cv");
echo "monuuidest .".$uuid;

move_uploaded_file($_FILES["file"]["name"],"files/cv") . $uuid .".". $extension);









?>