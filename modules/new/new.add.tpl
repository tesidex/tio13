<!-- BEGIN: MAIN -->
<div class="row-fluid">
    <div class="span12">
        <h3>{NEWADD_NEWTITLE}</h3>
        {FILE "{PHP.cfg.themes_dir}/{PHP.cfg.defaulttheme}/warnings.tpl"}
        <form action="{NEWADD_FORM_SEND}" enctype="multipart/form-data" method="post" name="newform" class="form-horizontal">
            <div class="control-group">
                <label class="control-label">{PHP.L.Category}:</label>
                <div class="controls">
                    {NEWADD_FORM_CAT}
                </div>
            </div>
            <hr />
            <!-- BEGIN: TAGS -->
            <div class="control-group">
                <label class="control-label">{NEWADD_TOP_TAGS}:</label>
                <div class="controls">
                    {NEWADD_FORM_TAGS} ({NEWADD_TOP_TAGS_HINT})
                </div>
            </div>
            <!-- END: TAGS -->
            <div class="control-group">
                <label class="control-label">{NEWADD_FORM_COUNTRY_TITLE}:</label>
                <div class="controls">
                    {NEWADD_FORM_COUNTRY}
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">{PHP.L.Title}:</label>
                <div class="controls">
                    {NEWADD_FORM_TITLE}
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">{PHP.L.Description}:</label>
                <div class="controls">
                    {NEWADD_FORM_DESC}
                </div>
            </div>
            <hr />
            {NEWADD_FORM_TEXT}
            <!-- IF {NEWADD_FORM_PFS} -->{NEWADD_FORM_PFS}<!-- ENDIF -->
            <!-- IF {NEWADD_FORM_SFS} -->{NEWADD_FORM_SFS}<!-- ENDIF -->
            <hr />  
            <div class="control-group">
                <label class="control-label">{PHP.L.Author}:</label>
                <div class="controls">
                    {NEWADD_FORM_AUTHOR}
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">{NEWADD_FORM_AVATAR_TITLE}:</label>
                <div class="controls">
                    {NEWADD_FORM_AVATAR}
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">{NEWADD_FORM_SIGNATURE_TITLE}:</label>
                <div class="controls">
                    {NEWADD_FORM_SIGNATURE}
                </div>
            </div>
            <hr />
            <div class="control-group">
                <label class="control-label">{NEWADD_FORM_COMPANY_TITLE}:</label>
                <div class="controls">
                    {NEWADD_FORM_COMPANY}
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">{NEWADD_FORM_IS_COMMENT_TITLE}:</label>
                <div class="controls">
                    {NEWADD_FORM_IS_COMMENT}
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">{NEWADD_FORM_IS_RSS_TUTBY_TITLE}:</label>
                <div class="controls">
                    {NEWADD_FORM_IS_RSS_TUTBY}
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">{NEWADD_FORM_SUBJECT_TITLE}:</label>
                <div class="controls">
                    {NEWADD_FORM_SUBJECT}
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">{NEWADD_FORM_MAIN_TITLE}:</label>
                <div class="controls">
                    {NEWADD_FORM_MAIN}
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">{PHP.L.Alias}:</label>
                <div class="controls">
                    {NEWADD_FORM_ALIAS}
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">{PHP.L.Keywords}:</label>
                <div class="controls">
                    {NEWADD_FORM_KEYWORDS}
                </div>
            </div>


            <div class="control-group">
                <label class="control-label">{PHP.L.new_file}:</label>
                <div class="controls">
                    {NEWADD_FORM_FILE} {PHP.L.new_filehint}
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">{PHP.L.URL}:</label>
                    <div class="controls">
                        {NEWADD_FORM_URL} &nbsp; {NEWADD_FORM_PFS_URL_USER} &nbsp; {NEWADD_FORM_PFS_URL_SITE}
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">{PHP.L.Filesize}:</label>
                    <div class="controls">
                        {NEWADD_FORM_SIZE} {PHP.L.new_filesizehint}
                        </div>
                    </div>

<!-- IF {PHP.usr.maingrp} == 5 -->
                    <div class="control-group">
                        <label class="control-label">{PHP.L.Begin}:</label>
                        <div class="controls">
                            {NEWADD_FORM_BEGIN}
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">{PHP.L.Expire}:</label>
                        <div class="controls">
                            {NEWADD_FORM_EXPIRE}
                        </div>
                    </div>

                    <!-- BEGIN: ADMIN -->
                    <div class="control-group">
                        <label class="control-label">{PHP.L.Owner}:</label>
                        <div class="controls">
                            {NEWADD_FORM_OWNER}
                        </div>
                    </div>
                    <!-- END: ADMIN -->
                    <div class="control-group">
                        <label class="control-label">{PHP.L.Parser}:</label>
                        <div class="controls">
                            {NEWADD_FORM_PARSER}
                        </div>
                    </div>
                    <!-- ENDIF -->      

                    <!-- IF {PHP.usr_can_publish} -->
                    <button type="submit" name="rnewstate" value="0" class="btn btn-success">{PHP.L.Publish}</button>&nbsp;
                    <!-- ENDIF -->
                    <button type="submit" name="rnewstate" value="2" class="btn">{PHP.L.Saveasdraft}</button>
                    <button type="submit" name="rnewstate" value="1" class="btn">{PHP.L.Submitforapproval}</button>
                </form>
                <div class="help">{PHP.L.new_formhint}</div>
            </div>
        </div>
        <!-- END: MAIN -->