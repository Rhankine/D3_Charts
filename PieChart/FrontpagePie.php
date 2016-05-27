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
        header('Location: ./PieChart.php');    
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
    <h1>Welcome to this user perception study.</h1>
    <p>In this study you will meet 15 pages, each with a pie chart and 2 question. It will take you about 10-15 minutes to complete.<br />
        You will be asked to compare 2 of the pies in the pie chart and tell, how big - in percent - the smaller pie is of the bigger.<br />
        You will have the possibility of using some sort of interaction, which will be explained later.
    </p>
    <p>
        Each of the 15 pages will have a chart like the one below.<br />
        <input type='hidden' value='test' id='h_v' class='h_v'>
        <script src="./PieChart.js"></script>
        Just below the chart, there are two buttons: left and right. These will rotate the pie counterclockwise 
        and clockwise respectively. You can try this on the chart below before you continue.<br />
        It is your choice if you want to use the interaction or not.<br /><br />
        Below this, you will see the two questions. <br />
        The first one "Which pie is smaller?". 
        To this question, please click the button you believe is correct.<br />
        The second question "How many percent is the smaller in size of the bigger?", is asking you to judge, 
        how many percent of the bigger pie, the smaller will fill.<br />
        When you have filled in the two question, please click submit, and you will be taken to the next task.
    </p>
    <p>
        The time spent completing a task will be logged. Please do focus on the tasks while performing them. 
        But do not hurry, I seek to log a time as realistic as possible.    
    </p>
    
    <form method="get">
        <input type="hidden" name="pushed" value="is" />
        <input type="submit" id="btnSubmit" value="Continue" />
    </form>
</body>