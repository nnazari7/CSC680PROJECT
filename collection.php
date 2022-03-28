<!DOCTYPE html>


<html>
    <head>
        <meta charset="UTF-8">
        <title> Log-In Page </title>
        <style>
            .topPane{
                background-color: black;
                height: 50px;
            }
            .searchContainer{
                width: 1000px;
                height: auto;
                margin: 0 auto;
                padding: 10px;
                position: relative;
            }
            #searchInput{
                height: 25px;
                width: 200px;
            }
            #searchButton{
                height: 30px;
                width: 50px;
            }
            #searchForm{
                display: inline-block;
                margin-right: 600px;
            }
            .listContainer{
                width: 500px;
                height: 500px;
                margin: 0 auto;
                position: relative;
                text-align: center;
            }
            table{
                margin: 0 auto;
            }
        </style>
    </head>
    <body>

        <!-- Header containing search and log-in -->
        <div class="topPane">
            <div class="searchContainer">
                <form id="searchForm">
                <select name="fields" id="searchFields">
                    <option value="title">Title</option>
                    <option value="artist">Artist</option>
                    <option value="movement">Movement</option>
                    <option value="year">Year</option>
                    <option value=""mateirals">Materials</option>
                </select>
                <input type="text" placeholder="Search.." name="search" id="searchInput">
                <button type="submit" id="searchButton">Go!</button>
                </form>
                <a href="login.php" style="color:white">Log In</a>
            </div>
        </div>
        <br><br>
        <div class ="listContainer">
        <?php
        echo '<p>';
        echo $username;
        echo "'s Collection";
        echo '</p>';
        require_once('database.php');
        # connect to the database
        $connection = db_connect('artalog');
        # get user collection
        $query = "SELECT * FROM rating WHERE account_id ='";
        $query .= $acc_id;
        $query .= "'";
        $result_set = mysqli_query($connection, $query);
        #loop through collection info
        echo '<form action="artwork.php" method="post">';
        while($subject = mysqli_fetch_assoc($result_set)){
                $query = "SELECT title FROM artwork WHERE artwork_id =";
                $query .= $subject['artwork_id'];
                $result = mysqli_query($connection, $query);
                $title_arr = mysqli_fetch_row($result);
                echo '<input type="submit" id="artworkTitle" name="artworkTitle" value="';
                echo $title_arr[0];
                echo '"</input>';
                echo '<br>';
        }
        echo '</form>';
        ?>
        <div>
    </body>
</html>
