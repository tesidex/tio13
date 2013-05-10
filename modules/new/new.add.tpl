<!-- BEGIN: MAIN -->

		<div class="block">
			<h2 class="new">{NEWADD_NEWTITLE}</h2>
			{FILE "{PHP.cfg.themes_dir}/{PHP.cfg.defaulttheme}/warnings.tpl"}
			<form action="{NEWADD_FORM_SEND}" enctype="multipart/form-data" method="post" name="newform">
				<table class="cells">
					<tr>
						<td class="width30">{PHP.L.Category}:</td>
						<td class="width70">{NEWADD_FORM_CAT}</td>
					</tr>
					<tr>
						<td>{PHP.L.Title}:</td>
						<td>{NEWADD_FORM_TITLE}</td>
					</tr>
					<tr>
						<td>{PHP.L.Description}:</td>
						<td>{NEWADD_FORM_DESC}</td>
					</tr>
					<tr>
						<td>{PHP.L.Author}:</td>
						<td>{NEWADD_FORM_AUTHOR}</td>
					</tr>
					<tr>
						<td>{PHP.L.Alias}:</td>
						<td>{NEWADD_FORM_ALIAS}</td>
					</tr>
					<tr>
						<td>{PHP.L.new_metakeywords}:</td>
						<td>{NEWADD_FORM_KEYWORDS}</td>
					</tr>
					
					<tr>
						<td colspan="2">
							{NEWADD_FORM_TEXT}
							<!-- IF {NEWADD_FORM_PFS} -->{NEWADD_FORM_PFS}<!-- ENDIF -->
							<!-- IF {NEWADD_FORM_SFS} --><span class="spaced">{PHP.cfg.separator}</span>{NEWADD_FORM_SFS}<!-- ENDIF -->
						</td>
					</tr>
					<tr>
						<td>{PHP.L.new_file}:</td>
						<td>
							{NEWADD_FORM_FILE}
							<p>{PHP.L.new_filehint}</p>
						</td>
					</tr>
					<tr>
						<td>{PHP.L.URL}:<br />{PHP.L.new_urlhint}</td>
						<td>{NEWADD_FORM_URL}<br />{NEWADD_FORM_URL_PFS} &nbsp; {NEWADD_FORM_URL_SFS}</td>
					</tr>
					<tr>
						<td>{PHP.L.Filesize}:<br />{PHP.L.new_filesizehint}</td>
						<td>{NEWADD_FORM_SIZE}</td>
					</tr>
                                        <!-- IF {PHP.usr.maingrp} == 5 -->
                                            <tr>
						<td>{PHP.L.new_metatitle}:</td>
						<td>{NEWADD_FORM_METATITLE}</td>
					</tr>
					<tr>
						<td>{PHP.L.new_metadesc}:</td>
						<td>{NEWADD_FORM_METADESC}</td>
					</tr>
<!-- BEGIN: TAGS -->
					<tr>
						<td>{NEWADD_TOP_TAGS}:</td>
						<td>{NEWADD_FORM_TAGS} ({NEWADD_TOP_TAGS_HINT})</td>
					</tr>
<!-- END: TAGS -->
					<tr>
						<td>{PHP.L.Owner}:</td>
						<td>{NEWADD_FORM_OWNER}</td>
					</tr>
					<tr>
						<td>{PHP.L.Begin}:</td>
						<td>{NEWADD_FORM_BEGIN}</td>
					</tr>
					<tr>
						<td>{PHP.L.Expire}:</td>
						<td>{NEWADD_FORM_EXPIRE}</td>
					</tr>
					<tr>
						<td>{PHP.L.Parser}:</td>
						<td>{NEWADD_FORM_PARSER}</td>
					</tr>
                                        <!-- ENDIF -->
					<tr>
						<td colspan="2" class="valid">
							<!-- IF {PHP.usr_can_publish} -->
							<button type="submit" name="rnewstate" value="0">{PHP.L.Publish}</button>
							<!-- ENDIF -->
							<button type="submit" name="rnewstate" value="2" class="submit">{PHP.L.Saveasdraft}</button>
							<button type="submit" name="rnewstate" value="1">{PHP.L.Submitforapproval}</button>
						</td>
					</tr>
				</table>
			</form>
		</div>
		<div class="help">{PHP.L.new_formhint}</div>

<!-- END: MAIN -->