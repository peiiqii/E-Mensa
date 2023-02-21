<?php
function getbesucher(){
    $link = connectdb();

    $sql = "SELECT * FROM besucher";
    $result = mysqli_query($link, $sql);

    $data = mysqli_fetch_all($result, MYSQLI_BOTH);

    mysqli_close($link);
    return $data;
}