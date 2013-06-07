<!-- BEGIN: MAIN -->
<div class="row margintop10">
    {FILE "{PHP.cfg.themes_dir}/{PHP.theme}/inc/sidebar.tpl"}
    <div class="span8">
        <div class="row">
            <div class="span8">
                <!-- IF {PHP.usr.auth_write} -->
                <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#admin-page-options">
                    {PHP.L.Adminpanel}&nbsp;&nbsp;&nbsp;<i class="icon-circle-arrow-down icon-white"></i>
                    </button>
                    <div id="admin-page-options" class="collapse" style="margin-bottom: 10px;">
                        <ul class="unstyled">
                            <!-- IF {PHP.usr.isadmin} -->
                            <li><a href="{PHP|cot_url('admin')}">{PHP.L.Adminpanel}</a></li>
                            <!-- ENDIF -->
                            <li>{LIST_SUBMITNEWPAGE}</li>
                        </ul>
                    </div>
                    <!-- ENDIF -->
                </div>
            </div>
            <div class="row">

                <div class="span8 LIST_projects">
                    <h2>{LIST_CATTITLE}</h2>

                    <!-- BEGIN: PROJECTS_ROW -->
		    
                    <div class="row-fluid">
		    <h1>{PROJECTS_ROW_TAG}</h1>
		    <!-- BEGIN: PROJECTS -->
                        <!-- IF {PROJECTS_ROW_AVATAR} -->
                        <div class="span2">
                            <a href="{PROJECTS_ROW_URL}" class="thumbnail">
                                <!-- IF {PROJECTS_ROW_AVATAR|mb_strstr($this,'page_')} -->
                                <img src="./datas/photos/thumb_{PROJECTS_ROW_AVATAR}" alt="{PROJECTS_ROW_DESC}">
                                <!-- ELSE -->
                                <img src="http://tio.by/uploads/fields_files/{PROJECTS_ROW_AVATAR}" alt="{PROJECTS_ROW_DESC}">
                                <!-- ENDIF -->
                            </a>
			    <h3><a href="{PROJECTS_ROW_URL}">{PROJECTS_ROW_SHORTTITLE}</a></h3>
			    <!-- IF {PROJECTS_ROW_DESC} --><p>{PROJECTS_ROW_DESC}</p><!-- ENDIF -->
                        </div>
				
                            <!-- ENDIF -->

			<!-- END: PROJECTS -->
                          <hr class="clear" />
                  </div>
                        <!-- END: PROJECTS_ROW -->
                    
                </div>


                <div class="row">
                    <div class="span8">
                        <div class="well well-small">
                            {LIST_TAG_CLOUD}
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: MAIN -->
