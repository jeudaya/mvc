<?php /* Smarty version 2.6.25, created on 2020-02-03 08:30:11
         compiled from unsubscribe.tpl */ ?>
<h2>SNS UNSUBSCRIBE</h2>

<form name="snsunsubscribe" method="post" action="<?php echo $this->_tpl_vars['SITE_URL']; ?>
unSubscribe">
  Select mobile number to unsubscribe:
  <select name="sms_number_uns">
  	<option>Select</option>
  	<?php $_from = $this->_tpl_vars['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['val']):
?>
  	<option value="<?php echo $this->_tpl_vars['val']['sms_frequency']; ?>
"><?php echo $this->_tpl_vars['val']['sms_number']; ?>
</option>
  	<?php endforeach; endif; unset($_from); ?>
  </select>
  <input type="submit" value="Submit">
</form>