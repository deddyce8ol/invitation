<?php
function notification_proses($type="success",$title="Berhasil", $msg = "Berhasil", $template="adminLTE"){
    if ($template == "adminLTE") {
        $html = '<div class="alert alert-'.$type.' alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> '.$title.'</h4>
            '.$msg.'
        </div>';               
    }
    return $html;
}
function combobox_dynamic($name,$table,$field,$pk,$selected="",$placeholder="::Pilih Data::",$class="form-control"){
    $ci = get_instance();
    $cmb = "<select name='$name' id='$name' class='$class $name'>";
    $cmb .= "<option value=''>".$placeholder."</option>";
    if (is_object($table)) {
        $data = $table->result();
    }
    else {
        $data = $ci->db->get($table)->result();
    }
    foreach ($data as $d){
        $cmb .="<option value='".$d->$pk."'";
        $cmb .= $selected==$d->$pk?" selected='selected'":'';
        $cmb .=">".$d->$field."</option>";
    }
    $cmb .="</select>";
    return $cmb;  
}
function combobox_category($id_type, $selected="", $name="id_category", $class="form-control"){
    $ci =& get_instance();
    $cmb = "<select name='$name' id='$name' class='$class $name'>";
    $cmb .= "<option value=''>Pilih Kategori</option>";
    $data = $ci->db->where('id_type', $id_type);
    $data = $ci->db->get('category')->result();
    foreach ($data as $d){
        $cmb .="<option value='".$d->id_category."'";
        $cmb .= $selected==$d->id_category?" selected='selected'":'';
        $cmb .=">".$d->category."</option>";
    }
    $cmb .="</select>";
    return $cmb;  
}
