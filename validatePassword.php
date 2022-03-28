<?php
    require_once('database.php');
    # connect to the database
    $connection = db_connect('artalog');
    
    $username = $_POST['username'];
    
    $sql = "SELECT password, account_id FROM user WHERE username = '";
    $sql .= $username;
    $sql .= "'";
    
    $result = mysqli_query($connection, $sql);
    $subject = mysqli_fetch_row($result);
    
    $acc_id = $subject[1];
    
    if ($_POST['password'] == $subject[0]){
        include 'collection.php';
    } else { echo 'Invalid Password';}
    
    db_disconnect($connection);
?>