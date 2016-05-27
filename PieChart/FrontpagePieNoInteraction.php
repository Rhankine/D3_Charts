<?php
    session_start();
    if(isset($_GET['pushed'])){
        $date = new DateTime();
        $_SESSION['filename'] = "./../log/pie".$date->getTimestamp().".csv";
        $fn = $_SESSION['filename'];
        $content = "LineID,Smallest Datapoint,Percent,Extend,Strategy,Liked,Improvement,Comments,age,education,Country,UserId\n";
        $LogFile = fopen($fn, 'a') or die("Unable to open file");
        fwrite($LogFile, $content);
        fclose($LogFile);
        $_SESSION['did'] = 0;
        header('Location: ./PieChartNoInteraction.php');    
    }
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="./PieChart.css">
    <script src="//d3js.org/d3.v3.min.js" charset="utf-8"></script>
    <title>Page Title</title>
</head>
<body>
    <h1>No interaction</h1>
    <p>In the next 15 tasks, you will be presented with a line chart, like the one bellow. This line chart has no possibility of interacting. The judgement of this will only be by the basic appearance.
    </p>
    <p>
        <input type='hidden' value='test' id='h_v' class='h_v'>
        <script src="./PieChartNoInteraction.js"></script>
        Below this, you will see the two questions. <br />
        The first one "Which pie is smaller?". 
        To this question, please click the button you believe is correct.<br />
        The second question "How many percent is the smaller in size of the bigger?", is asking you to judge, 
        how many percent of the bigger pie, the smaller will fill.<br />
        When you have filled in the two question, please click submit, and you will be taken to the next task.
    </p>
    <p>
        The time spent completing a task will be logged. Please do focus on the tasks while performing them. 
        But do not hurry, I seek to log a time as realistic as possible.<br />
        Please be aware that there will appear some easy questions, to verify that you pay attention. You will not be payed if you do not correctly answers these. 
    </p>
    
    <form method="get">
        <input type="hidden" name="pushed" value="is" />
        <input type="submit" id="btnSubmit" value="Continue" />
    </form>
</body>