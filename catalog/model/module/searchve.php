<?php
class ModelModuleSearchve extends Model
{
    public function gettour()
    {
        $sql="SELECT * FROM " . DB_PREFIX . "destination";
        $query=$this->db->query($sql);
        return $query->rows;
    }
    public function gettourSpecial()
    {
        $sql="SELECT DISTINCT p.product_id,p.image,p.price,p.district_from,p.district_to,pd.meta_description FROM ".DB_PREFIX."product p LEFT JOIN ".DB_PREFIX."product_description pd ON (p.product_id=pd.product_id) LEFT JOIN ".DB_PREFIX."product_to_category ptc ON(p.product_id=ptc.product_id) WHERE p.status='1' AND p.special='1' AND (ptc.category_id='1' OR ptc.category_id='4' OR ptc.category_id='5') AND pd.language_id='".$this->config->get('config_language_id')."'";
        $query=$this->db->query($sql);
        return $query->rows;
    }
    public function getdistrict($district)
    {        
       $sql="SELECT * FROM ".DB_PREFIX."destination dt WHERE dt.destination='".$district."'";
       $query=$this->db->query($sql);       
       return $query->row['name'];     
    }
}
?>