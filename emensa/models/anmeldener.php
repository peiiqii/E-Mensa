<?php
function getallanmeldener(){
    $link = connectdb();

    $sql = "SELECT * FROM kundeninfo";
    $result = mysqli_query($link, $sql);

    $data = mysqli_fetch_all($result, MYSQLI_BOTH);

    mysqli_close($link);
    return $data;
}