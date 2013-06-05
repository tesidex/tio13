<!-- BEGIN: BLOCK -->

<div class="row">
    <div class="span8 IDX_news">

	<ul class="nav nav-tabs" id="IDXTabs">
	    <!-- BEGIN: TABS_ROW -->
	    <li>
		<a data-toggle="tab" href="#{TABS_ROW_ID}" title="{TABS_ROW_SHORTTITLE}">
		    <h3>{TABS_ROW_SHORTTITLE}</h3>
		</a>
	    </li>
	    <!-- END: TABS_ROW -->
	</ul>
		
    </div>
</div>

<div class="row">
    <div class="span8">
	<div class="tab-content">
	    <!-- BEGIN: PAGE_ROW -->

	    <div id="{PAGE_ROW_ID}" class="IDX_article tab-pane">

		<!-- IF {PAGE_ROW_AVATAR|mb_strstr($this,'page_')} -->
                <img class="pull-left marginright10" src="./datas/photos/thumb_{PAGE_ROW_AVATAR}" alt="" width="250" height="188">
                <!-- ELSE -->
                <img class="pull-left marginright10" src="http://tio.by/uploads/fields_files/{PAGE_ROW_AVATAR}" alt="" width="250" height="188">
                <!-- ENDIF -->

		<p class="date">{PAGE_ROW_DATE}</p>
		<p>{PAGE_ROW_TEXT_CUT}</p>
		
                <a href="{PAGE_ROW_URL}" class="btn">Читать далее</a>
	    </div>

	    <!-- END: PAGE_ROW -->
	</div>
    </div>
</div>

<!-- END: BLOCK -->