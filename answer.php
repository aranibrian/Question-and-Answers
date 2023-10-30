<!DOCTYPE html>
<html>
<head>
    <title>Question and Answer</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <style>
        
        .answer-textarea {
        background: transparent;
        border: none;
        width: 100%;
        padding: 20px;
        color: #000; /* Text color */
        backdrop-filter: blur(5px); /* Adjust the blur intensity as needed */
        opacity:0.1;
    }
    </style>
</head>
<body>

<div class="container">
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

    // Check if a question ID is provided in the URL
    if (isset($_GET['id'])) {
        $questionId = $_GET['id'];

        // Fetch the question and answer based on the question ID
        $sql = "SELECT * FROM tbl_questions WHERE id = $questionId";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $questionText = $row['question_text'];
            $answerText = $row['answer_text'];

            echo '<div class="answer-container">';
            echo '<h2>Question:</h2>';
            echo '<p>' . $questionText . '</p>';
            echo '<h2>Answer:</h2>';
            echo '<textarea class="form-control answer-textarea" readonly>' . $answerText . '</textarea>';
            echo '</div>';
        } else {
            echo "Question not found.";
        }
    } else {
        echo "Question ID not provided.";
    }

    $conn->close();
    ?>
</div>

</body>
</html>
