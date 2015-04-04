<?php

    $to = "clement.hadjeres@gmail.com;hubert@mbacentereurope.eu;mehdi@mbacentereurope.eu"; /*Your Email*/
    $date = date ("l, F jS, Y");
    $time = date ("h:i A");

    // retrieve variables from the form
    $page = isset($_REQUEST['page']) ? $_REQUEST['page'] : '';

    if ($page == "main")
    {
        $fullname= isset($_REQUEST['slider-name']) ? $_REQUEST['slider-name'] : '';
        $email = isset($_REQUEST['slider-email']) ? $_REQUEST['slider-email'] : '';
        $courses = isset($_REQUEST['slider-study-level']) ? $_REQUEST['slider-study-level'] : '';
        $phone = isset($_REQUEST['slider-phone']) ? $_REQUEST['slider-phone'] : '';

        // compose message
        $subject = "Messsage from the $page page"; /*Issue*/
        $msg="
            Name: $fullname
            Email: $email
            Courses: $courses
            Phone: $phone

            Message sent on: $date, hour: $time.\n";
    }
    else
    {
        $Email= isset($_REQUEST['Email']) ? $_REQUEST['Email'] : '';
        $firstName = isset($_REQUEST['Firstname']) ? $_REQUEST['Firstname'] : '';
        $lastName = isset($_REQUEST['Lastname']) ? $_REQUEST['Lastname'] : '';
        $country = isset($_REQUEST['Country']) ? $_REQUEST['Country'] : '';
        $Phone = isset($_REQUEST['Phone']) ? $_REQUEST['Phone'] : '';
        $courses = isset($_REQUEST['courses']) ? $_REQUEST['courses'] : '';

        $subject = "Messsage from the $page landing page"; /*Issue*/
        $msg="
        Name: $firstName $lastName
        Email: $Email
        Country: $country
        Courses: $courses
        Phone: $Phone

        Message sent on: $date, hour: $time.\n";
    }

    // send the mail
    if (mail($to, $subject, $msg, "From: $Email")) {
        include('thanks.php');
    }else{
        include('not.php');
    }
?>