<?php
// Get the current day and time
$currentDay = date('l');
$currentHour = date('H');

// Define the available days and time slots
$days = ['Wednesday', 'Thursday', 'Friday'];
$timeSlots = ['10:00-13:00', '13:00-16:00', '16:00-19:00'];

// Determine which day and time slot to disable
$disabledDay = $currentDay;
$disabledTimeSlots = [];

if ($currentHour >= 19) {
    // If the current hour is 19 or later, disable all time slots
    $disabledTimeSlots = $timeSlots;
} else {
    // Disable the time slots before the current time
    foreach ($timeSlots as $timeSlot) {
        $timeRange = explode('-', $timeSlot);
        $startTime = explode(':', $timeRange[0])[0];

        if ($startTime <= $currentHour) {
            $disabledTimeSlots[] = $timeSlot;
        }
    }
}
?>

<!-- Display radio buttons for days -->
<p>Choose a day:</p>
<input type="radio" name="day" value="Wednesday" <?php if ($disabledDay === 'Wednesday') echo 'disabled'; ?>> Wednesday<br>
<input type="radio" name="day" value="Thursday" <?php if ($disabledDay === 'Thursday') echo 'disabled'; ?>> Thursday<br>
<input type="radio" name="day" value="Friday" <?php if ($disabledDay === 'Friday') echo 'disabled'; ?>> Friday<br>

<!-- Display radio buttons for time slots -->
<p>Choose a time slot:</p>
<input type="radio" name="time_slot" value="10:00-13:00" <?php if (in_array("10:00-13:00", $disabledTimeSlots)) echo 'disabled'; ?>> 10:00-13:00<br>
<input type="radio" name="time_slot" value="13:00-16:00" <?php if (in_array("13:00-16:00", $disabledTimeSlots)) echo 'disabled'; ?>> 13:00-16:00<br>
<input type="radio" name="time_slot" value="16:00-19:00" <?php if (in_array("16:00-19:00", $disabledTimeSlots)) echo 'disabled'; ?>> 16:00-19:00<br>
