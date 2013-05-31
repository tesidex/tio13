<!-- BEGIN: BLOCK -->

<!-- BEGIN: PAGE_ROW -->

<section class="row-fluid gallery">
    <article class="span6">
        <!-- IF {PAGE_ROW_AVATAR} -->
        <div>
            <a href="{PAGE_ROW_URL}">
                <!-- IF {PAGE_ROW_AVATAR|mb_strstr($this,'page_')} -->
                <img src="./datas/photos/thumb_{PAGE_ROW_AVATAR}" alt="" width="162" height="132">
                <!-- ELSE -->
                <img src="http://tio.by/uploads/fields_files/{PAGE_ROW_AVATAR}" alt="" width="162" height="132">
                <!-- ENDIF -->
            </a>
        </div>
        <!-- ENDIF -->
        <h3 class="jscut grey under"><a href="{PAGE_ROW_URL}" title="{PAGE_ROW_SHORTTITLE}">{PAGE_ROW_SHORTTITLE}</a></h3>
    </article>
    <article class="span6">
        <!-- IF {PAGE_ROW_AVATAR} -->
        <div>
            <a href="{PAGE_ROW_URL}">
                <!-- IF {PAGE_ROW_AVATAR|mb_strstr($this,'page_')} -->
                <img src="./datas/photos/thumb_{PAGE_ROW_AVATAR}" alt="" width="162" height="132">
                <!-- ELSE -->
                <img src="http://tio.by/uploads/fields_files/{PAGE_ROW_AVATAR}" alt="" width="162" height="132">
                <!-- ENDIF -->
            </a>
        </div>
        <!-- ENDIF -->
        <h3 class="jscut grey under"><a href="{PAGE_ROW_URL}" title="{PAGE_ROW_SHORTTITLE}">{PAGE_ROW_SHORTTITLE}</a></h3>
    </article>
</section>

<!-- END: PAGE_ROW -->

<!-- END: BLOCK -->

