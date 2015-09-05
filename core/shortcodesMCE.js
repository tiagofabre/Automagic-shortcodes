jQuery(document).ready(function($) {


		var $generator = $('#su-generator'),
		$search = $('#su-generator-search'),
		$filter = $('#su-generator-filter'),
		$filters = $filter.children('a'),
		$choices = $('#su-generator-choices'),
		$choice = $choices.find('span'),
		$settings = $('#su-generator-settings'),
		$prefix = $('#su-compatibility-mode-prefix'),
		$result = $('#su-generator-result'),
		$selected = $('#su-generator-selected'),
		mce_selection = '';

	    $('body').on('click', '#insert-my-media', function(e) {
		e.preventDefault();
		// Save the target
		window.su_generator_target = $(this).data('target');
		// Get open shortcode
		var shortcode = $(this).data('shortcode');
		// Open magnificPopup
		$(this).magnificPopup({
			type: 'inline',
			alignTop: true,
			callbacks: {
				open: function() {
					// Open queried shortcode
					if (shortcode) $choice.filter('[data-shortcode="' + shortcode + '"]').trigger('click');
					// Focus search field when popup is opened
					else window.setTimeout(function() {
						//$search.focus();
					}, 200);
					// Change z-index
					$('body').addClass('su-mfp-shown');
					// Save selection
					mce_selection = (typeof tinyMCE !== 'undefined' && tinyMCE.activeEditor != null && tinyMCE.activeEditor.hasOwnProperty('selection')) ? tinyMCE.activeEditor.selection.getContent({
						format: "text"
					}) : '';
				},
				close: function() {
					// Clear search field
					$search.val('');
					// Hide settings
					$settings.html('').hide();
					// Remove narrow class
					$generator.removeClass('su-generator-narrow');
					// Show filters
					$filter.show();
					// Show choices panel
					$choices.show();
					$choice.show();
					// Clear selection
					mce_selection = '';
					// Change z-index
					$('body').removeClass('su-mfp-shown');
				}
			}
		}).magnificPopup('open');
	});
});

