<?php
// Set Timezone
date_default_timezone_set("Asia/Dhaka");

// Current Date and Time
echo date('Y-m-d H:i:s');
echo "<br/>";
echo date_default_timezone_get();
echo "<br/>";

// Convert timezone
$date = new DateTime("now", new DateTimeZone("Asia/Dhaka"));
$date->setTimezone(new DateTimeZone("UTC"));

echo $date->format("Y-m-d H:i:s");

// Get difference between two dates and times
echo "<br/>";
$d1 = new DateTime("2025-12-24 10:00:00");
$d2 = new DateTime("2025-12-26 15:30:00");

$diff = $d1->diff($d2);

echo "Days: " . $diff->days . "<br>";
echo "Hours: " . $diff->h . "<br>";
echo "Minutes: " . $diff->i . "<br>";
echo $diff->format('%d days, %h hours, %i minutes<br/>');

$t1 = strtotime("2025-12-24 10:00:00");
$t2 = strtotime("2025-12-24 12:30:00");

$seconds = $t2 - $t1;
$minutes = $seconds / 60;
$hours   = $seconds / 3600;

echo "Seconds: $seconds<br>";
echo "Minutes: $minutes<br>";
echo "Hours: $hours<br>";

/**
 * ✔ Use DateTime + DateTimeZone
 * ❌ Avoid manual math with timestamps when timezones are involved
 */