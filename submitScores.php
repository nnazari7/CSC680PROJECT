<?php
    require_once('database.php');
    # connect to the database
    $connection = db_connect('artalog');
    
    $aggregate = ($_POST['color'] + $_POST['shape'] + $_POST['subject'] 
            + $_POST['markmaking'] + $_POST['composition'])/5.;
    
    $newScores = '{"color":';
    $newScores .= $_POST['color'];
    $newScores .= ', "shape":';
    $newScores .= $_POST['shape'];
    $newScores .= ', "subject": ';
    $newScores .= $_POST['subject'];
    $newScores .= ', "aggregate": ';
    $newScores .= $aggregate;
    $newScores .= ', "markmaking": ';
    $newScores .= $_POST['markmaking'];
    $newScores .= ', "composition": ';
    $newScores .= $_POST['composition'];
    $newScores .= '}';
    
    $sql = "UPDATE rating SET scores ='";
    $sql .= $newScores;
    $sql .= "' WHERE artwork_id = ";
    $sql .= $_POST['artwork_id'];
    $sql .= ";";
    
    mysqli_query($connection, $sql);
    db_disconnect($connection);
?>