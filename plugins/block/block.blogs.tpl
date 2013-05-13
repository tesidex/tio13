<!-- BEGIN: BLOCK -->

<!-- BEGIN: PAGE_ROW -->

<div class="span4">
    <article>
    <div class="row-fluid">
        
            <div class="span3 margin0">
                <!-- IF {PAGE_ROW_AVATAR} -->
                <div>
                    <a href="{PAGE_ROW_URL}">
                        <!-- IF {PAGE_ROW_AVATAR|mb_strstr($this,'page_')} -->
                        <img src="./datas/photos/thumb_{PAGE_ROW_AVATAR}" alt="">
                        <!-- ELSE -->
                        <img src="http://tio.by/uploads/fields_files/{PAGE_ROW_AVATAR}" alt="">
                        <!-- ENDIF -->
                        <img src="./datas/photos/thumb_{PAGE_AVATAR}" alt="">
                    </a>
                </div>
                <!-- ENDIF -->
                <img class="pull-left marginright10" src="themes/{PHP.theme}/img/IDX_blog.jpg" alt="" width="90" height="70" />
            </div>
            <div class="span9">
                <p class="small_grey pull-left"><!--IF {PAGE_ROW_AUTHOR} --><strong>{PAGE_ROW_AUTHOR}</strong><!-- ENDIF --></p>
                <span class="newsdetails">{PAGE_ROW_DATE_STAMP|cot_date('d.m.Y', $this)} </span>
                <h3 class="jscut"><a href="{PAGE_ROW_URL}" title="{PAGE_ROW_SHORTTITLE}">{PAGE_ROW_SHORTTITLE}</a></h3>

                {PAGE_ROW_TEXT_CUT}
                <p class="comments">({PAGE_ROW_COMMENTS_COUNT}) | <a href="{PAGE_ROW_COMMENTS}"> Комментировать</a></p>
            </div>
        
    </div>
            </article>
            
</div>


<!-- END: PAGE_ROW -->

<!-- END: BLOCK -->