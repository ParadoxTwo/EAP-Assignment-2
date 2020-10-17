<?php
    $PASS = 'sit780';
    $HASH = password_hash($PASS, PASSWORD_DEFAULT);
    echo $HASH;
?>