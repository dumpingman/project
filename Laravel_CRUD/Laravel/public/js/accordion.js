$(function(){
	$("#acMenu").click(function(){
		$(this).next().slideToggle();
});
});
$(function(){
    $('.modalopen').on('click',function(){
    	var free=$(this).data('target');
        var target = document.getElementById(free);
         console.log(target);
        $(target).fadeIn();
        return false;
    });

    $('.js-modal-close').on('click',function(){
        $('.js-modal').fadeOut();
        return false;
    });
});