<!DOCTYPE html>
<html>
<head>
<title>Question and Answer</title>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<style>
    
</style>
</head>   
<body>

<h1 style="font-size:20px;text-align:center;">Questions List</h1>
<div class="container">
    <div class="row">
        
           <?php
           // Database connection
           $servername = "localhost";
           $username = "root";
           $password = "";
           $dbname = "fattygrades";

           $conn = new mysqli($servername, $username, $password, $dbname);

           if ($conn->connect_error) {
               die("Connection failed: " . $conn->connect_error);
           }

           // Fetch questions from the database
           $sql = "SELECT * FROM tbl_questions"; // Assuming your table is named tbl_questions

           $result = $conn->query($sql);

           if ($result->num_rows > 0) {
               while ($row = $result->fetch_assoc()) {
                   $questionId = $row['id']; // Get the question ID
                   $questionText = $row['question_text'];
                   $answerText = $row['answer_text'];
                   echo '<div class="col-md-4">';
                   echo '<div class="question" style="border: 2px solid #eee;border-radius:5px;padding:5px 10px;margin-bottom:10px;">';
                   echo '<p style="font-size:15px;">' . $questionText . '</p>';
                   echo '<a href="answer.php?id=' . $questionId . '" style="text-decoration:none;font-size:15px;background-color:#0099cc;color:#fff;padding: 5px 15px;border-radius:5px;margin-bottom:10px;">View Answer</a>';
                   echo '<br>';
                   echo '</div>';
                   echo '</div>';
               }
           } else {
               echo "No questions found.";
           }

           $conn->close();
           ?>
      
    </div>
</div>

</body>
</html>
