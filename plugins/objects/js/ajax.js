$().ready(function()
{

	var arrJSON = [],
		h2Obj = $('h2.page');

	locationObj = h2Obj.children('a').first();
	console.log(h2Obj, locationObj);

	locationObj.click(function(event)
	{
		// similar behavior as clicking on a link
		window.location.href = "http://stackoverflow.com";
//	    getAJAX();
//	    draw();
		event.preventDefault();
	});

	function draw()
	{
		var htmlcode = '',
			i = 0; // or better 1?
		var oddeven = ''; //флаг чёт-нечёт

		if (numb)
		{
			//console.log('DRAW', 'startKey= ' + startKey, 'finishKey= ' + finishKey);
			for (i = (startKey - 1); i < finishKey; i++)
			{
				var imgTag = '',
					brandTag = '',
					origPrice = parseFloat(arrJSON[i].page_price.replace(',', '.')),
					discountPrice = parseFloat(arrJSON[i].page_discountprice.replace(',', '.')),
					discountValue = Math.round(((origPrice - discountPrice) / origPrice) * 100);
				if (oddeven == 'odd') oddeven = 'even' //флаг чёт-нечёт
				else oddeven = 'odd';
				if (arrJSON[i].page_avatar) imgTag = '<img src="/datas/photos/bf_thumb_' + arrJSON[i].page_avatar + '" class="img-rounded marginbottom10">';
				else imgTag = '<img src="themes/haro/img/parkett-img.jpg" class="img-rounded marginbottom10">';
				brandTag = '<img src="/themes/haro/img/brand.png" class="img-rounded brand_logo">';

				htmlcode += '<div class="span5 marginbottom10 ' + oddeven + '">';
				htmlcode += '<div class="border_round_block idx_news">';
				htmlcode += '<h3><a href="' + arrJSON[i].page_alias + '">' + arrJSON[i].page_title + '</a></h3>';
				htmlcode += '<div class="width40 floatleft">' + imgTag + brandTag + '</div>';
				htmlcode += '<div class="width60 floatleft">' + '<p>Statt UVP*:<b class="line-through floatright">' + origPrice + ' €/qm</b></p>' + '<hr>';
				htmlcode += '<p>Ihr Preis:<b class="floatright">' + discountPrice + ' €/qm ' + '<span style="color:#a04204;">(-' + discountValue + '%)</span></b></p>' + '<hr>';
				htmlcode += '<p>Verfügbare Menge: <b class="floatright">' + arrJSON[i].page_quantitat + 'qm</b></p>';
				htmlcode += '<a class="btn ansehen" href="/' + arrJSON[i].page_alias + '">ANSEHEN</a>';
				htmlcode += '</div></div></div>';

				//			console.log('FLOAT', 'origarray= ' + arrJSON[i].page_price, 'origValue= ' + origPrice);
			};
		};

		locationObj.hide();
		locationObj.html('asdgadfg').fadeIn('fast'); // making output
	}

	function getAJAX()
	{
		//console.log('before AJAX= ', farbgebung.filter("input:checked :first").attr('id'));
		var jqxhr = $.ajax(
		{
			url: 'plug.php?r=objects',
//			data: allbfinder.serialize() + '&' + $.param(slidersObj),
			dataType: "json",
			async: false
		}).done(function(arr)
		{
			arrJSON = arr;
			console.log('getAJAX',arrJSON);
		}).error(function(err)
		{
			alert('Please, contact admin with this error: ', err);
		});

		numb = arrJSON.length; // UPDATE количество объектов
			console.log('numb= ',numb);
	}


});