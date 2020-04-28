<h2>SNS UNSUBSCRIBE</h2>

<form name="snsunsubscribe" method="post" action="{$SITE_URL}unSubscribe">
  Select mobile number to unsubscribe:
  <select name="sms_number_uns">
  	<option>Select</option>
  	{foreach from=$data key=key item=val}
  	<option value="{$val.sms_frequency}">{$val.sms_number}</option>
  	{/foreach}
  </select>
  <input type="submit" value="Submit">
</form>