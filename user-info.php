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
    .big-title{
        font-weight:700;
    }
    .title{
        font-weight: 600;
    }

    span{
        font-weight:normal;
    }
</style>

<body>

<div id="content">
    <div class="row">
        <!-- User information -->
        <div class="col-md-12">
            <h3 class="big-title">User Information</h3>
        </div>
        <div class="col-md-6">
            <p class="title">Name : <span id ="user-name"></span></p>
        </div>
        <div class="col-md-6">
            <p class="title">Username : <span id ="user-username"></span></p>
        </div>
        <div class="col-md-6">
            <p class="title">Email : <span id ="user-email"></span></p>
        </div>
        <div class="col-md-6">
            <p class="title">Phone : <span id ="user-phone"></span></p>
        </div>
        <div class="col-md-6">
            <p class="title">Website : <span id ="user-website"></span></p>
        </div>

        <!-- User address -->
        <div class="col-md-12">
            <h3 class="big-title">User Address</h3>
        </div>
        <div class="col-md-6">
            <p class="title">Street: <span class id ="user-street"></span></p>
        </div>
        <div class="col-md-6">
            <p class="title">Suite : <span class id ="user-suite"></span></p>
        </div>
        <div class="col-md-6">
            <p class="title">City : <span class id ="user-city"></span></p>
        </div>
        <div class="col-md-6">
            <p class="title">Zipcode : <span class id ="user-zipcode"></span></p>
        </div>
        <div class="col-md-6">
            <p class="title">Geo Lat : <span class id ="user-lat"></span></p>
        </div>
        <div class="col-md-6">
            <p class="title">Geo Lng : <span class id ="user-lng"></span></p>
        </div>

        <!-- User Company -->
        <div class="col-md-12">
            <h3 class="big-title">User Company</h3>
        </div>
        <div class="col-md-6">
            <p class="title">Company Name : <span class id ="user-companyName"></span></p>
        </div>
        <div class="col-md-6">
            <p class="title">Company Catch Phrase : <span class id ="user-companyCp"></span></p>
        </div>
        <div class="col-md-6">
            <p class="title">Company Business Stradegy : <span class id ="user-companyBs"></span></p>
        </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div style="padding:50px 0">
                <button type="button" value="Refresh" class="btn btn-info btn-lg"onClick="window.location.reload()"> Back </button>
            </div> 
        </div>
    </div>
</div>


<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<!-- Custom css for user info -->
<script type="text/javascript">
   $(document).ready(function(){
        var url = localStorage.getItem("user_info");
        var result;

        $.ajax({
            url:url,
            type: 'GET',
            dataType: 'json',
            success: function(data)
            {
                console.log(data);

                var user_id = data.id;
                var user_name = data.name;
                var user_username = data.username;
                var user_email = data.email;
                var user_street = data.address.street;
                var user_suite = data.address.suite;
                var user_city = data.address.city;
                var user_zipcode = data.address.zipcode;
                var user_lat = data.address.geo.lat;
                var user_lng = data.address.geo.lng;
                var user_phone = data.phone;
                var user_website = data.website;
                var user_cname = data.company.name;
                var user_ccatchphrase = data.company.catchPhrase;
                var user_cbs = data.company.bs;

                document.getElementById("user-name").innerHTML = user_name;
                document.getElementById("user-username").innerHTML = user_username;
                document.getElementById("user-email").innerHTML = user_email;
                document.getElementById("user-street").innerHTML = user_street;
                document.getElementById("user-suite").innerHTML = user_suite;
                document.getElementById("user-city").innerHTML = user_city;
                document.getElementById("user-zipcode").innerHTML = user_zipcode;
                document.getElementById("user-lat").innerHTML = user_lat;
                document.getElementById("user-lng").innerHTML = user_lng;
                document.getElementById("user-phone").innerHTML = user_phone;
                document.getElementById("user-email").innerHTML = user_email;
                document.getElementById("user-website").innerHTML = user_website;
                document.getElementById("user-companyName").innerHTML = user_cname;
                document.getElementById("user-companyCp").innerHTML = user_ccatchphrase;
                document.getElementById("user-companyBs").innerHTML = user_cbs;
            }
        });
   });
</script>
</body>
</html>