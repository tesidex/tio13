<!-- BEGIN: MAIN -->
<div class="row margintop10">
    {FILE "{PHP.cfg.themes_dir}/{PHP.theme}/inc/sidebar.tpl"}
    <div class="span8">
        <div class="row">
            <div class="span8">
                <!-- IF {PHP.usr.auth_write} -->
                <div>
                    <h3>{PHP.L.Admin}</h3>
                    <ul>
                        <!-- IF {PHP.usr.isadmin} -->
                        <li><a href="{PHP|cot_url('admin')}">{PHP.L.Adminpanel}</a></li>
                        <!-- ENDIF -->
                        <li>{LIST_SUBMITNEWNEW}</li>
                    </ul>
                </div>
                <!-- ENDIF -->
            </div>
        </div>
        <div class="row">

            <div class="span8">
                <h2>{LIST_CATTITLE}</h2>
                <!-- BEGIN: LIST_ROWCAT -->
                <h3><a href="{LIST_ROWCAT_URL}" title="{LIST_ROWCAT_TITLE}">{LIST_ROWCAT_TITLE}</a> ({LIST_ROWCAT_COUNT})</h3>
                <!-- IF {LIST_ROWCAT_DESC} -->
                <p class="small">{LIST_ROWCAT_DESC}</p>
                <!-- ENDIF -->
                <!-- END: LIST_ROWCAT -->

                <!-- BEGIN: LIST_ROW -->
                <article>
                    <div class="row-fluid">
                        <!-- IF {LIST_ROW_AVATAR} -->
                        <div class="span2">
                            <a href="{LIST_ROW_URL}" class="thumbnail">
                                <!-- IF {LIST_ROW_AVATAR|mb_strstr($this,'page_')} -->
                                <img src="./datas/photos/thumb_{LIST_ROW_AVATAR}" alt="">
                                <!-- ELSE -->
                                <img src="http://tio.by/uploads/fields_files/{LIST_ROW_AVATAR}" alt="">
                                <!-- ENDIF -->
                            </a>
                        </div>
                        <div class="span10">
                            <!-- ELSE -->
                            <div class="span12">
                                <!-- ENDIF -->
                                <h1><a href="{LIST_ROW_URL}">{LIST_ROW_SHORTTITLE}</a></h1>
                                <!-- IF {LIST_ROW_DESC} --><p class="small marginbottom10">{LIST_ROW_DESC}</p><!-- ENDIF -->
                                <!-- IF {PHP.usr.isadmin} --><p class="small marginbottom10">{LIST_ROW_ADMIN} ({LIST_ROW_COUNT})</p><!-- ENDIF -->
                                <div>
                                    {LIST_ROW_TEXT_CUT}
                                    <!-- IF {LIST_ROW_TEXT_IS_CUT} --><span class="more">{LIST_ROW_MORE}</span><!-- ENDIF -->
                                </div>
                            </div>
                        </div>
                        <hr />
                </article>
                <!-- END: LIST_ROW -->
            </div>
            <!-- IF {LIST_TOP_PAGINATION} -->
            <p class="paging clear"><span class="paddingright10">{PHP.L.New} {LIST_TOP_CURRENTNEW} {PHP.L.Of} {LIST_TOP_TOTALNEWS}</span>{LIST_TOP_NEWPREV}{LIST_TOP_PAGINATION}{LIST_TOP_NEWNEXT}</p>
            <!-- ENDIF -->
        </div>
        <div class="row">
            <div class="span8">
                <h2 class="tags">{PHP.L.Tags}</h2>
                {LIST_TAG_CLOUD}
            </div>
        </div>
    </div>

</div>

<!-- END: MAIN -->