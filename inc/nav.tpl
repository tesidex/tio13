<ul class="nav">
    <li <!-- IF {PHP.m} == 'index' OR {PHP.env.ext} == 'index' -->
	class="active"<!-- ENDIF -->><a href="{PHP.cfg.mainurl}" title="{PHP.cfg.maintitle} {PHP.cfg.separator} {PHP.cfg.subtitle}">Главная</a></li>
    <li <!-- IF {PHP.c} == 'newspaper' -->
	class="active"<!-- ENDIF -->><a href="{PHP|cot_url('page', 'c=newspaper')}">Газета</a></li>
    <li <!-- IF {PHP.c} == 'turbiznes' OR {PHP.c} == 'pro' OR {PHP.c} == 'obyavleniya' -->
	class="active"<!-- ENDIF -->><a href="{PHP|cot_url('new', 'c=pro')}">Для профи</a></li>
    <li <!-- IF {PHP.c} == 'projects' -->
	class="active"<!-- ENDIF -->><a href="{PHP|cot_url('page', 'c=projects')}">Наши проекты</a></li>
    <li <!-- IF {PHP.m} == 'prosto-tak' -->
	class="active"<!-- ENDIF -->><a href="http://travel.tio.by">Поиск туров</a></li>
    <li <!-- IF {PHP.c} == 'novosti' -->
	class="active"<!-- ENDIF -->><a href="{PHP|cot_url('new', 'c=novosti')}">Новости</a></li>
    <li <!-- IF {PHP.m} == 'page' OR {PHP.c} == 'gallery' -->
	class="active"<!-- ENDIF -->><a href="{PHP|cot_url('page', 'c=gallery')}">Фотогалерея</a></li>
    <li <!-- IF {PHP.m} == 'forums' OR {PHP.env.ext} == 'forums' -->
	class="active"<!-- ENDIF -->><a href="{PHP|cot_url('forums')}">Форум</a></li>
    <li <!-- IF {PHP.c} == 'blogs' -->
	class="active"<!-- ENDIF -->><a href="{PHP|cot_url('page', 'c=blogs')}">Блоги</a></li>
    <li <!-- IF {PHP.c} == 'otzyvy' -->
	class="active"<!-- ENDIF -->><a href="{PHP|cot_url('page', 'c=otzyvy')}">Отзывы</a></li>
    <li <!-- IF {PHP.c} == 'opinions' -->
	class="active"<!-- ENDIF -->><a href="{PHP|cot_url('page', 'c=opinions')}">Мнения</a></li>
</ul>