<?php

$year = date('Y');
$month = date('m');

echo json_encode(array(

    array(
        'id' => 1,
        'title' => "GMAT Kit ", // Event Title
        'start' => "2015-01-14", // Event Start Date
        'url' => "#" // Event URL
    ),

    array(
        'id' => 2,
        'title' => "GMAT",
        'start' => "2015-01-16",
        'url' => "#"
    ),

    array(
        'id' => 3,
        'title' => "GMAT regular classes",
        'start' => "2015-01-17",
        'url' => "#"
    ),

    array(
        'id' => 4,
        'title' => "TOEFL",
        'start' => "2015-01-17",
        'url' => "#"
    ),

    array(
        'id' => 5,
        'title' => "GMAT Kit",
        'start' => "2015-01-21",
        'url' => "gmat.php"
    ),

    array(
        'id' => 5,
        'title' => "Said Business School",
        'start' => "2015-01-22",
        'url' => "school-event.php"
    ),
    
    array(
    'id' => 1, // Event specific ID
    'title' => "GMAT 800", // Event title
    'start' => "2015-01-23", // Event start day
    'url' => "gmat800.php" // Event URL
),

array(
    'id' => 1, // Event specific ID
    'title' => "GMAT Unlimited", // Event title
    'start' => "2015-01-24", // Event start day
    'url' => "gmatu.php" // Event URL
),


array(
    'id' => 1, // Event specific ID
    'title' => " TOEFL advanced ", // Event title
    'start' => "2015-01-24", // Event start day
    'url' => "toefl.php" // Event URL
),

array(
    'id' => 1, // Event specific ID
    'title' => "Vlerick Business School", // Event title
    'start' => "2015-01-27", // Event start day
    'url' => "school-event2.php" // Event URL
),

array(
    'id' => 1, // Event specific ID
    'title' => "Meet up 1-2-1 Business School", // Event title
    'start' => "2015-01-28", // Event start day
    'url' => "school-event3.php" // Event URL
),

array(
    'id' => 1, // Event specific ID
    'title' => "GMAT 800", // Event title
    'start' => "2015-01-30", // Event start day
    'url' => "gmat800-2.php" // Event URL
),

array(
    'id' => 1, // Event specific ID
    'title' => "GMAT regular classes", // Event title
    'start' => "2015-01-31", // Event start day
    'url' => "gmatu-2.php" // Event URL
),



array(
    'id' => 1, // Event specific ID
    'title' => "TOEFL advanced", // Event title
    'start' => "2015-01-31", // Event start day
    'url' => "toefl-2.php" // Event URL
),



));

?>