<?php echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="<?php echo $direction; ?>" lang="<?php echo $language; ?>" xml:lang="<?php echo $language; ?>">
<head>
<title><?php echo $title; ?></title>
<base href="<?php echo $base; ?>" />
<script>
function goto(){
    window.parent.location.href="<?php echo $text_failure_url; ?>";
}
function auto(){
    setTimeout("goto()",5000);
}
</script>
</head>
<body onload="auto();">
<div style="text-align: center;">
  <p><?php echo $text_response; ?></p>
  <div style="border: 1px solid #DDDDDD; margin-bottom: 20px; width: 350px; margin-left: auto; margin-right: auto;">
    <creditcard ITEM=banner>
  </div>
  <p><?php echo $text_failure; ?></p>
  <p style="color:red"><?php echo $payment_details; ?></p>
  <p><?php echo $payment_solutions; ?></p>
  <p><?php echo $text_failure_wait; ?></p>
</div>
</body>
</html>
