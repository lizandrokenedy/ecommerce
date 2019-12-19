<?php

namespace Hcode\Model;

use Exception;
use Hcode\DB\Sql;
use Hcode\Model;

class Notification extends Model
{


    public function save()
    {

        $sql = new Sql();

        return $sql->query("INSERT INTO tb_notifications (idorder) VALUES (:idorder)", array(
            ":idorder" => $this->getidorder()
        ));

        // $this->setData($results[0]);

    }

    public static function getAll()
    {

        $sql = new Sql();

        return $sql->select("SELECT * FROM tb_notifications WHERE dt_visualization is null");

        // $this->setData($results);

    }

    public static function updateVisualizationNotification($idorder)
    {

        $sql = new Sql();

        return $sql->query("UPDATE tb_notifications SET dt_visualization = :dt_visualization WHERE dt_visualization IS NULL AND idorder = :idorder", array(
            ":dt_visualization" => date("Y-m-d H:i:s"),
            ":idorder" => $idorder
        ));
    }
}
