<section class="content-header">
    <h1><?php echo $title;?></h1>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    <?php echo form_open($action);?>
                            <input type="hidden" name="id_menu" value="<?php echo $id_menu; ?>" />
                            <table class='table table-bordered'>
                                <tr>
                                    <td width="200">Nama Menu <?php echo form_error('name') ?></td>
                                    <td><input type="text" class="form-control" name="name" id="name" placeholder="Name" value="<?php echo $name; ?>" /></td>
                                </tr>
                                <tr>
                                    <td>Link <?php echo form_error('link') ?></td>
                                    <td><input type="text" class="form-control" name="link" id="link" placeholder="Link" value="<?php echo $link; ?>" /></td>
                                </tr>
                                <tr>
                                    <td>Icon <?php echo form_error('icon') ?></td>
                                    <td><input type="text" class="form-control" name="icon" id="icon" placeholder="Icon" value="<?php echo $icon; ?>" /></td>
                                </tr>
                                <tr>
                                    <td>Status <?php echo form_error('is_active') ?></td>
                                    <td><?php echo form_dropdown('is_active',array('1'=>'AKTIF','0'=>'TIDAK AKTIF'),$is_active,"class='form-control'");?></td>
                                </tr>
                                <tr>
                                    <td>Is Parent <?php echo form_error('is_parent') ?></td>
                                    <td>
                                        <select name="is_parent" class="form-control">
                                            <option value="0">YA</option>
                                            <?php
                                            $menu = $this->db->get('menu_admin');
                                            foreach ($menu->result() as $m){
                                            echo "<option value='$m->id_menu' ";
                                                echo $m->id_menu==$is_parent?'selected':'';
                                            echo">".  strtoupper($m->name)."</option>";
                                            }
                                            ?>
                                        </select>
                                    </td>
                                </tr>                                
                                <tr>
                                    <td colspan='2'>
                                        <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
                                        <a href="<?php echo site_url('menu/admin') ?>" class="btn btn-default">Cancel</a>
                                    </td>
                                </tr>
                            </table>
                    <?php echo form_close();?>
                </div>
            </div>
        </div>
    </div>
</section>