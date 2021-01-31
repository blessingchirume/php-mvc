<?php

class ModelConnect
{

    public function Create($tbl)
    {
        $data           = json_decode(@file_get_contents('php://input'), true);
        $resp           = json_encode($data);
        $my             = json_decode($resp, true);
        $columns        = implode("`,`", array_keys($my));
        $values         = implode("','", array_values($my));
        $mysqli         = Connect::DATA_CONNECTION();

        $sql        = "insert into $tbl (`$columns`) values ('$values')";

        if ($result = $mysqli->query($sql)) {
            echo json_encode($result);
        } else {
            echo json_encode($mysqli->error, true);
        }
    }

    public function Delete($tbl)
    {
        //$data = array('id'=>'93');
        $data           = json_decode(@file_get_contents('php://input'), true);
        $resp           = json_encode($data);
        $my             = json_decode($resp, true);
        $columns        = implode("`,`", array_keys($my));
        $values         = implode("','", array_values($my));
        $mysqli         = Connect::DATA_CONNECTION();

        $sql = "DELETE FROM $tbl WHERE ".$columns."=".$values."";
        
        if ($result = $mysqli->query($sql)) {
            echo json_encode($result);
        } else {
            echo json_encode($mysqli->error, true);
        }
    }

    public function Find($tbl)
    {
        $mysqli            = Connect::DATA_CONNECTION();
        $count             = 0;

        $sql = "SELECT * FROM $tbl";

        if ($result = $mysqli->query($sql)) {
            while ($row = $result->fetch_assoc()) {
                $data[$count] = $row;
                $count++;
            }

            echo json_encode($data);
        } else {
            echo json_encode($mysqli->error);
        }
    }

    public function getCount($tbl)
    {
        $mysqli = Connect::DATA_CONNECTION();
        if ($mysqli) {
            $sql = "select * from $tbl";

            if ($result = $mysqli->query($sql)) {
                echo $result->num_rows;
            } else {
                echo json_encode($mysqli->error);
            }
        }
    }
}
