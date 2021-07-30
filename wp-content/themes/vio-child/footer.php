<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package vio
 */

?>

		</div>
		<!-- #content -->
	</div>
	<!-- #page -->

<?php
if ( ! class_exists( 'ReduxFrameworkPlugin' ) || ( is_404() ) || ( is_search() ) ) {
	get_template_part( 'inc/footer/footer-style', 'default' );
} else {
	$footerBuilder_id      = esc_html( get_post_meta( $post->ID, 'custom_footer', true ) );
	$custom_footer_post_id = $footerBuilder_id;
	if ( $footerBuilder_id && ( is_numeric( $footerBuilder_id ) ) ) {
		$footerBuilder_id = esc_html( get_post_meta( $post->ID, 'custom_footer', true ) );
		$getFooterPost    = get_post( $footerBuilder_id );
		echo '<!-- wraper_footer -->';
		if ( true == vio_global_var( 'footer_custom_stucking', '', false ) && ! wp_is_mobile() ) {
			echo '<div class="footer-custom-stucking-container"></div>
              <footer class="wraper_footer custom-footer footer-custom-stucking-mode">';
		} else {
			echo '<footer class="wraper_footer custom-footer">';
		}
		echo "<div class='container'>";
		$content = $getFooterPost->post_content;
		echo do_shortcode( $content );
		echo '</div>';
		echo '</footer>';
		echo '<!-- wraper_footer -->';
	} else {
		get_template_part( 'inc/footer/footer-style', 'default' );
	}
}
?>

</div>
<!-- radiantthemes-website-layout -->

<?php wp_footer(); ?>

<!-- custom js -->
<script type="text/javascript">

jQuery(document).ready(function($) {

    /* Download bundles */

    function o(e) {
        return "https://repo1.maven.org/maven2/io/gatling/highcharts/gatling-charts-highcharts-bundle/" + e + "/gatling-charts-highcharts-bundle-" + e + "-bundle.zip";
    }
    window.DownloadBundle = function (e, s) {
        location.href = o(e);
    };
    window.DownloadBundleAndRedirect = function (e, s) {
        (location.href = o(e)),
            setTimeout(function () {
                window.location = s;
            }, 1000);
    };

	/* Manage params */

    <?php if(isset($_GET['use-cases'])) { ?>
        $(window).bind( 'grid:items:added', function(){
            if($('body.gridLoaded').length == 0){
                openTab();
                $('body').addClass('gridLoaded');
            }
        });
    <?php } ?>

    <?php if(
        isset($_GET['cloud'])
        || isset($_GET['self-hosted'])
        || isset($_GET['aws'])
        || isset($_GET['azure'])
        || isset($_GET['opensource'])
        || isset($_GET['enterprise'])
        || isset($_GET['opensource'])
        || isset($_GET['enterprise'])
    ) { ?>

        openTab();

    <?php } ?>

    function openTab(){

        var triggerTab, 
            targetTab,
            triggerTime = 500;

        <?php // RESOURCES ?>
        <?php if(isset($_GET['use-cases'])) { ?>
            triggerTab = '.vc_grid-filter-item.vc_active';
            targetTab = 'span[data-vc-grid-filter-value=".vc_grid-term-62"]'; 
            triggerTime = 500;           
        <?php } ?>
        <?php // PRICING ?>
        <?php if(isset($_GET['cloud'])) { ?>
            triggerTab = 'ul.nav-tabs li.active';
            targetTab = 'a[href="#cloud"]';
        <?php } ?>
        <?php if(isset($_GET['self-hosted'])) { ?>
            triggerTab = 'ul.nav-tabs li.active';
            targetTab = 'a[href="#self_hosted"]';
        <?php } ?>
        <?php if(isset($_GET['aws'])) { ?>
            triggerTab = 'ul.nav-tabs li.active';
            targetTab = 'a[href="#aws"]';
        <?php } ?>
        <?php if(isset($_GET['azure'])) { ?>
            triggerTab = 'ul.nav-tabs li.active';
            targetTab = 'a[href="#azure"]';
        <?php } ?>
        <?php // GET STARTED ?>
        <?php if(isset($_GET['opensource'])) { ?>
            triggerTab = '.btn-getting-started.active';
            targetTab = '.openGatlingTab';
        <?php } ?>
        <?php if(isset($_GET['enterprise'])) { ?>
            triggerTab = '.btn-getting-started.active';
            targetTab = '.openGatlingEnterpriseTab';
        <?php } ?>      

        if($(triggerTab).length){
            setTimeout(function() { 
                $(targetTab).trigger('click');
            }, triggerTime)
        } else {
            setTimeout(function() { 
                openTab();
            }, 500);
        }

    }

    /* Manage get started tabs */
    $('.btn-getting-started').on('click', function(){
		$('.btn-getting-started').removeClass('active');
		$(this).addClass('active');
	});

    $('.openGatlingTab').on('click', function(){
    	$('.row_inner_gatling_enterprise').hide();
    	$('.row_inner_gatling').show();
    })

    $('.openGatlingEnterpriseTab').on('click', function(){
    	$('.row_inner_gatling').hide();
    	$('.row_inner_gatling_enterprise').show();
    })

    /* Cloud pricing */

    $('select.feature-credit').on('change', function(){
        var periodDiscount = $('.cloud-pricing-monthly.active').length > 0 ? 0 : 0.30,
            currentDiscount = 0,
            nbCredits = $(this).val(),
            costPerCredit = 0.198,
            currencyPeriod = $(this).closest('.column_price').find('.price sub').text(),
            priceZone = $(this).closest('.column_price').find('.price'),
            price = parseInt(priceZone.text());

        // Check if there is earlybird
        if($(this).closest('.column_price').hasClass('earlybird')) {
            currentDiscount = $('.cloud-pricing-monthly.active').length > 0 ? 0.30 : 0;
        }

        // Update discounted price
        var newPrice = nbCredits*costPerCredit*(1-currentDiscount)*(1-periodDiscount);
        priceZone.html(Math.trunc(newPrice)+'<sub>'+currencyPeriod+'</sub>');

        // Update original price
        if($('.cloud-pricing-monthly.active').length > 0){
            var originalPrice = nbCredits*costPerCredit*(1-periodDiscount);
            priceZone.prepend('<span class="origin-price">'+Math.trunc(originalPrice)+currencyPeriod+'</span>');
        } else {
            $('.origin-price').remove();
        }
        
    });

    $('.cloud-pricing-monthly').trigger('click');
    
    $('.cloud-pricing-switch').on('click', function(){
        $('.cloud-pricing-switch').removeClass('active');
        $(this).addClass('active');

        $('select.feature-credit').trigger('change');
    });

    $('select.feature-credit').trigger('change');

});
</script>

<!-- Start of HubSpot Embed Code -->
<script type="text/javascript" id="hs-script-loader" async defer src="//js.hs-scripts.com/8006059.js"></script>

<!-- GA Code -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-53375088-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', "UA-53375088-1");
  gtag('config', "G-B5J9F14X56");
</script>

<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
  j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
  'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer',"GTM-MJX8KRG");</script>

</body>
</html>
