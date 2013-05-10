<div id="isadmin" class="block">
	<h3><a href="{HEADER_USER_LOGINOUT_URL}">{PHP.L.Admin}</a></h3>
	<ul class="bullets">
		<li><a href="{PHP|cot_url('admin')}">{PHP.L.Adminpanel}</a></li>
		<li><a href="{PHP|cot_url('users')}">{PHP.L.Users}</a></li>
		<li><a href="{PHP|cot_url('users','m=profile')}">{PHP.L.Profile}</a></li>
		<li><a href="{PHP|cot_url('pfs')}">{PHP.L.PFS}</a></li>
<!-- IF {HEADER_NOTICES} --><li>{HEADER_NOTICES}</li><!-- ENDIF -->
	</ul>
</div>