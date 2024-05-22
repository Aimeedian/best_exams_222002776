<?php
// Check if the 'query' GET parameter is set and not empty
if (isset($_GET['query']) && !empty($_GET['query'])) {
    // Include database connection details
    include('db_connection.php');


    // Sanitize input to prevent SQL injection
    $searchTerm = $conn->real_escape_string($_GET['query']);

    // Queries for different tables
    $queries = [
        'comments' => "SELECT * FROM comments WHERE CommentID LIKE '%$searchTerm%'",
        'courses' => "SELECT * FROM courses WHERE CourseID LIKE '%$searchTerm%'",
        'certificate' => "SELECT * FROM certificates WHERE CertificateID LIKE '%$searchTerm%'",
        'quizes' => "SELECT * FROM quizes WHERE QuizID LIKE '%$searchTerm%'",
        'enrollments' => "SELECT * FROM enrollments WHERE EnrollmentID LIKE '%$searchTerm%'",
        'lessons' => "SELECT * FROM lessons WHERE LessonTitle LIKE '%$searchTerm%'",
        'userprogresses' => "SELECT * FROM userprogresses WHERE ProgressID LIKE '%$searchTerm%'",
        'instructors' => "SELECT * FROM instructors WHERE InstructorID LIKE '%$searchTerm%'",
        'investment_planning_resources' => "SELECT * FROM investment_planning_resources WHERE ResourceID LIKE '%$searchTerm%'"
    ];

    // Output search results
    echo "<h2><u>Search Results:</u></h2>";

    foreach ($queries as $table => $sql) {
        $result = $conn->query($sql);
        echo "<h3>Table of $table:</h3>";
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Displaying first field of the row
                echo "<p>" . $row[array_keys($row)[0]] . "</p>";
            }
        } else {
            echo "<p>No results found in $table matching the search term: '$searchTerm'</p>";
        }
    }

    // Close the database connection
    $conn->close();
} else {
    echo "<p>No search term was provided.</p>";
}
?>
<a href="home.html" style="background-color:darkred;border-radius: 15px; color: white;margin-left: 300px;padding: 10px;margin-top: 10px;">back on home</a>