jQuery(document).ready( ($) => {
	const footer = $('.elementor[data-elementor-type=footer]');
	const sections = $('.entry-content div div div section');
	let dynamicHeader = $('#ctg-dynamic-header');
	let scrollToButton = $('<button>');

	scrollToButton.addClass('ctg-scrollto-button');
	scrollToButton.text('Contact');
	dynamicHeader.children().remove();
	dynamicHeader.append(scrollToButton);
	
	scrollToButton.on('click', function(e) {
		window.scrollTo( { top: sections.last().offset().top, behavior: 'smooth' } );
	});
	
});