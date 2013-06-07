<!-- BEGIN: MAIN -->
<div class="row-fluid">
    <div class="span12">
        <h3>{NEWEDIT_PAGETITLE} #{NEWEDIT_FORM_ID}</h3>
        {FILE "{PHP.cfg.themes_dir}/{PHP.cfg.defaulttheme}/warnings.tpl"}
        <form action="{NEWEDIT_FORM_SEND}" enctype="multipart/form-data" method="post" name="pageform" class="form-horizontal">
            <div class="control-group">
                <label class="control-label">{PHP.L.Category}:</label>
                <div class="controls">
                    {NEWEDIT_FORM_CAT}
                </div>
            </div>
            <hr />
	    <!-- IF {PHP.dict_id} -->
            <!-- BEGIN: TAGS -->
            <div class="control-group">
                <label class="control-label">{NEWEDIT_TOP_TAGS}:</label>
                <div class="controls">
                    {NEWEDIT_FORM_TAGS}<span class="help-inline">({NEWEDIT_TOP_TAGS_HINT})</span>
                </div>
            </div>
            <!-- END: TAGS -->
	    <!-- ENDIF -->
            <div class="control-group">
                <label class="control-label">{NEWEDIT_FORM_COUNTRY_TITLE}:</label>
                <div class="controls">
                    {NEWEDIT_FORM_COUNTRY}
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">{PHP.L.Title}:</label>
                <div class="controls width60">
                    {NEWEDIT_FORM_TITLE}
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">{PHP.L.Description}:</label>
                <div class="controls">
                    {NEWEDIT_FORM_DESC}
                </div>
            </div>
            <hr />
            {NEWEDIT_FORM_TEXT}
            <!-- IF {NEWEDIT_FORM_PFS} -->{NEWEDIT_FORM_PFS}<!-- ENDIF -->
            <!-- IF {NEWEDIT_FORM_SFS} -->{NEWEDIT_FORM_SFS}<!-- ENDIF -->
            <hr />
            <div class="control-group">
                <label class="control-label">{PHP.L.Author}:</label>
                <div class="controls">
                    {NEWEDIT_FORM_AUTHOR}
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">{NEWEDIT_FORM_AVATAR_TITLE}:</label>
                <div class="controls">
                    {NEWEDIT_FORM_AVATAR}
                    <!-- IF {NEWEDIT_FORM_AVATARFILE} -->{PHP.L.Uploaded}: {NEWEDIT_FORM_AVATARFILE}<br /> {PHP.L.Delete}: {NEWEDIT_FORM_AVATARDELETE}<!-- ENDIF -->
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">{NEWEDIT_FORM_SIGNATURE_TITLE}:</label>
                <div class="controls">
                    {NEWEDIT_FORM_SIGNATURE}
                </div>
            </div>
            <hr />
            <div class="control-group">
                <label class="control-label">{NEWEDIT_FORM_COMPANY_TITLE}:</label>
                <div class="controls">
                    {NEWEDIT_FORM_COMPANY}
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">{NEWEDIT_FORM_IS_COMMENT_TITLE}:</label>
                <div class="controls">
                    {NEWEDIT_FORM_IS_COMMENT}
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">{NEWEDIT_FORM_IS_RSS_TUTBY_TITLE}:</label>
                <div class="controls">
                    {NEWEDIT_FORM_IS_RSS_TUTBY}
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">{NEWEDIT_FORM_MAIN_TITLE}:</label>
                <div class="controls">
                    {NEWEDIT_FORM_MAIN}
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">{NEWEDIT_FORM_SUBJECT_TITLE}:</label>
                <div class="controls">
                    {NEWEDIT_FORM_SUBJECT}
                </div>
            </div>
            <div class="control-group editdate">
                <label class="control-label">{PHP.L.Date}:</label>
                <div class="controls">
                    {NEWEDIT_FORM_DATE}
                </div>
            </div>

            <div class="control-group">
                <label class="control-label">{PHP.L.Alias}:</label>
                <div class="controls">
                    {NEWEDIT_FORM_ALIAS}
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">{PHP.L.Keywords}:</label>
                <div class="controls">
                    {NEWEDIT_FORM_KEYWORDS}
                </div>
            </div>


            <div class="control-group">
                <label class="control-label">{PHP.L.page_file}:</label>
                <div class="controls">
                    {NEWEDIT_FORM_FILE} {PHP.themelang.pageadd.Filehint}
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">{PHP.L.URL}:</label>
                    <div class="controls">
                        {NEWEDIT_FORM_URL}<!-- IF {NEWEDIT_FORM_PFS_URL_USER} -->&nbsp;{NEWEDIT_FORM_PFS_URL_USER}<!-- ENDIF --><!-- IF {NEWEDIT_FORM_PFS_URL_SITE} -->&nbsp; {NEWEDIT_FORM_PFS_URL_SITE}<!-- ENDIF --><span class="help-inline">{PHP.L.page_urlhint}</span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">{PHP.L.page_filesize}:</label>
                        <div class="controls">
                            {NEWEDIT_FORM_SIZE}<span class="help-inline">{PHP.L.page_filesizehint}</span>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">{PHP.L.page_filehitcount}:</label>
                            <div class="controls">
                                {NEWEDIT_FORM_FILECOUNT}<span class="help-inline">{PHP.L.page_filehitcounthint}</span>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><span class="label label-important">{PHP.L.page_deletepage}:</span></label>
                                <div class="controls">
                                    {NEWEDIT_FORM_DELETE}
                                </div>
                            </div>
                              <!-- IF {PHP.usr.maingrp} == 5 -->
                            <div class="control-group">
                                <label class="control-label">{PHP.L.Begin}:</label>
                                <div class="controls">
                                    {NEWEDIT_FORM_BEGIN}
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">{PHP.L.Expire}:</label>
                                <div class="controls">
                                    {NEWEDIT_FORM_EXPIRE}
                                </div>
                            </div>
                            <hr />
                            <div class="control-group">
                                <label class="control-label">{PHP.L.Status}:</label>
                                <div class="controls">
                                    {NEWEDIT_FORM_LOCALSTATUS}
                                </div>
                            </div>

                            <!-- BEGIN: ADMIN -->
                            <div class="control-group">
                                <label class="control-label">{PHP.L.Owner}:</label>
                                <div class="controls">
                                    {NEWEDIT_FORM_OWNERID}
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">{PHP.L.Hits}:</label>
                                <div class="controls">
                                    {NEWEDIT_FORM_PAGECOUNT}
                                </div>
                            </div>
                            <!-- END: ADMIN -->
                            <div class="control-group">
                                <label class="control-label">{PHP.L.Parser}:</label>
                                <div class="controls">
                                    {NEWEDIT_FORM_PARSER}
                                </div>
                            </div>
                            <!-- ENDIF -->
                            <!-- IF {PHP.usr_can_publish} -->
                            <button type="submit" name="rpagestate" value="0" class="btn btn-success">{PHP.L.Publish}</button>&nbsp;
                            <!-- ENDIF -->
                            <button type="submit" name="rpagestate" value="2" class="btn">{PHP.L.Saveasdraft}</button>
                            <button type="submit" name="rpagestate" value="1" class="btn">{PHP.L.Submitforapproval}</button>

                        </form>
                    </div>
                </div>
                <!-- END: MAIN -->