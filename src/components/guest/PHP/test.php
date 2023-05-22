<html>
<head>
    <title>Date Picker</title>
    <style>
        .date-picker {
            font-family: Arial, sans-serif;
            width: 250px;
        }
        .date-picker label {
            display: block;
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
    <div class="date-picker">
        <form method="post" action="">
            <label for="selected_date">Select a date:</label>
            <input type="date" name="selected_date" id="selected_date" required min="<?php echo date('Y-m-d', strtotime('+1 day')); ?>">

            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>

<?php
// Check if a date is submitted
if (isset($_POST['selected_date'])) {
    $selectedDate = $_POST['selected_date'];

    // Check if the selected date is a Wednesday, Thursday, or Friday
    $selectedDayOfWeek = date('l', strtotime($selectedDate));
    if ($selectedDayOfWeek === 'Wednesday' || $selectedDayOfWeek === 'Thursday' || $selectedDayOfWeek === 'Friday') {
        echo "Selected Date: " . $selectedDate;
    } else {
        echo "Please select a date that falls on Wednesday, Thursday, or Friday.";
    }
}
?>
