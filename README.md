# Custom-Endpoint
I will be explaining about the Task requirement first. Followby, the composer support.
The Custom endpoint of the user data url : /wp-json/myplugin/v1/users

## Code Requirement
### 1. custom-endpoint.php 
* For the first requirement, i have added the add_action('rest_api_init') function with the function of wl_users.
* In the Wl_users function, i first save the jsonplaceholder url to an variable with the arguement to GET. i will be only needing the body which is the data and save it under a variable.
* After much research, i figure it is best to use the session to save the data array for my other page (user-table.php) to show the all the users info. 
* As wordpress does not have a built in session , i have downloaded a php plugin (The plugin is called WP Session Manager) in wordpress.
* To display the users information, i decided to display it into the dashboard or the admin page of Wordpress.

### 2. user-table.php
* As i was using session to store the data array in the custom-endpoint.php.
* In this file, i will be using bootstrap 4 as my framework. This page is just showing the data array from the jsonplaceholder api into a table.
* When User click any name/id/username, there will be a no loading page which is done by using contain.load.

### 3. user-info.php
* This page will display all of the information from the jsonplaceholder users api and i have added a back button (which is actually a fresh function) to go back to the table.

## Composer Support
As required, i have added a composer support by adding a composer.json.

## Automated Testing (incomplete)
I have install the brain monkey and phpunit and tried to do my own testing but it is incomplete and have tons of errors.