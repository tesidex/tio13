<!-- BEGIN: MAIN -->

		<div class="col3-2 first">
			<div class="block">
				<h2 class="page">{NEW_TITLE}</h2>
				<div class="combox">{NEW_COMMENTS_COUNT}</div>
				<h3>{NEW_SHORTTITLE}</h3>
				<!-- IF {NEW_DESC} --><p class="small">{NEW_DESC}</p><!-- ENDIF -->
				<div class="clear desc">
					<p class="column">
						<strong>{PHP.L.Tags}:</strong>
<!-- BEGIN: NEW_TAGS_ROW -->
						<!-- IF {PHP.tag_i} > 0 -->, <!-- ENDIF --><a href="{NEW_TAGS_ROW_URL}" title="{NEW_TAGS_ROW_TAG}" rel="nofollow">{NEW_TAGS_ROW_TAG}</a>
<!-- END: NEW_TAGS_ROW -->
<!-- BEGIN: NEW_NO_TAGS -->
						{NEW_NO_TAGS}
<!-- END: NEW_NO_TAGS -->
					</p>
					<p class="column floatright">
						<strong>{PHP.L.Filedunder}:</strong>{NEW_CATPATH}
					</p>
				</div>
				<div class="clear textbox">{NEW_TEXT}</div>
<!-- BEGIN: NEW_FILE -->
				<div class="download">
<!-- BEGIN: MEMBERSONLY -->
					<p>{NEW_SHORTTITLE}</p>
<!-- END: MEMBERSONLY -->
<!-- BEGIN: DOWNLOAD -->
					<p>{PHP.L.Download}: <a class="strong" href="{NEW_FILE_URL}">{NEW_SHORTTITLE}</a></p>
<!-- END: DOWNLOAD -->
					<p>{PHP.L.Filesize}, kB: {NEW_FILE_SIZE}{PHP.L.kb}</p>
					<p>{PHP.L.Downloaded}: {NEW_FILE_COUNT}</p>
				</div>
<!-- END: NEW_FILE -->
			</div>
			{NEW_COMMENTS_DISPLAY}
		</div>

		<div class="col3-1">
<!-- BEGIN: NEW_ADMIN -->
			<div class="block">
				<h2 class="admin">{PHP.L.Adminpanel}</h2>
				<ul class="bullets">
					<!-- IF {PHP.usr.isadmin} -->
					<li><a href="{PHP|cot_url('admin')}">{PHP.L.Adminpanel}</a></li>
					<!-- ENDIF -->
					<li><a href="{NEW_CAT|cot_url('new','m=add&c=$this')}">{PHP.L.new_addtitle}</a></li>
					<li>{NEW_ADMIN_UNVALIDATE}</li>
					<li>{NEW_ADMIN_EDIT}</li>
					<li>{NEW_ADMIN_CLONE}</li>
					<li>{NEW_ADMIN_DELETE}</li>
				</ul>
			</div>
<!-- END: NEW_ADMIN -->
			{FILE "{PHP.cfg.themes_dir}/{PHP.theme}/inc/contact.tpl"}
<!-- BEGIN: NEW_MULTI -->
			<div class="block">
				<h2 class="info">{PHP.L.Summary}:</h2>
				{NEW_MULTI_TABTITLES}
				<p class="paging">{NEW_MULTI_TABNAV}</p>
			</div>
<!-- END: NEW_MULTI -->
		</div>

<!-- END: MAIN -->