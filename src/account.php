<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paste Board</title>
    <link href="app.css" rel="stylesheet" />

    <script src="js/jquery-3.6.0.min.js"></script>
    <script>
        function OnSignIn() {
            window.location = "https://yanlingchen-swdv691.auth.us-east-1.amazoncognito.com/login?client_id=6pahio95ne8tlpahstvt5i9hfk&response_type=token&scope=aws.cognito.signin.user.admin+email+openid+phone+profile&redirect_uri=https://localhost";

        }       
    </script>

</head>

<body>
    <?php
        include 'header.php';
    ?>

    <div class="page_width">
        <div class="center">
            <button type="button" onClick="OnSignIn()" style="width:auto;">Log In</button><br><br>
        </div>
        <div id="id01" class="login">
            <form class="login_form" action="/action_page.php" method="post">
                <div class="container">
                    <label for="email"><b>Email Address</b></label><br>
                    <input type="text" placeholder="Enter Email" name="email" required>
                    <br><br>

                    <label for="password"><b>Password</b></label><br>
                    <input type="password" placeholder="Enter Password" name="password" required>
                    <br><br>

                    <button type="submit" style="width:80%">Log In</button>
                </div>

                <div class="container" style="background-color:#f1f1f1">
                    <button type="button" onclick="document.getElementById('id01').style.display='none'">Cancel</button>

                </div>
            </form>
        </div>

        <div class="center">
            <button type="button">Sign Up</button>
        </div>
    </div>
    
    <?php
        include 'footer.php';
    ?>

</body>

</html>