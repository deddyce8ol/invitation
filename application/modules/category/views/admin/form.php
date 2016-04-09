<section class="content-header">
    <h1><?php echo $title.' <small>'.$subtitle.'</small>';?></h1>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    <?php echo form_open($action);?>
                            <input type="hidden" name="id_category" value="<?php echo $id_category; ?>" />
                            <table class='table table-bordered'>
                                <tr>
                                    <td width="200">Tipe Konten</td>
                                    <td>
                                        <?php echo $combobox_type; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="200">Kategori <?php echo form_error('category') ?></td>
                                    <td><input type="text" class="form-control" name="category" id="category" placeholder="Kategori" value="<?php echo $category; ?>" /></td>
                                </tr>
                                <tr>
                                    <td colspan='2'>
                                        <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
                                        <a href="<?php echo site_url('category/manage') ?>" class="btn btn-default">Cancel</a>
                                    </td>
                                </tr>
                            </table>
                    <?php echo form_close();?>
                </div>
            </div>
        </div>
    </div>
</section>