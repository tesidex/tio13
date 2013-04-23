<!-- BEGIN: MAIN -->

		<div class="block">
			<h2 class="new">{NEWEDIT_NEWTITLE} #{NEWEDIT_FORM_ID}</h2>
			{FILE "{PHP.cfg.themes_dir}/{PHP.cfg.defaulttheme}/warnings.tpl"}
			<form action="{NEWEDIT_FORM_SEND}" enctype="multipart/form-data" method="post" name="newform">
				<table class="cells">
					<tr>
						<td class="width30">{PHP.L.Category}:</td>
						<td class="width70">{NEWEDIT_FORM_CAT}</td>
					</tr>
					<tr>
						<td>{PHP.L.Title}:</td>
						<td>{NEWEDIT_FORM_TITLE}</td>
					</tr>
					<tr>
						<td>{PHP.L.Description}:</td>
						<td>{NEWEDIT_FORM_DESC}</td>
					</tr>
					<tr>
						<td>{PHP.L.Author}:</td>
						<td>{NEWEDIT_FORM_AUTHOR}</td>
					</tr>
					<tr>
						<td>{PHP.L.Date}:</td>
						<td>{NEWEDIT_FORM_DATE}</td>
					</tr>
					<tr>
						<td>{PHP.L.Begin}:</td>
						<td>{NEWEDIT_FORM_BEGIN}</td>
					</tr>
					<tr>
						<td>{PHP.L.Expire}:</td>
						<td>{NEWEDIT_FORM_EXPIRE}</td>
					</tr>
					<tr>
						<td>{PHP.L.Status}:</td>
						<td>{NEWEDIT_FORM_LOCALSTATUS}</td>
					</tr>
					<tr>
						<td>{PHP.L.Alias}:</td>
						<td>{NEWEDIT_FORM_ALIAS}</td>
					</tr>
					<tr>
						<td>{PHP.L.new_metakeywords}:</td>
						<td>{NEWEDIT_FORM_KEYWORDS}</td>
					</tr>
					<tr>
						<td>{PHP.L.new_metatitle}:</td>
						<td>{NEWEDIT_FORM_METATITLE}</td>
					</tr>
					<tr>
						<td>{PHP.L.new_metadesc}:</td>
						<td>{NEWEDIT_FORM_METADESC}</td>
					</tr>
<!-- BEGIN: TAGS -->
					<tr>
						<td>{NEWEDIT_TOP_TAGS}:</td>
						<td>{NEWEDIT_FORM_TAGS} ({NEWEDIT_TOP_TAGS_HINT})</td>
					</tr>
<!-- END: TAGS -->
<!-- BEGIN: ADMIN -->
					<tr>
						<td>{PHP.L.Owner}:</td>
						<td>{NEWEDIT_FORM_OWNERID}</td>
					</tr>
					<tr>
						<td>{PHP.L.Hits}:</td>
						<td>{NEWEDIT_FORM_NEWCOUNT}</td>
					</tr>
<!-- END: ADMIN -->
					<tr>
						<td>{PHP.L.Parser}:</td>
						<td>{NEWEDIT_FORM_PARSER}</td>
					</tr>
					<tr>
						<td colspan="2">
							{NEWEDIT_FORM_TEXT}
							<!-- IF {NEWEDIT_FORM_PFS} -->{NEWEDIT_FORM_PFS}<!-- ENDIF -->
							<!-- IF {NEWEDIT_FORM_SFS} --><span class="spaced">{PHP.cfg.separator}</span>{NEWEDIT_FORM_SFS}<!-- ENDIF -->
						</td>
					</tr>
					<tr>
						<td>{PHP.L.new_file}:<br />
							{PHP.themelang.newadd.Filehint}</td>
						<td>{NEWEDIT_FORM_FILE}</td>
					</tr>
					<tr>
						<td>{PHP.L.URL}:<br />{PHP.L.new_urlhint}</td>
						<td>{NEWEDIT_FORM_URL}<br />{NEWEDIT_FORM_URL_PFS} &nbsp; {NEWEDIT_FORM_URL_SFS}</td>
					</tr>
					<tr>
						<td>{PHP.L.new_filesize}:<br />{PHP.L.new_filesizehint}</td>
						<td>{NEWEDIT_FORM_SIZE}</td>
					</tr>
					<tr>
						<td>{PHP.L.new_filehitcount}:<br />{PHP.L.new_filehitcounthint}</td>
						<td>{NEWEDIT_FORM_FILECOUNT}</td>
					</tr>
					<tr>
						<td>{PHP.L.new_deletenew}:</td>
						<td>{NEWEDIT_FORM_DELETE}</td>
					</tr>
					<tr>
						<td>{NEW_COUNTRY_TITLE}:</td>
						<td>{NEWEDIT_FORM_COUNTRY}</td>
					</tr>
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

<!-- END: MAIN -->