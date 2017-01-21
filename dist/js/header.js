$(function() {

	//highlight the current nav
	/*$("#index a:contains('Home')").parent().addClass('active');
	$("#contact a:contains('Contact')").parent().addClass('active');
	$("#about a:contains('About')").parent().addClass('active');
	$("#request a:contains('Daftar Komunitas')").parent().addClass('active');
	$("#kategori a:contains('Kategori ')").parent().addClass('active');

	$("#generalD a:contains('General Discussion')").parent().addClass('active');
	$("#lounge a:contains('The Lounge')").parent().addClass('active');

	
	if($("#generalD a:contains('General Discussion')").parent().hasClass('active')){
	$(".dropdown a:contains('Kategori ')").parent().addClass('active');
	}
	
	if($("#joomla a:contains('The Lounge')").parent().hasClass('active')){
	$(".dropdown a:contains('Kategori ')").parent().addClass('active');
	}*/

	//make menus drop automatically
	$('ul.nav li.dropdown').hover(function() {
		$('#dropmenu', this).fadeIn();
	}, function() {
		$('#dropmenu', this).fadeOut('fast');
	});//hover


	/*$('ul.nav li.dropdown').hover(function() {
	  $(this).find('#dropmenu').stop(true, true).delay(200).fadeIn(500);
	}, function() {
	  $(this).find('#dropmenu').stop(true, true).delay(200).fadeOut(500);
	});*/
	
}); //jQuery is loaded

function showPassword() {
    
    var key_attr = $('#key').attr('type');
    
    if(key_attr != 'text') {
        
        $('.checkbox').addClass('show');
        $('#key').attr('type', 'text');
        
    } else {
        
        $('.checkbox').removeClass('show');
        $('#key').attr('type', 'password');
        
    }
    
}

