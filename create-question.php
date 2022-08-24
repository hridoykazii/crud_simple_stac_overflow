<?php
session_start();
include 'doc_start.php';
include 'header.php';
include 'core/Questions.php';

$question = new Questions();

if(!isset($_SESSION['user_id'])){
    header("location:login.php");
}

?>

<br>
<br>
<!-- Contact Section-->
<section class="page-section" id="contact">
    <div class="container">
        <?php
            if(isset($_POST['submit'])){
                
                $question->addQuestion($_POST['title'],$_POST['details'],$_SESSION['user_id']);
            }
        ?>
        <form class="form-group" action="" method="POST" >
            <input class="form-control mb-4" type="text" placeholder="Question Subject" name="title">

            <textarea class="form-control" type="text" id="questionData" name="details"></textarea>

            <input class="form-group btn btn-primary" type="submit" name="submit" value="Add Question">
        </form> 
    </div>
</section>

<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
      tinymce.init({
        selector: '#questionData'
      });
    </script>
<?php
include 'doc_end.php';
include 'footer.php';

?>