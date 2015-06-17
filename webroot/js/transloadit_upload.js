;(function($) {
	$(document).ready(function () {
		var $appTransloaditForms = $('.js-transloadit-form');

		$appTransloaditForms.each(function(index, element) {
			$(element).transloadit({
				wait : true,
				processZeroFiles : false,
				params : {
					auth : {
						key : $(element).data('transloaditKey')
					},
					template_id : $(element).data('transloaditTemplate')
				}
			});
		});

	});
})(jQuery);
