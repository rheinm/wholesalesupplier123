        </div>
    </div><!-- end row -->
 </div><!-- end content -->
 <?php 
$background_option_style = (function_exists('ot_get_option'))? ot_get_option('background_option_style', 'app_stock') : 'app_stock';
if($background_option_style == 'photo_stock'):?>
</section>
<?php endif; ?>