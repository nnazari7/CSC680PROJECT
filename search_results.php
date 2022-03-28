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
        <p> Search Results </p>
        <table>
            <tr>
                <th> Title </th>
                <th> Site-wide Score </th>
            </tr>
        <?php
        #sample search results info
        
        
        $results = [
            [
                "title" => "The Last Shipwreck",
                "score" => 8.7
            ],
            [
                "title" => "Loguivy",
                "score" => 7.0
            ],
            [
                "title" => "Samois",
                "score" => 8.1
            ],
            [
                "title" => "Le port de Marseille",
                "score" => 7.8
            ],            
        ];
        foreach($results as $index){
                echo '<tr>';
                echo '<td>';
                echo $index['title'];
                echo '</td>';
                echo '<td>';
                echo $index['score'];
                echo '</td>';
                echo '</tr>';
        }
        ?>
        </table>
        <div>
    </body>
</html>
