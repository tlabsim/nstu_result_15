function validateSearchForm(form)
{    
    var roll= $('input#search_by_roll').val();     

	roll = $.trim(roll);

    if (roll.length == 0 || roll=="") 
    {           
    	$('#alert_no_input').removeClass('hidden');
		return false;		
    }
    else if(isNaN(roll))
    {
    	$('#alert_invalid_input').removeClass('hidden');
		return false;
    }
    else
    {
    	$('#alert_no_input').addClass('hidden');
    	$('#alert_invalid_input').addClass('hidden');
    }
    return true;
}

$(document).ready(function(){
    $('.result_download_link').click(function()
    {        
        var link_id = $(this).attr('link_id');
        var url = "/downloads/update_stat/" + link_id;
        //alert(url);
        $.getJSON(url, function(r)
        {
            alert(r.success);
        });
    });
});
