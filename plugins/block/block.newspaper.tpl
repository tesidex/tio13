<!-- BEGIN: BLOCK -->

<!-- BEGIN: PAGE_ROW -->

<section class="row-fluid">
    <div class="span3">
        <!-- IF {PAGE_ROW_AVATAR} -->
        <div>
            <a href="{PAGE_ROW_URL}">
                <!-- IF {PAGE_ROW_AVATAR|mb_strstr($this,'page_')} -->
                <img src="./datas/photos/thumb_{PAGE_ROW_AVATAR}" alt="" width="162" height="132">
                <!-- ELSE -->
                <img src="http://tio.by/uploads/fields_files/{PAGE_ROW_AVATAR}" alt="" width="162" height="132">
                <!-- ENDIF -->
                <img src="./datas/photos/thumb_{PAGE_AVATAR}" alt="" width="162" height="132">
            </a>
        </div>
        <!-- ENDIF -->
    </div>
    <div class="span9 newspaper">
        <p class="newsdetails margin0 paddingright10">{PAGE_ROW_DATE_STAMP|cot_date('d.m.Y', $this)}</p>
        <h3 class="jscut grey under"><a href="{PAGE_ROW_URL}" title="{PAGE_ROW_SHORTTITLE}">{PAGE_ROW_SHORTTITLE}</a></h3>
        <p>{PAGE_ROW_TEXT_CUT}</p>
    </div>
</section>

<!-- END: PAGE_ROW -->

<!-- END: BLOCK -->

