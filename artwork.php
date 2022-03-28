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
                width: 750px;
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
        
        require_once('database.php');
        # connect to database
        $connection = db_connect('artalog');
        
        # get post info
        $sql = "SELECT * FROM artwork WHERE title='"; 
        $sql .= $_POST['artworkTitle'];
        $sql .= "';";
        $result_set = mysqli_query($connection, $sql);
        $subject = mysqli_fetch_assoc($result_set);
        
        echo $subject['title'];
        echo '<br>';
        echo '<img src="';
        echo $subject["artwork_link"];
        echo '" width="500"height="500">';
        #list artwork info
        echo '<p>';
        echo 'Artist: ';
        echo $subject['artist'];
        echo '<br>';
        echo 'Movement: ';
        echo $subject['movement'];
        echo '<br>';
        #later i will code a function to use start year if start/end year are the same and display both if not
        echo 'Year: ';
        echo $subject['start_year'];
        echo "-";
        echo $subject['end_year'];
        echo '<br>';
        echo 'Materials: ';
        echo $subject['materials'];
        echo '<br>';
        echo 'Sitewide Score: ';
        echo $subject['sitewide_score'];
        echo '<br>';
        echo '</p>';
        
        #get scores array
        $id = $subject['artwork_id'];
        $sql = "SELECT scores FROM rating WHERE artwork_id= ";
        $sql .= $id;
        $sql .= ";";
        
        $result = mysqli_query($connection, $sql);
        $scores_array = mysqli_fetch_row($result);
        $scores_json = $scores_array[0];
        $scores = json_decode($scores_json, true);
        
        echo '<p> Aggregate Score:';
        echo $scores['aggregate'];
        echo '</p>';
        #display scores
        echo '<br>';
        echo '<form action="submitScores.php" method="post" target="empty">';
        echo '<label for="subject">Subject:</label>';
        echo '<input type="number" id="subject" name="subject" min="0" max="10" value="';
        echo $scores['subject'];
        echo '">';
        echo '<label for="color">Color:</label>';
        echo '<input type="number" id="color" name="color" min="0" max="10" value="';
        echo $scores['color'];
        echo '">';
        echo '<label for="composition">Composition:</label>';
        echo '<input type="number" id="composition" name="composition" min="0" max="10" value="';
        echo $scores['composition'];
        echo '">';
        echo '<label for="marks">Mark-making:</label>';
        echo '<input type="number" id="markmaking" name="markmaking" min="0" max="10" value="';
        echo $scores['markmaking'];
        echo '">';
        echo '<label for="shape">Shape:</label>';
        echo '<input type="number" id="shape" name="shape" min="0" max="10" value="';
        echo $scores['shape'];
        echo '">';
        echo '<br><br>';
        echo '<input type="hidden" id="artwork_id" name="artwork_id" value="';
        echo $id;
        echo '">';
        echo '<input type="submit" id="submitScores" value="Submit Scores">';
        echo '</form>';
        ?>
        <iframe name = "empty" style="display:none">
        </iframe>
        <!-- later i will code a function to calculate the user score from the average of the above scores -->
        <div>
    </body>
</html>
