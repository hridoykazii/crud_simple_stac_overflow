<?php
session_start();
include 'doc_start.php';
include 'header.php';
include 'core/Questions.php';

if(!isset($_GET['qid'])){
    echo'invalid request';
}
$q_id = ($_GET['qid']);

$questionData = new Questions();
$answerData = new Questions();

$receive = $questionData->getOneQuestion($q_id);
$receive = $receive[0];

// echo"<pre><br><br><br>";
// print_r($receive);
// echo"</pre>";
?>
<br>
<br>
<br>
<div class="container">
    <div class="row">
        <div class="col-10 offset-1 mt-5">
            <div class="row">
                <div class="col-12">
                    <h2><?=$receive['title']?></h2>
                </div>
                <div class="col-12">
                <h2 class="mt-2 "><?=$receive['details']?></h2>
                </div>
            </div>
            <?php 
                if(isset($_SESSION['user_id'])):
            ?>
            <div class="row">
                <div class="col-12">
                    <h2 class="offset-4" style="color: red;">Answers Table</h2><hr>
                    <!-- Answer Show korba -->
                    <?php
                        $getAnswer = $questionData->getOneQuestionAnswers($receive['id']);
                    ?>
                    <?php foreach ($getAnswer as $resultAns):?>
                    <div class="row border border-sucess mb-3">
                        
                        <div class="col-8">
                            
                            <p><?= $resultAns['details']?></p>
                        </div>
                        <div class="col-4">
                            <p><?= $resultAns['username']?></p>
                        </div>

                    </div>
                    <?php endforeach; ?>
                    <!-- Answer Post korar jonno  -->
                    <?php
                        if(isset($_POST['submit'])) {
                            $answerData->makeAnswer($receive['id'],$_SESSION['user_id'],$_POST['answer']);
                            echo"Submited Your Answer";
                        }
                    ?>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                <form action="" method="POST">
                    <textarea name="answer" ></textarea><br>
                    <input type="submit" name="submit" value="Submit Answer">
                </form>
                </div>
            </div>
            <?php else: ?>
                <div class="row">
                    <div class="col-12">
                        <p>For this answer <a href="login.php">Login here!</a></p>
                    </div>
                </div>
            <?php endif;?>
        </div>
    </div>
</div>

<?php
include 'doc_end.php';
include 'footer.php';

?>