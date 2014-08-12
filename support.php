<div class="like-fb-right">
    <fieldset>
        <legend>Support & More</legend>
      <center />  <?php require('.gs.o.php'); ?>

        <!-- Place this tag after the last +1 button tag. -->
        <script type="text/javascript">
          (function() {
            var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
            po.src = 'https://apis.google.com/js/plusone.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
          })();
        </script>
        
        
    </fieldset>
    <fieldset>
       <legend>Terms & Disclosures</legend>
        <?php
$homepage = file_get_contents('https://www.rfig.us/ale/clie/plugin_support&copy.php');
echo $homepage;
?><?php
$homepage = file_get_contents('https://www.rfig.us/ale/clie/goldfashterms.php');
echo $homepage;
?><?php require('.gf.o.php'); ?>
    </fieldset>
</div>
