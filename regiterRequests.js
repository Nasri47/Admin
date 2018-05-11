alert("ksjdnf") ;
function action(){
	alert("ksjdnf") ;
        //var clickBtnValue = $(this).val();
        var ajaxurl = 'regisRequests.php',
        data =  {'action': clickBtnValue};
        $.post(ajaxurl, data, function (response) {
            // Response div goes here.
            alert("action performed successfully");
        });
}