<!-- BEGIN: MAIN -->
{FILE "{PHP.cfg.themes_dir}/{PHP.cfg.defaulttheme}/warnings.tpl"}

        <form action="{PHP|cot_url('admin','m=other&p=converter')}" method="POST">
                                {CONVERT_VARIANTS_LIST}<br>
                                <input type="submit" name="button" value="begin"><br><br>
	</form>
	<form action="{PHP|cot_url('admin','m=other&p=converter')}" method="POST">
				<span>Debugging:</span><br>
	                         {DELETE_VARIANTS_LIST}<br>
				<input type="submit" name="button" value="delete">
        </form>

<!-- END: MAIN -->