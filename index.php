<?php

error_reporting(0);
include 'functions.php';

// Connect to MySQL
$conn = connect_mysql();

        // MySQL query that selects all the poll answers
        $result = mysqli_query($conn, 'SELECT * FROM poll_answers');
        
        // If the user clicked the "Vote" button
        if (isset($_POST['submit'])){ 
    
            $q1 = 'SELECT votes FROM poll_answers WHERE id = '.$_POST["voteid"];
            $res = mysqli_query($conn, $q1);
            $row=mysqli_fetch_assoc($res);
            $new = $row["votes"]+1;
            $q2 = 'UPDATE poll_answers SET votes ='.$new.' WHERE id = '.$_POST["voteid"];
            
            // Update and increase the vote for the answer the user voted for
            $conn->query($q2);

            // Redirect user to the result page
            header ('Location: result.php');
            exit;
       }
?>

<?=template_header('Polling App')?>

<div class="content poll-vote">
    <h2>Who is you favourite author?</h2>
    <form action="" method="post">
   <?php 
   while($row = $result->fetch_assoc()){
    echo "<label>";
    echo "<input type='radio' value=".$row['id']." name='voteid'>";
    echo $row['title'];
    echo "</label>";
   }
?>
        <div>
            <input type="submit" name="submit" value="Vote">
            <a href="result.php">View Result</a>
        </div>
    </form>
</div>

<?=template_footer()
?>