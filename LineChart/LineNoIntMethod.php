<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="./LineChart.css">
    <script src="//d3js.org/d3.v3.min.js" charset="utf-8"></script>
</head>
<body>

<?php
    session_start();
    $fn = $_SESSION['filename'];
    $did = 1;
    if(isset($_POST['submit'])) {
        $extend = $_POST['extend'];
        $strategy = $_POST['strategy'];
        $liked = $_POST['liked'];
        $improvement = $_POST['improvement'];
        $comments = $_POST['comments'];
        $content = "LinechartNoInteractionMethod,,,$extend,$strategy,$liked,$improvement,$comments,,,,$fn\n";
        
        $BarFile = fopen($fn, 'a') or die("Unable to open file");
        fwrite($BarFile, $content);
        fclose($BarFile);
        $studyno = $_SESSION['studyno'];
        if($studyno = '1'){
            header('Location: ./FrontpageLineFilter.php');            
        }
        else {
            header('Location: ./ThankYou.php');
        }
    }
    echo("<input type='hidden' value='".$did."' id='h_v' class='h_v'>");
?>
    
    
<script src="./LineChartNoInteraction.js"></script>
<br /><br /><br /><br />

<form action='' method='post'>
    <table cellpadding="10">
        <tr>
            <td valign="top">
                Please descripe how you solved the tasks.
            </td>
            <td>
                <textarea name="strategy" rows="5" cols="30" required></textarea>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <input type='submit' name='submit' value='Submit'>
            </td>
        </tr>
    </table>
</form>
</body>