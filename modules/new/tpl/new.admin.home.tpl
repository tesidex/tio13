<!-- BEGIN: MAIN -->
<h3>{PHP.L.News}</h3>
<ul class="follow">
	<li><a href="{ADMIN_HOME_URL}">{PHP.L.adm_valqueue}: {ADMIN_HOME_NEWSQUEUED}</a></li>
	<li><a href="{PHP|cot_url('new','m=add')}">{PHP.L.Add}</a></li>
	<li><a href="{PHP.db_news|cot_url('admin','m=extrafields&n=$this')}">{PHP.L.home_ql_b2_2}</a></li>
</ul>
<!-- END: MAIN -->