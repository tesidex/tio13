<!-- BEGIN: BLOCK -->
<!-- BEGIN: PAGE_ROW -->
<div class="row-fluid">

    <div class="span3">
        <span class="newsdetails">{PAGE_ROW_DATE_STAMP|cot_date('d.m.Y', $this)} </span>
    </div>
    <div class="span9">
        <h3><a href="{PAGE_ROW_URL}" title="{PAGE_ROW_SHORTTITLE}">{PHP.pag.new_title|substr($this, 0, 20)}</a></h3>
        <!-- IF {PHP.usr.isadmin} -->&nbsp;[ {PAGE_ROW_ADMIN_EDIT} ]<!-- ENDIF -->
    </div>
    <div class="span12">
        <p>{PAGE_ROW_TEXT_CUT}</p>
    </div>
</div>

<!-- END: PAGE_ROW -->

<!-- END: BLOCK -->