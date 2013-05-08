var num = 1;

function changecats()
{
	var blocktext = '';
	var unsetcats = '';
	num = $('#catgenerator .blockcat').length;
	$('[name=maxpages]').val($('#catgenerator .blockcat').first().find('.cac').val());

	$('#catgenerator .blockcat').each(function(i) {
		var mycat = $(this).find('.cay').val();
		if(i > 0)
		{
			var mycat2 = mycat.replace(/[,\.\s-]/g, "_");
			$(this).find('.cag').html(('{' + 'INDEX_BLOCK_' + mycat2 + '}').toUpperCase());
			$(this).find('.caf').html('block.' + mycat2 + '.tpl');
		}
		else
		{
			$(this).find('.cag').html(('{' + 'INDEX_BLOCK}').toUpperCase());
			$(this).find('.caf').html('block.tpl');
		}
		if ($(this).length && mycat !== '')
		{
			if (!(blocktext.indexOf(mycat) + 1))
			{
				blocktext += mycat;
				unsetcats = '|' + $(this).find('.cac').val();
				if ($(this).find('.cam').val() !== '' && $(this).find('.cam').val() != '0')
				{
					unsetcats += '|' + $(this).find('.cam').val();
				}
				blocktext +=  unsetcats;
				if (i < num) blocktext +=  ', ';

				$(this).find('.cat_desc').show();
				$(this).find('.cat_exists').hide();

			}
			else
			{
				$(this).find('.cat_desc').hide();
				$(this).find('.cat_exists').show();
			}
		}
	});
	$('[name=category]').val(blocktext);
}

$(".deloption").live("click", function () {
	$(this).closest('tr').remove();
	changecats();
	return false;
});

$('#addoption').live("click", function(){
	var object = $('.blockcat').last().clone();
	$(object).find('.deloption').show();
	$(object).insertBefore('#addtr').show();
	changecats();
	return false;
});

$('.cam, .cac, select').live("change", function(){
	changecats();
});

$(document).ready(function(){
	$('[name=category]').closest('tr').hide();
	$('[name=maxpages]').closest('tr').hide();

	$('#catgenerator .blockcat').each(function(i) {
		var input = $('[name=blockmaincat]').clone();
		blocktext = $(this).find('.cay').val();
		$(input).val(blocktext).insertBefore($(this).find('.cay'));
		$(this).find('.cay').remove();
		$(input).attr('name', 'cay').attr('class', 'cay');
		if(i > 0) $(this).find('.deloption').show();

	});
	$('.cay').width('200px');
	changecats();
});