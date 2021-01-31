<?php 

    class departments extends Controller
    {
        public function getAllDepartmentsCount()
        {
            $mysqli = new mysqli('localhost', 'root', '', 'foundation');
            $data   = [];
            $count  = 0;

            if($mysqli)
            {
                $sql = "select * from departments";

                if($result = $mysqli->query($sql))
                {
                    echo $result->num_rows;
                }

                else
                {
                    echo json_encode($mysqli->error);
                }
        
                                
            }
        }

        public function viewAllDepartments()
        {
            $mysqli = new mysqli('localhost', 'root', '', 'foundation');
            $data   = [];
            $count  = 0;

            if($mysqli)
            {
                $sql = "select * from departments";

                if($result = $mysqli->query($sql))
                {
                    while($row = $result->fetch_assoc())
                    {
                        $data[$count] = $row;
                        $count ++;
                    }

                    echo json_encode($data);
                }

                else
                {
                    echo json_encode($mysqli->error);
                }
        
                                
            }
        }
    }

?>