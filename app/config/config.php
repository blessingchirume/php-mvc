<?php
    class Connect
    {
        public function DATA_CONNECTION()
        {
            $DATA_CONNECTION = array(
                'DB_SERVER'=>'localhost',
                'DB_USER'=>'root',
                'DB_PWD'=>'',
                'DB_DATASET'=>'foundation'
            );
        
            $mysqli = new mysqli($DATA_CONNECTION['DB_SERVER'],
                                $DATA_CONNECTION['DB_USER'],
                                $DATA_CONNECTION['DB_PWD'],
                                $DATA_CONNECTION['DB_DATASET']
                                );

            if($mysqli)
            {
                return $mysqli;
            }

            else
            {
                return $mysqli->error;
            }
            
        }
    }
?>