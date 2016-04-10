<section class="content-header">
    <h1><?php echo $form_title;?></h1>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    <?php echo form_open($form_action, 'name="form_perwakilan" id="form_perwakilan"');?>
                            <input type="hidden" name="code" id="code" value="<?php echo $code;?>"/>
                            <input type="hidden" name="id" id="id" value="<?php echo $id;?>"/>
                            <table class='table table-bordered'>
                                <tr>
                                    <td width="200">Email</td>
                                    <td><input type="email" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email;?>"/></td>
                                </tr>
                                <tr>
                                    <td>Nama</td>
                                    <td><input type="text" class="form-control" name="name" id="name" placeholder="Nama" value="<?php echo $name;?>"/></td>
                                </tr>
                                <tr>
                                    <td>Telp</td>
                                    <td><input type="telp" class="form-control" name="telp" id="telp" placeholder="Telp" value="<?php echo $telp;?>"/></td>
                                </tr>
                                <tr>
                                    <td>Facebook</td>
                                    <td><input type="fb" class="form-control" name="fb" id="fb" placeholder="Facebook ID" value="<?php echo $fb;?>"/></td>
                                </tr>
                                <tr>
                                    <td>Twitter</td>
                                    <td><input type="tw" class="form-control" name="tw" id="tw" placeholder="Twitter" value="<?php echo $tw;?>"/></td>
                                </tr>
                                <tr>
                                    <td>Instagram</td>
                                    <td><input type="ig" class="form-control" name="ig" id="ig" placeholder="Instagram" value="<?php echo $ig;?>"/></td>
                                </tr>
                                <tr>
                                    <td colspan='2'>
                                        <button type="submit" class="btn btn-primary">Proses</button>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                    </td>
                                </tr>
                            </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>