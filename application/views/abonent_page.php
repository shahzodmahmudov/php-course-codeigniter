<script type="text/javascript">
    $(function () {
        console.log("tet");
        //$(".delete_object").click(function () {
        $(".remove").click(function () {
            if (confirm("Вы действительно хотите удалить этого абонента?"))
                return true;
            else
                return false;
        });
    });
</script>

<?php if (isset($operation) && $operation == "new"): ?>
    <div class="row">
        <div class="col-sm-6">
            <form class="form-horizontal" method="POST" action="/abonent/save">
                <div class="form-group">
                    <label class="col-sm-4 control-label" for="last_name">Фамилия</label>

                    <div class="col-sm-8">
                        <input required="required" type="text" class="form-control" id="last_name" name="last_name"
                               value="<?php echo set_value('last_name'); ?>" placeholder="Фамилия">
                        <?php echo form_error('last_name'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-4 control-label" for="first_name">Имя</label>

                    <div class="col-sm-8">
                        <input required="required" type="text" class="form-control" name="first_name" id="first_name"
                               value="<?php echo set_value('first_name'); ?>" placeholder="Имя">
                        <?php echo form_error('first_name'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-4 control-label" for="address">Адрес</label>

                    <div class="col-sm-8">
                        <input required="required" type="text" class="form-control" id="address" name="address"
                               value="<?php echo set_value('address'); ?>" placeholder="Адрес">
                        <?php echo form_error('address'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label" for="address">Номер телефона</label>

                    <div class="col-sm-8">
                        <input required="required" type="text" class="form-control" id="phone_number"
                               name="phone_number" value="<?php echo set_value('phone_number'); ?>"
                               placeholder="Номер телефона">
                        <?php echo form_error('phone_number'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-7"></div>
                    <div class="col-sm-5">
                        <button type="submit" class="pull-right btn btn-success">Сохранить</button>
                        <a href="/abonent" class="btn btn-default">Отмена</a>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-sm-6">
        </div>
    </div>
<?php elseif (isset($operation) && $operation == "edit" && $UserObj): ?>
        <div class="row">
            <div class="col-sm-6">
                <form class="form-horizontal" method="POST" action="/abonent/update">
                    <input type="hidden" name="user_id" value="<?php echo $UserObj->getID();?>"/>
                    <?php echo form_error('user_id'); ?>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="last_name">Фамилия</label>

                        <div class="col-sm-8">
                            <input required="required" type="text" class="form-control" id="last_name" name="last_name"
                                   value="<?php echo $UserObj->getLastName(); ?>" placeholder="Фамилия">
                            <?php echo form_error('last_name'); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="first_name">Имя</label>

                        <div class="col-sm-8">
                            <input required="required" type="text" class="form-control" name="first_name" id="first_name"
                                   value="<?php echo $UserObj->getFirstName(); ?>" placeholder="Имя">
                            <?php echo form_error('first_name'); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="address">Адрес</label>

                        <div class="col-sm-8">
                            <input required="required" type="text" class="form-control" id="address" name="address"
                                   value="<?php echo $UserObj->getAddress();; ?>" placeholder="Адрес">
                            <?php echo form_error('address'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="address">Номер телефона</label>

                        <div class="col-sm-8">
                            <input required="required" type="text" class="form-control" id="phone_number"
                                   name="phone_number" value="<?php echo $UserObj->getPhoneNumber();; ?>"
                                   placeholder="Номер телефона">
                            <?php echo form_error('phone_number'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-7"></div>
                        <div class="col-sm-5">
                            <button type="submit" class="pull-right btn btn-success">Обновить</button>
                            <a href="/abonent" class="btn btn-default">Отмена</a>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-sm-6">
            </div>
        </div>
<?php elseif (isset($UserObj)): ?>
    <a href="/abonent/newAbonent" class="btn btn-success">Новый абонент</a>
    <table class="mytable table table-striped table-hover">
        <thead>
        <tr>
            <th>N</th>
            <th>Фамилия</th>
            <th>Имя</th>
            <th>Адрес</th>
            <th>Номер телефона</th>
            <th>Операция</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($UserObj as $index => $User): ?>
            <tr>
                <td><?php echo ++$index; ?></td>
                <td><?php echo $User->getFirstName(); ?></td>
                <td><?php echo $User->getLastName(); ?></td>
                <td><?php echo $User->getAddress(); ?></td>
                <td><?php echo $User->getPhoneNumber(); ?></td>
                <td>
                    <a href='/abonent/edit/?user_id=<?php echo $User->getID();?>'><i class='glyphicon glyphicon-pencil'></i> Редактировать</a><br/>
                    <a href="/abonent/remove/?user_id=<?php echo $User->getID(); ?>" class='remove'><i
                            class='glyphicon glyphicon-trash'></i> Удалить</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>
