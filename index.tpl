<!-- BEGIN: MAIN -->
<script type="text/javascript">
//    var element = document.getElementById("home");
//    element.className = element.className + "active";
</script>
<div class="row margintop10">
    {FILE "{PHP.cfg.themes_dir}/{PHP.theme}/inc/sidebar.tpl"}

    <div class="span8">
	
                {INDEX_BLOCK_TABS}


        <div class=" row IDX_blocks">
            <article class="span4 hot">
                <h2><a href="{PHP|cot_url('page', 'c=calendar')}">Горячие события</a></h2>
                {INDEX_BLOCK_CALENDAR}
            </article>
            <article class="span4">
                <h2><a href="#">Мнение</a></h2>
                <p><img class="pull-left marginright10" src="themes/{PHP.theme}/img/IDX_block.jpg" alt="" width="90" height="70" />
                    <h3>Лето-2013! Бронируй сейчас! - 30% на Болгарию, Грецию, Турцию, Италию</h3>
                </p>
                <p class="no-border"><img class="pull-left marginright10" src="themes/{PHP.theme}/img/IDX_block.jpg" alt="" width="90" height="70" />
                    Лето-2013! Бронируй сейчас! - 30% на Болгарию, Грецию, Турцию, Италию
                </p>
                <a href="#" class="more">Смотреть больше предложений</a>
            </article>
            <article class="span4">
                <h2><a href="{PHP|cot_url('page', 'c=gallery')}">Клуб фотопутешественников</a></h2>
                {INDEX_BLOCK_GALLERY}
            </article>
            <article class="span4 expertise">
                <h2><a href="{PHP|cot_url('page', 'c=expertise')}">Экспертиза</a></h2>
                {INDEX_BLOCK_EXPERTISE}
            </article>
        </div>

        <div class="row">
            <div class="span8">
                <img class="pull-left margintop10" src="themes/{PHP.theme}/img/IDX_banner1.jpg" alt="" width="710" height="88" />
            </div>
        </div>
        <div class="row IDX_blocks2 margintop10">
            <div class="span4">
                <h2><a href="{PHP|cot_url('new', 'c=novosti')}">Новости</a></h2>
                <article>
                    {INDEX_BLOCK_NOVOSTI}
                </article>
            </div>
            <div class="span4">
                <h2><a href="{PHP|cot_url('new', 'c=turbiznes')}">Турбизнес</a></h2>
                <article>
                    {INDEX_BLOCK_TURBIZNES}
                </article>

            </div>
        </div>
        <div class="row IDX_blocks2 margintop10">
            <div class="span4">
                <h2><a href="{PHP|cot_url('new', 'c=vitrina-turov')}">Витрина туров</a></h2>
                <article>
                    {INDEX_BLOCK_VITRINA_TUROV}
                </article>
            </div>
            <div class="span4">
                <h2><a href="{PHP|cot_url('new', 'c=obyavleniya')}">Объявления</a></h2>
                <article>
                    {INDEX_BLOCK_OBYAVLENIYA}
                </article>
            </div>
        </div>
        <div class="row">
            <div class="span8">
                <img class="pull-left margintop10" src="themes/{PHP.theme}/img/IDX_banner1.jpg" alt="" width="710" height="88" />
            </div>
        </div>
        <div class="row">
            <div class="span8 IDX_blocks2">

                <h2><a href="{PHP|cot_url('page', 'c=newspaper')}">Газета "Туризм и отдых"</a></h2>
                <article>
                    {INDEX_BLOCK_NEWSPAPER}
                </article>
            </div>
        </div>
        <div class="row">
            <div class="span8">
                <img class="pull-left margintop10" src="themes/{PHP.theme}/img/IDX_banner2.jpg" alt="" width="710" height="88" />
            </div>
        </div>
        <div class="row">
            <div class="span8 IDX_blocks2 IDX_tabs">
                <h2><a href="#">Новости туризма</a></h2>
                <ul>
                    <li><a href="#">ProHotel</a></li>
                    <li><a href="#">ТУРПРОМ.ru</a></li>
                    <li><a href="#">TOURDOM.RU</a></li>
                    <li><a href="#">RATAnews</a></li>
                    <li><a href="#">В Отпуск.Ру</a></li>
                    <li><a href="#">Турбизнес.ru</a></li>
                    <li class="no-border"><a href="#">РИА Новости</a></li>
                </ul>
                <article>
                    <p class="grey small margin0">14.03.2013</p>
                    <h3 class="under">Фотография как двигатель туризма</h3>
                    <p>Грандиозное мероприятие – Вторая Церемония награждения Marusya Cup, создание которого принадлежит двум туристическим компаниям A LA CARTE CLUB и МИДАС-ТУР, прошло 21 марта 2013 года в Москве, в особняке АиФ.  Marusya Cup- премия сертификационного клуба Marusya для профессионалов туринд...</p>
                </article>
                <article class="no-border">
                    <p class="grey small margin0">14.03.2013</p>
                    <h3 class="under">Фотография как двигатель туризма</h3>
                    <p>Грандиозное мероприятие – Вторая Церемония награждения Marusya Cup, создание которого принадлежит двум туристическим компаниям A LA CARTE CLUB и МИДАС-ТУР, прошло 21 марта 2013 года в Москве, в особняке АиФ.  Marusya Cup- премия сертификационного клуба Marusya для профессионалов туринд...</p>
                </article>
            </div>
        </div>
        <div class="row">
            <div class="span8">
                <img class="pull-left margintop10" src="themes/{PHP.theme}/img/IDX_banner2.jpg" alt="" width="710" height="88" />
            </div>
        </div>

        <div class="row IDX_blocks2 margintop10">
            <div class="span4">
                <h2><a href="{PHP|cot_url('new', 'c=novosti')}">Новости</a></h2>
                <article>
                    {INDEX_BLOCK_NOVOSTI}
                </article>
            </div>
            <div class="span4">
                <h2><a href="{PHP|cot_url('new', 'c=turbiznes')}">Турбизнес</a></h2>
                <article>
                    {INDEX_BLOCK_TURBIZNES}
                </article>

            </div>
        </div>
        <div class="row IDX_blocks2 margintop10">
            <div class="span4">
                <h2><a href="{PHP|cot_url('new', 'c=vitrina-turov')}">Витрина туров</a></h2>
                <article>
                    {INDEX_BLOCK_VITRINA_TUROV}
                </article>
            </div>
            <div class="span4">
                <h2><a href="{PHP|cot_url('new', 'c=obyavleniya')}">Объявления</a></h2>
                <article>
                    {INDEX_BLOCK_OBYAVLENIYA}
                </article>
            </div>
        </div>

        <div class="row">
            <div class="span8">
                <img class="pull-left margintop10" src="themes/{PHP.theme}/img/IDX_banner1.jpg" alt="" width="710" height="88" />
            </div>
        </div>
        <div class="row IDX_blog">

            <div class="span8">
                <h2><a href="{PHP|cot_url('page', 'c=blogs')}">Блоги</a></h2>
            </div>
</div>
            <div class="row">{INDEX_BLOCK_BLOGS}</div>

            <div class="span8"><a class="more" href="{PHP|cot_url('page', 'c=blogs')}">Все блоги</a></div>

        </div>
    </div>
</div>
</div>


<!-- END: MAIN -->
