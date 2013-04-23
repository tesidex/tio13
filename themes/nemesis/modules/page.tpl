<!-- BEGIN: MAIN -->
<script type="text/javascript" src="/plugins/objects/js/ajax.js" ></script>

<div class="col3-2 first">
    <div class="block">
	<nav class="navpage">
	    <h2 class="hidden">Вы здесь</h2>
	    {PAGE_TITLE}
	</nav>
	<div class="combox">{PAGE_COMMENTS_COUNT}</div>
	<h3>{PAGE_SHORTTITLE}</h3>
	<!-- IF {PAGE_DESC} --><p class="small">{PAGE_DESC}</p><!-- ENDIF -->
	<div class="clear desc">
	    <p class="column">
		<strong>{PHP.L.Tags}:</strong>
		<!-- BEGIN: PAGE_TAGS_ROW -->
								<!-- IF {PHP.tag_i} > 0 -->, <!-- ENDIF --><a href="{PAGE_TAGS_ROW_URL}" title="{PAGE_TAGS_ROW_TAG}" rel="nofollow">{PAGE_TAGS_ROW_TAG}</a>
		<!-- END: PAGE_TAGS_ROW -->
		<!-- BEGIN: PAGE_NO_TAGS -->
		{PAGE_NO_TAGS}
		<!-- END: PAGE_NO_TAGS -->
	    </p>
	    <p class="column floatright">
		<strong>{PHP.L.Filedunder}:</strong>{PAGE_CATPATH}
	    </p>
	</div>
	<div class="clear textbox">{PAGE_TEXT}</div>
	<!-- BEGIN: PAGE_FILE -->
	<div class="download">
	    <!-- BEGIN: MEMBERSONLY -->
	    <p>{PAGE_SHORTTITLE}</p>
	    <!-- END: MEMBERSONLY -->
	    <!-- BEGIN: DOWNLOAD -->
	    <p>{PHP.L.Download}: <a class="strong" href="{PAGE_FILE_URL}">{PAGE_SHORTTITLE}</a></p>
	    <!-- END: DOWNLOAD -->
	    <p>{PHP.L.Filesize}, kB: {PAGE_FILE_SIZE}{PHP.L.kb}</p>
	    <p>{PHP.L.Downloaded}: {PAGE_FILE_COUNT}</p>
	</div>
	<!-- END: PAGE_FILE -->
    </div>
    {PAGE_COMMENTS_DISPLAY}
    			
</div>

<div class="col3-1">
    <div class="block">
     {PAGE_OBJECTSSEARCH}
    </div>
    <!-- BEGIN: PAGE_ADMIN -->
    <div class="block">
	<h2 class="admin">{PHP.L.Adminpanel}</h2>
	<ul class="bullets">
	    <!-- IF {PHP.usr.isadmin} -->
	    <li><a href="{PHP|cot_url('admin')}">{PHP.L.Adminpanel}</a></li>
	    <!-- ENDIF -->
	    <li><a href="{PAGE_CAT|cot_url('page','m=add&c=$this')}">{PHP.L.page_addtitle}</a></li>
	    <li>{PAGE_ADMIN_UNVALIDATE}</li>
	    <li>{PAGE_ADMIN_EDIT}</li>
	    <li>{PAGE_ADMIN_DELETE}</li>
	</ul>
    </div>
    <!-- END: PAGE_ADMIN -->
    <div class="block">
	<h2 class="info">Вся арх.:</h2>
	<!-- BEGIN: ARCHITECTURES_ROW -->
	<p><a href="{ARCHITECTURES_ROW_URL}" title="{ARCHITECTURES_ROW_SHORTTITLE}" >{ARCHITECTURES_ROW_SHORTTITLE}</a></p>
	<!-- END: ARCHITECTURES_ROW -->
    </div>
    <div class="block">
	<h2 class="info">Все города:</h2>

	<!-- BEGIN: LOCATIONS_ROW -->
	<p><a href="{LOCATIONS_ROW_URL}" title="{LOCATIONS_ROW_SHORTTITLE}" >{LOCATIONS_ROW_SHORTTITLE}</a></p>
	<!-- END: LOCATIONS_ROW -->
    </div>
    <div class="block">
	<h2 class="info">Все районы:</h2>

	<!-- BEGIN: DISTRICTS_ROW -->
	<p><a href="{DISTRICTS_ROW_URL}" title="{DISTRICTS_ROW_SHORTTITLE}" >{DISTRICTS_ROW_SHORTTITLE}</a></p>
	<!-- END: DISTRICTS_ROW -->
    </div>
				{PHP|pagearchive('newspaper')}
</div>

<!-- END: MAIN -->