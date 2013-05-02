<!-- BEGIN: NEWS -->
    <!-- BEGIN: PAGE_ROW -->
    <div class="row-fluid">
      <!-- IF {PAGE_ROW_AVATAR} -->
      <div class="span3">
        <a href="{PAGE_ROW_URL}" class="thumbnail">
	<!-- IF {PAGE_ROW_AVATAR|mb_strstr($this,'page_')} -->
	    <img src="./datas/photos/thumb_{PAGE_ROW_AVATAR}" alt="">
	<!-- ELSE -->
	<img src="http://tio.by/uploads/fields_files/{PAGE_ROW_AVATAR}" alt="">
	<!-- ENDIF -->
        </a>
      </div>
      <div class="span9">
      <!-- ELSE -->
      <div class="span12">
      <!-- ENDIF -->
        <h3><a href="{PAGE_ROW_URL}" title="{PAGE_ROW_SHORTTITLE}">{PAGE_ROW_SHORTTITLE}</a></h3>

        <span class="newsdetails">{PHP.L.blogster_postedon} {PAGE_ROW_DATE_STAMP|cot_date('l jS M Y', $this)} {PHP.L.blogster_in} {PAGE_ROW_CATPATH}
        <!-- IF {PAGE_ROW_COMMENTS_COUNT} > 0 -->
        &nbsp;&nbsp;|&nbsp;&nbsp;{PHP.L.comments_comments}:&nbsp;{PAGE_ROW_COMMENTS_COUNT}
        <!-- ENDIF -->
        <!-- IF {PHP.usr.isadmin} -->&nbsp;[ {PAGE_ROW_ADMIN_EDIT} ]<!-- ENDIF -->
        </span>

        <p>{PAGE_ROW_TEXT_CUT}</p>
        <!-- IF {PAGE_ROW_TEXT_IS_CUT} -->
          <br /><a href="{PAGE_ROW_URL}" class="btn btn-small btn-primary">{PHP.L.ReadMore}</a>
        <!-- ENDIF -->
      </div>
    </div>
    <hr class="clear divider" />
    <!-- END: PAGE_ROW -->
    <p class="paging">{PAGE_PAGEPREV}{PAGE_PAGENAV}{PAGE_PAGENEXT}</p>
<!-- END: NEWS -->