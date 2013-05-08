<!-- BEGIN: BLOCK -->

<div class="row">
    <div class="span8 IDX_news">

	<ul class="nav nav-tabs" id="myTab">

	    <!-- BEGIN: TABS_ROW -->
	    <li
	    <!-- IF {PHP.jj} == 1 -->
		      class="active"
	    <!-- ENDIF -->
	    >
		<h3><a data-toggle="tab" href="#{TABS_ROW_ID}" title="{TABS_ROW_SHORTTITLE}">{TABS_ROW_SHORTTITLE}</a></h3>
	    </li>

	    <!-- END: TABS_ROW -->

	</ul>
    </div>
</div>

<div class="row">
    <div class="span8">
	<div class="tab-content">
	    <!-- BEGIN: PAGE_ROW -->

	    <div class="tab-pane
	    <!-- IF {PHP.jj} == 1 -->
		     active
	    <!-- ENDIF -->
		     " id="{PAGE_ROW_ID}" class="IDX_article">

		<img class="pull-left marginright10" src="themes/{PHP.theme}/img/IDX_article.jpg" alt="" width="250" height="188" />
		<p class="date">{PAGE_ROW_DATE}</p>
		<p>{PAGE_ROW_TEXT_CUT}</p>
		<p>{PAGE_ROW_OWNER_ID}</p>{PAGE_ROW_URL}
		<p>{PAGE_ROW_AUTHOR}</p>
		<a href="#" class="btn">Читать далее</a>
	    </div>

	    <!-- END: PAGE_ROW -->
	</div>
    </div>
</div>

<script>

 $(function () {
$('#myTab a:first').tab('show');
})
</script>


<!-- END: BLOCK -->