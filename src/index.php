<?php
 header("Access-Control-Allow-Origin: *");

?>

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
        function getAccessTokenFromUrl() {
            var access_token = "";

            var href = window.location.href;

            if (href.indexOf('#') <= 0) {
                return access_token; // no tokens
            }

            href = href.substring(href.indexOf('#'));
            var href_parts = href.split("&");
            
            for (var i = 0; i < href_parts.length; i++) {
                var href_part = href_parts[i];
                if (href_part.startsWith("access_token=")) {
                    access_token = href_part.substring("access_token=".length);
                }
            }

            return access_token;
        }

        function getUserInfoFromAccessToken(access_token) {
            if (access_token == "") {
                return null;
            }

            $.ajax({
                url: "https://l08t2opoll.execute-api.us-east-1.amazonaws.com/api/getUser",
                beforeSend: function(xhr) {
                    xhr.setRequestHeader('access-token', access_token);
                },
                success: function(response) {
                    console.log(response);

                    user_info = JSON.parse(response);
                    console.log(user_info['userid']);
                    console.log(user_info['username']);

                    $("#welcome_user #username").text(user_info['username']);
                }
            });
        }

        $(document).ready(function() {
           var access_token = getAccessTokenFromUrl();

           var user_info = getUserInfoFromAccessToken(access_token);
        });
    </script>
</head>

<body>
    <?php
        include 'header.php';
    ?>
    
    <div class="page_width">
        <form action="#">
            <label for="paste box" style="font-weight:bold; font-size:28px; color:orange">Paste Box...</label><br><br>
            <textarea name="paste" id="paste" cols="100" rows="20" placeholder="Please paste here..."></textarea><br><br>
            <div class="page_width">
                <button type="button">Cancel</button>
                <button type="button">Upload</button>
                <button type="button">Add</button>
            </div>
        </form>
    </div>

    <?php
        include 'footer.php';
    ?>

</body>

</html>