<!-- BEGIN: OBJECTSSEARCH -->
<div>
    <form method="POST">
	<p>{SEARCH_REGION_SELECT}</p>
	<p>{SEARCH_DISTRICT_SELECT}</p>
	<p>{SEARCH_LOCATION_SELECT}</p>
	<p>{SEARCH_OBJECTTYPE_SELECT}</p>
	<button type="submit">Поиск</button>
    </form>
</div>
<script>
    $(function() {

    var regSelectObj = $( "select[name=selregions]" ),
	dstSelectObj = $( "select[name=seldistricts]" ),
	locSelectObj = $( "select[name=sellocations]" );

    regSelectObj.change(function(event) {

    var regVal = $( this ).val();
    console.log( regSelectObj, locSelectObj );
    if ( regVal ) {
	$.ajax(
		{
		    url: 'plug.php?r=objects',
		    data: 'x={PHP.sys.xk}&regVal='+regVal+'&mode=regions'
		}).done(function(echo)
		{
//		    alert(echo);
		    dstSelectObj.html(echo);
	    }).fail(function(err)
		{

	    alert('Please, contact admin with this error: ', err);
	});
	$.ajax(
		{
		url: 'plug.php?r=objects',
		data: 'x={PHP.sys.xk}&regVal='+regVal+'&mode=regions2'
	   }).done(function(echo)
		{
	   //		    alert(echo);
	   locSelectObj.html(echo);
      }).fail(function(err)
		{
      
      alert('Please, contact admin with this error: ', err);
 });
    }

	event.preventDefault();
    })
    
    dstSelectObj.change(function(event) {

    var dstVal = $( this ).val();
    console.log( dstSelectObj, locSelectObj );
    if ( dstVal ) {
	$.ajax(
		{
		    url: 'plug.php?r=objects',
		    data: 'x={PHP.sys.xk}&dstVal='+dstVal+'&mode=districts'
		}).done(function(echo)
		{
//		    alert(echo);
		    locSelectObj.html(echo);
	    }).fail(function(err)
		{

	    alert('Please, contact admin with this error: ', err);
	});
    }

	event.preventDefault();
    });
    
    
    
    
});
</script>
<!-- END: OBJECTSSEARCH -->