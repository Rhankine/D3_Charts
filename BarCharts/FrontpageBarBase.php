<?php
    session_start();
    if(isset($_GET['pushed'])){
        $date = new DateTime();
        $_SESSION['did'] = 0;
        header('Location: /BarCharts/BarChartBaseline.php');    
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Baseline</title>
</head>
<body>
    <h1>Baseline</h1>
    <p>In the next 15 tasks, you will be presented with a bar chart, like the one bellow. This bar chart has the interaction type baseline.
        <br />This means that you can hover the mouse over bar in the bar chart and make a horizontal line appear as a baseline for that bar (see image below).
    </p>
    <p>
        <img src="Base.jpg" border="5"><br />
        You will see the two questions. <br />
        The first one "Which datapoint is smaller?". 
        To this question, please click the button you believe is correct.<br />
        The second question "How many percent is the smaller in size of the bigger?", is asking you to judge, 
        how many percent the value of the smaller valued datapoint is of the bigger.<br />
        When you have filled in the two question, please click submit, and you will be taken to the next task.
    </p>
    <p>
        The time spent completing a task will be logged. Please do focus on the tasks while performing them. 
        But do not hurry, I seek to log a time as realistic as possible.    
    </p>
    <p>
        Please click continue when you are ready to start the tasks.
    </p>
    
    <form method="get">
        <input type="hidden" name="pushed" value="is" />
        <input type="submit" id="btnSubmit" value="Continue" />
    </form>
</body>