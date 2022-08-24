<?php
    include 'Database.php';
    class Questions extends Database{
        
        public function addQuestion($title,$details,$user_id){
            print_r($details);
            $query= "INSERT INTO questions (title,details,user_id) VALUES ('$title','$details','$user_id')";
            $this->dataWrite($query);
        }
        // Get Question

        public function getOneQuestion($qid){
            $query = "SELECT * FROM questions WHERE id=$qid";
            return $this-> dataFetch($query);
        }

        //Make Answer
        
        public function makeAnswer($q_id,$user_id,$details){
            $query = "INSERT INTO answers (question_id,user_id,details) VALUES ('$q_id','$user_id','$details')";
            $this->dataWrite($query);
        }

        //Show Answer

        public function getOneQuestionAnswers($q_id){
            $query = "SELECT * FROM answers JOIN users ON users.id = answers.user_id WHERE question_id='$q_id'";
            return $this->dataFetch($query);
        }

        //Edit Question

        public function editQuestion($qid,$title,$details){
            $query ="UPDATE questions SET title='$title', details='$details' WHERE id = '$qid'";
            $this->dataWrite($query);
        }

        //Delete Question 

        public function delete($qid){
            $query = "DELETE FROM questions WHERE id='$qid'";
            $this->dataWrite($query);
        }
    }

?>