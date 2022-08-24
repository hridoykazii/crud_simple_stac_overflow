<?php

include 'Database.php';
class mainPage extends Database{
    public function getAllQuestion(){
        $query = "SELECT questions.user_id as q_user_id, questions.title, questions.id, COUNT(answers.question_id) as answer_count from questions left join answers on questions.id=answers.question_id group by questions.id";

        return $this->dataFetch($query);
    }
}
?>

