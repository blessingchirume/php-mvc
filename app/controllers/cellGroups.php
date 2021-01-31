<?php

    class cellGroups extends Controller
    {
        public function getAllcellGroupsCount()
        {
            $mysqli = new mysqli('localhost', 'root', '', 'foundation');
            $data   = [];
            $count  = 0;

            if($mysqli)
            {
                $sql = "select * from cell_groups";

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

        public function viewAllcellGroups()
        {
            $mysqli = new mysqli('localhost', 'root', '', 'foundation');
            $data   = [];
            $count  = 0;

            if($mysqli)
            {
                $sql = "select * from cell_groups";

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