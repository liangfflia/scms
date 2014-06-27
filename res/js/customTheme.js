$('.style-switcher li').click(function(){
	
	var themeClass = $(this).attr('class');
	themeClass = themeClass.replace('theme-active', '');
	themeClass = themeClass.replace(' ', '');
	
	$.ajax({
		type: 'POST',
		url: '/ajax/changetheme',
		data: {theme: themeClass}
	}).done(function(){
		
	});
});