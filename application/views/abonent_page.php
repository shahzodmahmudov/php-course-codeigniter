<?php if (isset($cur_page) && $cur_page=="createnew"):?>
<div class="row">
    <div class="col-sm-6">
        <form class="form-horizontal" method="POST" action="/abonent/save">
            <div class="form-group">
              <label class="col-sm-4 control-label" for="last_name">Фамилия</label>
              <div class="col-sm-8">
                  <input required="required" type="text" class="form-control" id="last_name" name="last_name" value="<?php echo set_value('last_name');?>" placeholder="Фамилия">
                  <?php echo form_error('last_name'); ?>
              </div>
            </div>

            <div class="form-group">
            <label class="col-sm-4 control-label" for="first_name">Имя</label>
            <div class="col-sm-8">
                <input required="required" type="text" class="form-control" name="first_name" id="first_name" value="<?php echo set_value('first_name');?>" placeholder="Имя">
                <?php echo form_error('first_name'); ?>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-4 control-label" for="address">Адрес</label>
            <div class="col-sm-8">
                <input required="required" type="text" class="form-control" id="address" name="address" value="<?php echo set_value('address');?>" placeholder="Адрес">
                <?php echo form_error('address'); ?>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-4 control-label" for="address">Номер телефона</label>
            <div class="col-sm-8">
                <input required="required" type="text" class="form-control" id="phone_number" name="phone_number" value="<?php echo set_value('phone_number');?>" placeholder="Номер телефона">
                <?php echo form_error('phone_number'); ?>
            </div>
          </div>
          <div class="form-group">
              <button type="submit" class="pull-right btn btn-default">Сохранить</button>
          </div>
        </form>
    </div>
    <div class="col-sm-6">
    </div>
</div>
<?php else:?>
    <?php print_r($result); ?>
<?php endif;?>
