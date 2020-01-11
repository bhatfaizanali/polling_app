<?php

include 'functions.php';
error_reporting(0);

// Connect to MySQL
$conn = connect_mysql();

        // MySQL query that selects all the poll answers
        $result = mysqli_query($conn, 'SELECT * FROM poll_answers ORDER BY votes DESC');
        $re = mysqli_query($conn, 'SELECT * FROM poll_answers');


        // Total number of votes, will be used to calculate the percentage
        $total_votes = 0;
        foreach ($re as $poll_answer) {
           
            // Every poll answers votes will be added to total votes
            $total_votes += $poll_answer['votes'];
        }
    
?>

<?=template_header('Poll Results')?>

<div class="content poll-result">
    <div class="wrapper">
        <?php 
        $result = mysqli_query($conn, 'SELECT * FROM poll_answers ORDER BY votes DESC');
        while($row = $result->fetch_assoc()){

        echo'<div class="poll-question">';
            echo'<p>'.$row["title"].'<span>('.$row["votes"].'Votes)</span></p>';
            echo'<div class="result-bar" style= width:'.@round(($row["votes"]/$total_votes)*100).'%>';
                echo round(($row['votes']/$total_votes)*100)."%";
            echo '</div>';
        echo '</div>';
    }
        ?>
    </div>

</div>

<?=template_footer()
?>