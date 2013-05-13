<ul class="nav">
    <li class="<!-- IF {PHP.m} == 'index' OR {PHP.env.ext} == 'index' -->active<!-- ENDIF -->"><a href="{PHP.cfg.mainurl}" title="{PHP.cfg.maintitle} {PHP.cfg.separator} {PHP.cfg.subtitle}">Главная</a></li>
    <li class="<!-- IF {PHP.m} == 'page' OR {PHP.c} == 'newspaper' -->active<!-- ENDIF -->"><a href="{PHP|cot_url('page', 'c=newspaper')}">Газета</a></li>
    <li class="<!-- IF {PHP.m} == 'new' OR {PHP.c} == 'pro' -->active<!-- ENDIF -->"><a href="{PHP|cot_url('new', 'c=pro')}">Для профи</a></li>
    <li class="<!-- IF {PHP.m} == 'page' OR {PHP.c} == 'projects' -->active<!-- ENDIF -->"><a href="{PHP|cot_url('page', 'c=projects')}">Наши проекты</a></li>
    <li class="<!-- IF {PHP.m} == 'new' OR {PHP.c} == 'vitrina-turov' -->active<!-- ENDIF -->"><a href="{PHP|cot_url('new', 'c=vitrina-turov')}">Поиск туров</a></li>
    <li class="<!-- IF {PHP.m} == 'new' OR {PHP.c} == 'novosti' -->active<!-- ENDIF -->"><a href="{PHP|cot_url('new', 'c=novosti')}">Новости</a></li>
    <li class="<!-- IF {PHP.m} == 'page' OR {PHP.c} == 'fotoblog' -->active<!-- ENDIF -->"><a href="{PHP|cot_url('page', 'c=fotoblog')}">Фотогалерея</a></li>
    <li class="<!-- IF {PHP.m} == 'forums' OR {PHP.env.ext} == 'forums' -->active<!-- ENDIF -->"><a href="{PHP|cot_url('forums')}">Форум</a></li>
    <li class="<!-- IF {PHP.m} == 'page' OR {PHP.c} == 'blogs' -->active<!-- ENDIF -->"><a href="{PHP|cot_url('page', 'c=blogs')}">Блоги</a></li>
    <li class="<!-- IF {PHP.m} == 'page' OR {PHP.c} == '#' -->active<!-- ENDIF -->"><a href="{PHP|cot_url('page', 'c=#')}">Справочник</a></li>
    <li class="<!-- IF {PHP.m} == 'page' OR {PHP.c} == '#' -->active<!-- ENDIF -->"><a href="{PHP|cot_url('page', 'c=#')}">Выставки</a></li>
</ul>