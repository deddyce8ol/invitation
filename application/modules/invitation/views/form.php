<section class="content-header">
    <h1><?php echo $title;?></h1>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    <?php echo form_open($action);?>
                            <input type="hidden" name="code_old" value="<?php echo $code_old; ?>" />
                            <table class='table table-bordered'>
                                <tr>
                                    <td width="200">Kode Undangan <?php echo form_error('code') ?></td>
                                    <td><input type="text" class="form-control" name="code" id="code" placeholder="Kode Undangan" value="<?php echo $code; ?>" /></td>
                                </tr>
                                <tr>
                                    <td width="200">Sandi <?php echo form_error('password') ?></td>
                                    <td><input type="text" class="form-control" name="password" id="password" placeholder="Sandi" value="<?php echo $password; ?>" /></td>
                                </tr>
                                <tr>
                                    <td width="200">Kuota <?php echo form_error('slot') ?></td>
                                    <td><input type="number" class="form-control" name="slot" id="slot" placeholder="Kuota Perwakilan" value="<?php echo $slot; ?>" /></td>
                                </tr>
                                <tr>
                                    <td>Kepada <?php echo form_error('subject') ?></td>
                                    <td><input type="text" class="form-control" name="subject" id="subject" placeholder="Kepada" value="<?php echo $subject; ?>" /></td>
                                </tr>
                                <tr>
                                    <td>Kontak Yang Bisa di Hubungi <?php echo form_error('kontak') ?></td>
                                    <td><input type="text" class="form-control" name="kontak" id="kontak" placeholder="Kontak" value="<?php echo $kontak; ?>" /></td>
                                </tr>
                                <tr>
                                    <td colspan='2'>
                                        <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
                                        <a href="<?php echo site_url('invitation') ?>" class="btn btn-default">Cancel</a>
                                    </td>
                                </tr>
                            </table>
                    <?php echo form_close();?>
                </div>
            </div>
        </div>
    </div>
</section>