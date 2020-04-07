<!DOCTYPE html>
<html lang="en">
<head>
    <title>Custom Plugin User</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>

<style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
  padding: 15px;
}
</style>

<body>



<div id="content">
    <h1>Display Users Table</h1>
    <?php
        session_start();
        $users = $_SESSION['users'];
        $data = json_decode($users);
    ?>
    <table style="width:100%" id="userTable">
        <thead>
            <tr style="background-color:#bfbdbd;">
                <th>ID</th>
                <th>Name</th> 
                <th>Username</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($data as $user){ 
                $individual_id = $user->id;
                $individual_name = $user->name;  
                $individual_username = $user->username;
            ?>
            <tr> 
                <td class="userId"><a href="#" id="user-info"><? echo $individual_id?></a></td>
                <td><a href="#" id="user-info"><? echo $individual_name?></a></td>
                <td><a href="#" id="user-info"><? echo $individual_username?></a></td>
            
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<!-- Custom css for user info -->
<script type="text/javascript">
   $(document).ready(function(){
       //user click on the id to get the id number for the fetch url to specific user id
        // $('.userId a').click(function(){
        //     var userId = $(this).text();
        //     fetch('https://jsonplaceholder.typicode.com/users/' + userId)
        //         .then(response => response.json())
        //         .then(json => console.log(json))
            
        //     let user_info = ('https://jsonplaceholder.typicode.com/users/' + userId);
        //     localStorage.setItem("textvalue",user_info);
        //     return false;
        // });

        $("#userTable").on("click", "tbody tr", function() {
            var userId = $(this).index()+1;
            let user_info = ('https://jsonplaceholder.typicode.com/users/' + userId);
            localStorage.setItem("user_info",user_info);
            return false;
        });
        var trigger = $('#userTable tbody tr td #user-info'),
            container = $('#content');

        trigger.on('click',function(){
            container.load('<?php echo plugins_url( "user-info.php", __FILE__ ); ?>');
        })
   });
</script>
</body>
</html>