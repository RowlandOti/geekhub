
if (!ads.isMobile()) {
	(function(window,$){
		window.TechCrunch.loader.on('tc_ads_wrapper_omniture', function(){
			if ( !window.ads.isAdPageSet ){
				if ( typeof window.adSetAdURL == 'function' ) {
					window.adSetAdURL('/wp-content/themes/vip/techcrunch-2013/_uac/adpage.html');
					window.ads.isAdPageSet = true;
				}
			}
			window.htmlAdWH('93311230', "RR", "RR", 'f', 'adsDiv8a8f2e32fb');
		});
	}(this,this.jQuery));
}
<!-- End: Right Rail Advertisement -->