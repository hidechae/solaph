<?php /* Smarty version 2.6.26, created on 2012-08-14 21:48:40
         compiled from /var/www/html/twitter_api/tpl/list.tpl */ ?>
<html>
  <head>
  </head>
  <body>
    <ul>
      <?php $_from = $this->_tpl_vars['stream']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
      <li>
        name:<?php echo $this->_tpl_vars['item']['user']['name']; ?>
<br>
        text:<?php echo $this->_tpl_vars['item']['text']; ?>

      </li>
      <?php endforeach; endif; unset($_from); ?>
    </ul>
  </body>
</html>