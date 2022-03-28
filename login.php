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
            .LogInContainer{
                background-color:black;
                width: 250px;
                height: 250px;
                margin: 0 auto;
                position: relative;
                text-align: center;
            }
            .LogInForm{
                color: white;
                padding: 25%;
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
        <div class="LogInContainer">
            <div class="LogInForm">
            <iframe name = "empty" style="display:none">
            </iframe>
            <form action="/CSC680PRJ/validatePassword.php" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username"><br><br>
            <label for="password">Password:</label>
            <input type="text" id="password" name="password"><br><br>
            <button type="submit" id="LogInButton">Log In</button>
            </form>
            </div>
        </div>
    </body>
</html>
