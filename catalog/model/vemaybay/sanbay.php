<?php
class ModelVemaybaySanbay extends Model{
    public function getairporst()
        {
            $query = $this->db->query("SELECT DISTINCT * FROM " . DB_PREFIX . "airports order by AirportCode");

            return $query->rows;
        }

    }
?>