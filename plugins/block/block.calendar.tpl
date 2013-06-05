<!-- BEGIN: BLOCK -->

<!-- BEGIN: PAGE_ROW -->
<section class="row-fluid">
    <div class="span12">
        <h3><a class="theme" href="{PAGE_ROW_URL}" title="{PAGE_ROW_SHORTTITLE}">{PAGE_ROW_SHORTTITLE}</a></h3>
        <p>{PAGE_ROW_DESC}</p>
        <!-- IF {PAGE_ROW_AVATAR} -->
        <div>
            <a href="{PAGE_ROW_URL}" class="pull-left marginright10">
                <!-- IF {PAGE_ROW_AVATAR|mb_strstr($this,'page_')} -->
                <img src="./datas/photos/thumb_{PAGE_ROW_AVATAR}" alt="" width="90" height="70">
                <!-- ELSE -->
                <img src="http://tio.by/uploads/fields_files/{PAGE_ROW_AVATAR}" alt="" width="90" height="70">
                <!-- ENDIF -->
            </a>
        </div>
        <!-- ENDIF -->
    </div>
</section>

<!-- END: PAGE_ROW -->

<!-- END: BLOCK -->
