<?php

    class Visitors extends ModelConnect
    {
        public function index()
        {
            //echo "visitors/index";
        }

        public function getAllVisitorsCount()
        {
            $mysqli = new mysqli('localhost', 'root', '', 'foundation');
            $data   = [];
            $count  = 0;

            if($mysqli)
            {
                $sql = "select * from visitors";

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

        public function viewAllVisitors()
        {
            $mysqli = new mysqli('localhost', 'root', '', 'foundation');
            $data   = [];
            $count  = 0;

            if($mysqli)
            {
                $sql = "select * from visitors";

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

        public function AddNewVisitor()
        {
            $this->Create('visitors');
        }
    }

    

?>