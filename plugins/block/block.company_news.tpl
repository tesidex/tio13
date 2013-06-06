<!-- BEGIN: BLOCK -->

<!-- BEGIN: PAGE_ROW -->
<section class="row-fluid">
    <div class="span12 hot">
	<h2><a href="{PHP|cot_url('new', 'c=company-news')}">Новости компаний</a></h2>
        <!-- IF {PAGE_ROW_AVATAR} -->
        <div class="pull-left">
            <a href="{PAGE_ROW_URL}" class="pull-left marginright10">
                <!-- IF {PAGE_ROW_AVATAR|mb_strstr($this,'page_')} -->
                <img src="./datas/photos/thumb_{PAGE_ROW_AVATAR}" alt="" width="90" height="70">
                <!-- ELSE -->
                <img src="http://tio.by/uploads/fields_files/{PAGE_ROW_AVATAR}" alt="" width="90" height="70">
        <!-- ENDIF -->
            </a>
        </div>
        <!-- ENDIF -->
        <h3 class="jscut"><a class="theme" href="{PAGE_ROW_URL}" title="{PAGE_ROW_TITLE}">{PAGE_ROW_SHORTTITLE}</a></h3>
    </div>
</section>

<!-- END: PAGE_ROW -->

<!-- END: BLOCK -->
