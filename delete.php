<?php
session_start();
include 'core/Questions.php';

$question = new Questions();

if(!isset($_GET['qid'])){
    echo "invalid request";
}
$question->delete(($_GET['qid']));
header("location: index.php");

?>



