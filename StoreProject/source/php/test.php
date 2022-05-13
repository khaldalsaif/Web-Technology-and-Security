<?php
$email= "sayeghsm@gmail.com";
if (filter_var($email, FILTER_VALIDATE_EMAIL)==0)
        {
            echo "Enter a valid email ";


        }
else
{
echo "messege succesfuly";

}
?>