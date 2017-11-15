<?php 
    require_once 'controller.php';
    require_once '../models/Student_Course_Model.php';
    require_once '../data/bl.php';
    require_once '../common/validation.php';
    
    

    class S_C_Controller extends Controller {
        private $db;
        private $model;
        private $validation;        
        private $table_name = "student_course";
        private $classneame = "S_C_Controller";
        

        function __construct($param) {
            $this->db = new BL();
            $this->validation = new validation;       
            $this->model = new Student_CourseModel($param);
          
            
        }
        

        // Creates a new line in a table
        function UpdateTable($param) {
            $courses = $this->model->getc_id();
            for($i=0; $i<count($courses); $i++) {
            $updateValues= "c_id =  '".$courses[i]."', description = '" .$this->model->getdescription(). "', image = '". $this->model->getimage()."'";
            $update =  $this->db->update_table($this->table_name, $this->model->getId(), $updateValues);
            return $this->checkIsWasGood($update);
            }
        }
                   
                
        
        // Creates a new line in a table
        function CreateNewRow($param) {
            $rows = $this->model->getRows();
            $sql_data = $this->CreateRow($rows, $this->model);
            $update = $this->db->create_new_row($this->table_name, $sql_data[0], $sql_data[1],  $sql_data[2]);
            return $this->checkIsWasGood($update);
       
        }



        // Updates a line in directos table
        function ReturnSelect() {
            $List =  $this->db->SelectAllFromTable($this->table_name, $this->classneame);
            $CourseSelect="<option value='Select a Course'>Select a Course</option>";
                for ($i = 0; $i < count($List); $i++) {
                $CourseSelect .= "<option value=" . $List[$i]["id"] . ">" . $List[$i]["name"] . "</option>";
                }
        
            return $CourseSelect; 
        }
    


        // Selects all from Courses table and returns a object array
        function getAllCourses() {
            $getall = $this->db->SelectAllFromTable($this->table_name, $this->classneame);
            $allCourses = array();            
            for($i=0; $i<count($getall); $i++) {
                $c = new CourseModel($getall[$i]);
                array_push($allCourses, $c->jsonSerialize());
            }
            return $allCourses;   
        }



        // Checks if a id exists
         function getCourseById($param){
                if($this->model->getId() != 'null' || $this->model->getId() != 'NaN'){
                $check =  $this->db->Check_if_id_exists($this->table_name, $c->getId());
                return $this->checkIsWasGood($check);
                }else{
                    return false;
                }

            }




        // Deletes a line from Courses table
        function DeleteCourseById($param) {
                if($this->model->getc_id() != false){
                $deleted =  $this->db->DeleteRow($this->table_name, $c->getc_id());
                return $this->checkIsWasGood($deleted);
                }else{
                    return false;
                }

    
        }
        

        // Deletes a line from Courses table
        function DeleteCourseByRowName($param) {
            if($this->model->getc_id() != false){
            $deleted =  $this->db->DeleteRowbyRowName($this->table_name, 'c_id', $this->model->getc_id(), 's_id', $this->model->gets_id());
            return $this->checkIsWasGood($deleted);
            }else{
                return false;
            }


    }


        // Updates a line in directos table
        function UpdateById($param) {
                if($this->model->getId() != false || $this->model->getId() != false){
                    if($this->model->getName() != false) {
                        $updateValues= "name =  '".$this->model->getName()."', description = '" .$this->model->getdescription(). "', image = '". $this->model->getimage()."'";
                        $update =  $this->db->update_table($this->table_name, $this->model->getId(), $updateValues);
                    return $this->checkIsWasGood($update);
                }else{
                    return false;
                }
            }

        }


        

 
        // function getCoursesInnerJoin($param) {
        //     $innerJoinCourses = array();

        //     $selected_rows = "course.name, course.image";
        //     $table2 = 'student';
        //     $table3 = 'student_course';
        //     $Column_equal_to = 'course.id = student_course.c_id';
        //     $Column_equal_to2 = 'student.id = student_course.s_id';
        //     $where = 'student.id = ' . $param["id"];
            

        //     $getall = $this->db->innerJoin3table($selected_rows, $this->table_name, $table2, $table3, $Column_equal_to, $Column_equal_to2, $where);
        //     for($i=0; $i<count($getall); $i++) {
        //         $c = new CourseModel($getall[$i]);
        //         array_push($innerJoinCourses, $c->jsonSerialize());
        //     }
        //     return $innerJoinCourses;   
        // }
        

// SELECT course.name, course.image
// FROM course
// INNER JOIN student_course ON course.id = student_course.c_id
// INNER JOIN student ON student.id = student_course.s_id


// SELECT course.name, course.image
// FROM course
// INNER JOIN student_course ON course.id = student_course.c_id
// INNER JOIN student ON student.id = student_course.s_id
// WHERE student.id = 5



}



