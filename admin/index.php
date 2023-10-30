<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Question and Answer</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h1>Add Question and Answer</h1>
        <form method="post" action="">
            <div class="form-group">
                <label for="question">Question:</label>
                <textarea class="form-control" id="question" name="question" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <label for="answer">Answer:</label>
                <textarea class="form-control" id="answer" name="answer" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>

        <?php
        // PHP script to insert data into the database
        if (isset($_POST['submit'])) {
            $question = $_POST['question'];
            $answer = $_POST['answer'];

            // Database connection and insertion code here
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "fattygrades";

            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "INSERT INTO tbl_questions (question_text, answer_text) VALUES ('$question', '$answer')";

            if ($conn->query($sql) === TRUE) {
                echo "<p class='text-success'>Question and answer have been added to the database.</p>";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            $conn->close();
        }
        ?>
    </div>

    <!-- Include Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
