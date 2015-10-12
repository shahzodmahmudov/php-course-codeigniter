<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title><?php echo $title;?></title>

    <!-- Bootstrap core CSS -->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/assets/css/style.css" rel="stylesheet">
  </head>

  <body>



      <!-- The justified navigation menu is meant for single line per list item.
           Multiple lines will require custom code not provided by Bootstrap. -->
      <div class="masthead" style="padding-right: 10px; padding-left: 10px;">
        <h3 class="text-muted"><i class="glyphicon glyphicon-phone-alt"></i> Справочник</h3>
        <nav>
          <ul class="nav nav-justified">
            <li class="<?php echo (isset($cur_page) && $cur_page=='home') ? 'active' : ''?>"><a href="/Welcome">Главная</a></li>
            <li class="<?php echo (isset($cur_page) && $cur_page=='phonelisting') ? 'active' : ''?>"><a href="/abonent/listAbonent">Список номеров</a></li>
            <li class="<?php echo (isset($cur_page) && $cur_page=='abonent') ? 'active' : ''?>"><a href="/abonent/newAbonent">Новый</a></li>
            <li><a href="#">О нас</a></li>
            <li><a href="#">Контакты</a></li>
          </ul>
        </nav>
      </div>

      <div class="container" style='padding-top: 30px;'>
            <h3><?php echo $title;?></h3>
            <?php if ($this->session->userdata('error')):?>
                   <div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Ошибка: </strong><?php echo $this->session->userdata('error');?></div>
            <?php elseif ($this->session->userdata('status')): ?>
                  <div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><?php echo $this->session->userdata('status');?></div>
            <?php endif;?>
            <?php $array_items = array('status', 'error'); $this->session->unset_userdata($array_items);?>
