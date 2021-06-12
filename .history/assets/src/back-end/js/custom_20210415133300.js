jQuery(document).ready(function() {
	jQuery('#mwb-wpg-gen-table').DataTable({

    	"dom": '<"">tr<"bottom"lip>', //extentions position
        "ordering": true, // enable ordering

language: {
	"lengthMenu": "Rows per page _MENU_",
	"info": "_START_ - _END_ of _TOTAL_",

	paginate: {
		next: '<svg width="8" height="12" viewBox="0 0 8 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M1.99984 0L0.589844 1.41L5.16984 6L0.589844 10.59L1.99984 12L7.99984 6L1.99984 0Z" fill="#8E908F"/></svg>',
		previous: '<svg width="8" height="12" viewBox="0 0 8 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M6.00016 12L7.41016 10.59L2.83016 6L7.41016 1.41L6.00016 -1.23266e-07L0.000156927 6L6.00016 12Z" fill="#8E908F"/></svg>'
	}
}
});

	jQuery(document).on( 'click', '#update_wallet', function() {
	//jQuery('#update_wallet').click(function(){
		jQuery('.mwb_wallet-update--popupwrap').addClass('active');
	});
	jQuery(document).on( 'blur','#mwb_wallet', function(){
		var amount = jQuery('#mwb_wallet').val();
		if ( amount <= 0 ) {
			jQuery('.error').show();
			jQuery('.error').html('Enter amount greater than 0');
		} else {
			jQuery('.error').hide();
		}
	
	});

});

