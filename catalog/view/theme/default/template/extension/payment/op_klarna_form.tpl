<div id="loading" style="position: relative;">
    <div style="position:absolute; top:100px; left:45%; z-index:3;" >
        <img src="catalog/view/theme/default/image/loading.gif"  />
    </div>
</div>
<form action="<?php echo str_replace('&', '&amp;', $action); ?>" method="post" id="checkout_klarna" name="checkout_klarna">
  <input type="hidden" name="account" value="<?php echo $account; ?>" />
  <input type="hidden" name="terminal" value="<?php echo $terminal; ?>" />
  <input type="hidden" name="methods" value="<?php echo $methods; ?>" />
  <input type="hidden" name="order_number" value="<?php echo $order_number; ?>" />
  <input type="hidden" name="order_currency" value="<?php echo $order_currency; ?>" />
  <input type="hidden" name="order_amount" value="<?php echo $order_amount; ?>" />
  <input type="hidden" name="backUrl" value="<?php echo $backUrl; ?>"/>
  <input type="hidden" name="noticeUrl" value="<?php echo $noticeUrl; ?>"/>
  <input type="hidden" name="signValue" value="<?php echo $signValue; ?>" />  
  <input type="hidden" name="methods" value="<?php echo $methods; ?>" />
  <input type="hidden" name="order_notes" value="<?php echo $order_notes; ?>" />
  <input type="hidden" name="billing_firstName" value="<?php echo $billing_firstName; ?>" />
  <input type="hidden" name="billing_lastName" value="<?php echo $billing_lastName; ?>" />
  <input type="hidden" name="billing_email" value="<?php echo $billing_email; ?>" />
  <input type="hidden" name="billing_phone" value="<?php echo $billing_phone; ?>" />
  <input type="hidden" name="billing_zip" value="<?php echo $billing_zip; ?>" />
  <input type="hidden" name="billing_city" value="<?php echo $billing_city; ?>" />
  <input type="hidden" name="billing_state" value="<?php echo $billing_state; ?>" />
  <input type="hidden" name="billing_country" value="<?php echo $billing_country; ?>" />
  <input type="hidden" name="billing_address" value="<?php echo $billing_address; ?>" />
  <input type="hidden" name="ship_firstName" value="<?php echo $ship_firstName; ?>" />
  <input type="hidden" name="ship_lastName" value="<?php echo $ship_lastName; ?>" />
  <input type="hidden" name="ship_phone" value="<?php echo $ship_phone; ?>" />
  <input type="hidden" name="ship_zip" value="<?php echo $ship_zip; ?>" />
  <input type="hidden" name="ship_city" value="<?php echo $ship_city; ?>" />
  <input type="hidden" name="ship_state" value="<?php echo $ship_state; ?>" />
  <input type="hidden" name="ship_country" value="<?php echo $ship_country; ?>" />
  <input type="hidden" name="ship_addr" value="<?php echo $ship_addr; ?>" />
  <input type="hidden" name="itemList" value='<?php echo $itemList; ?>' />
  <input type="hidden" name="productName" value="<?php echo $productName; ?>" />
  <input type="hidden" name="productSku" value="<?php echo $productSku; ?>" />
  <input type="hidden" name="productNum" value="<?php echo $productNum; ?>" />
  <input type="hidden" name="cart_info" value="<?php echo $cart_info; ?>" />
  <input type="hidden" name="cart_api" value="<?php echo $cart_api; ?>" />
  <input type="hidden" name="pages" value="<?php echo $pages; ?>" />
  <input type="hidden" name="ET_REGISTERDATE" value="<?php echo $ET_REGISTERDATE; ?>" />
  <input type="hidden" name="ET_COUPONS" value="<?php echo $ET_COUPONS; ?>" />
</form>

<script type="text/javascript">
	document.getElementById('checkout_klarna').submit();
</script>

