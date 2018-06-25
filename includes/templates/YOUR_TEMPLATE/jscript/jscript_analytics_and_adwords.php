<?php 
/**
 * @package Analytics and Adwords Conversions
 * @copyright (c) 2018 kanine
 * @copyright Copyright 2003-2017 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart-pro.at/license/2_0.txt GNU Public License V2.0
 * @version $Id: jscript_analytics_and_adwords.php 2018-06-25 20:47:36Z kanine $
 */

// LogThis('Start: ' . __FILE__);

if ((!defined('GTAG_ANALYTICS') || GTAG_ANALYTICS === "UA-XXXXXXXX-X")) { 
        echo '<script>alert("The Google Analytics trackingID is not yet defined in\n /includes/extra_datafiles/ec_analytics.php")</script>' ;    
  } else {
?>

  <!-- Global Site Tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo GTAG_ANALYTICS; ?>"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', '<?php echo GTAG_ANALYTICS; ?>');
  <?php if ( GTAG_ADWORDS_ENABLED ): ?>
    gtag('config', '<?php echo GTAG_ADWORDS; ?>');
  <?php endif; ?>
  </script>

<?php
  if ( isset($_SESSION['analytics']) ) {  
    // global $analytics, $cID;
    $gtagCustomerID = ( isset($_SESSION['customer_id']) ) ? "customerID#".$_SESSION['customer_id'] : "guest";
    $analytics = $_SESSION['analytics'];
    // LogThis('Analytics Array: ' . print_r($analytics,true));
?>

 <?php if ( $analytics['action'] == 'Checkout Success' && count($analytics['items']) >= 1 ): ?>

   <script>
    
    gtag('event', 'purchase', {
         "transaction_id": "<?php echo $analytics['transaction']['id']; ?>",
         "affiliation": "<?php echo addslashes($analytics['transaction']['affiliation']); ?>",
         "value": <?php echo $analytics['transaction']['revenue']; ?>,
         "shipping": <?php echo $analytics['transaction']['shipping']; ?>,
         "currency": "<?php echo $analytics['transaction']['currency'] ?>",
         "items": [
  
    <?php 
      $isFirst = true;
      $gtagItemTracking = '';
      // LogThis('Items: ' . print_r($analytics['items'],true));
      foreach ( $analytics['items'] as $item ) {
        // LogThis('This Item: ' . print_r($item,true));
        $gtagItemTracking .= ( $isFirst ? '' : ',') . PHP_EOL;
        $gtagItemTracking .= '{"id": "' . $item['id'] . '",' . PHP_EOL;
        $gtagItemTracking .= '"name": "' . addslashes($item['name']) . '",' . PHP_EOL;
        $gtagItemTracking .= '"brand": "' . addslashes($item['brand']) . '",' . PHP_EOL;
        $gtagItemTracking .= '"category": "' . addslashes($item['category']) . '",' . PHP_EOL;
        $gtagItemTracking .= '"list_position": "' . $item['position'] . '",' . PHP_EOL;
        $gtagItemTracking .= '"variant": "' . addslashes($item['variant']) . '",' . PHP_EOL;
        $gtagItemTracking .= '"price": ' . $item['price'] . ',' . PHP_EOL;
        $gtagItemTracking .= '"quantity":' . $item['quantity']  . PHP_EOL; 
        $gtagItemTracking .= '}' . PHP_EOL;
        $isFirst = false;
      }
      $gtagItemTracking .= ']});' . PHP_EOL;

      echo $gtagItemTracking;

    ?>

    <?php if ( GTAG_ADWORDS_ENABLED ) { ?> 

      gtag('event', 'conversion', {
          'send_to': '<?php echo GTAG_ADWORDS_SENDTO; ?>',
          'value': <?php echo $analytics['transaction']['revenue']; ?>,
          'currency': '<?php echo $analytics['transaction']['currency']; ?>',
          'transaction_id': '<?php echo $analytics['transaction']['id']; ?>'
      });

    <?php } ?>

    </script>

<?php endif; ?>

<?php
     unset($_SESSION['analytics']);

  } 
} ?>
