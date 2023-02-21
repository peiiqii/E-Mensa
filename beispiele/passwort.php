<?php
function saltwithhash(string $password){
    return sha1('emensa'.$password);
}