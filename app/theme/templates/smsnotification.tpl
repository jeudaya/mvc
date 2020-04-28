
<h2>SNS SUBSCRIBE</h2>
<!-- {if $SUCC_MSG} {$SUCC_MSG} {/if} -->
<form name="snsmsg" method="post" action="{$SITE_URL}subscribe">
  Enter phone number to subscribe.</br> Enter number in E.164 format i.e +[Country code][Phone Number] For US, example if phone number is 415 5552671, the E.164 format should be +14155552671.</br></br>
  <input type="text" name="sms_number" id="sms_number" value="">
  <input type="submit" value="Submit">
  <br><br>
</form> 
<form name="subslist" method="post" action="{$SITE_URL}list_subscriptions_by_topic">
  Click here to see the list of Subscriptions:
  <input type="submit" value="Click">
</form>
