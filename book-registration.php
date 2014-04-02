<?php 
include '/db.php';
db_connect('localhost', 'root', '', 'quizz');

$book_name = mysqli_real_escape_string($_POST['book_name']);
$book_author = mysqli_real_escape_string($_POST['book_author']);


?>