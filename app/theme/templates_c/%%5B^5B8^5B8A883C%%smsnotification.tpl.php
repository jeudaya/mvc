<?php /* Smarty version 2.6.25, created on 2020-02-03 08:29:19
         compiled from smsnotification.tpl */ ?>

<h2>SNS SUBSCRIBE</h2>
<!-- <?php if ($this->_tpl_vars['SUCC_MSG']): ?> <?php echo $this->_tpl_vars['SUCC_MSG']; ?>
 <?php endif; ?> -->
<form name="snsmsg" method="post" action="<?php echo $this->_tpl_vars['SITE_URL']; ?>
subscribe">
  Enter phone number to subscribe.</br> Enter number in E.164 format i.e +[Country code][Phone Number] For US, example if phone number is 415 5552671, the E.164 format should be +14155552671.</br></br>
  <input type="text" name="sms_number" id="sms_number" value="">
  <input type="submit" value="Submit">
  <br><br>
</form> 
<form name="subslist" method="post" action="<?php echo $this->_tpl_vars['SITE_URL']; ?>
list_subscriptions_by_topic">
  Click here to see the list of Subscriptions:
  <input type="submit" value="Click">
</form>