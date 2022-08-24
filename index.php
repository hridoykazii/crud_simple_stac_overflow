<?php
session_start();
include 'doc_start.php';
include 'header.php';
include 'core/mainPage.php';

$main = new mainPage();

$res = $main->getAllQuestion();

?>
<br>
<br>
<br>
<section class="p-5">
    <div class="container">
        <div class="row">
            <div class="col-12 border border-primary justify-content-center">
                <?php
                    foreach($res as $qa):
                ?>
                <div class="row">
                    <div class="col-4 border border-danger">
                        <h3><?= $qa['answer_count'];?></h3><hr>
                        <h3>Answers</h3>
                    </div>
                    <div class="col-8 border border-secondary">
                       <a href="question-details.php?qid=<?= $qa['id'];?>"><?= $qa['title'];?></a><br>
                       <?php
                            if(isset($_SESSION['user_id'])&& $_SESSION['user_id'] == $qa['q_user_id']):
                       ?>
                       <a href="edit.php?qid=<?= $qa['id'];?>">Edit</a> 
                       <a style="color:red" onclick="return confirm('are you sure?')" href="delete.php?qid=<?= $qa['id'];?>">Delete</a> 

                       <?php endif;?>
                    </div>
                </div>
                <?php 
                    endforeach;
                ?>
            </div>
        </div>
    </div>
</section>
<?php
include 'doc_end.php';
include 'footer.php';

?>