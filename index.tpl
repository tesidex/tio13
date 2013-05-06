<!-- BEGIN: MAIN -->
<script type="text/javascript">
    var element = document.getElementById("home");
    element.className = element.className + "active";
</script>
<div class="row margintop10">
    <div class="span4_left">
        <div>
            <h3>Поиск по сайту:</h3>
            <form id="search" action="{PHP|cot_url('plug','e=search')}" method="post" class="form-search" >

                <input type="text" name="sq" onblur="if(this.value=='') this.value='{PHP.L.Search}...';" onfocus="if(this.value=='{PHP.L.Search}...') this.value='';">

                <button type="submit" class="btn pull-right" title="{PHP.L.Search}">Искать</button>
            </form>
        </div>
        <nav id="sidebar">
            <ul>
                <li><a href="#">Туризм и отдых в Беларуси</a></li>
                <li><a href="#">Каталог агроусадеб Беларуси</a></li>
                <li><a href="#">Дикая природа Беларуси</a></li>
                <li><a href="#">Портал PHOTO.BY</a></li>
                <li><a href="#">Авиабилеты</a></li>
            </ul>
        </nav>
        <div class="margintop10">
            <img src="themes/{PHP.theme}/img/LEFT_banner1.jpg" alt="" width="240" height="400" />
        </div>
        <div class="margintop10">
            <img src="themes/{PHP.theme}/img/LEFT_banner2.jpg" alt="" width="240" height="200" />
        </div>
        <aside class="margintop10 popular">
            <h2 class="pull-left"><a href="#"><span>Популярное</span></a></h2>
            <h2 class="pull-right inactive"><a href="#"><span>Обсуждаемое</span></a></h2>
            <ul class="hidden">
                <li>
                    <p class="grey">13.06.2013</p>
                    <p>Национальный аэропорт «Минск» временно закрыт по метеоусловиям! Задержан прилет восьми рейсов!</p>
                </li>
                <li>
                    <p class="grey">13.06.2013</p>
                    <p>Национальный аэропорт «Минск» временно закрыт по метеоусловиям! Задержан прилет восьми рейсов!</p>
                </li>
                <li>
                    <p class="grey">13.06.2013</p>
                    <p>Национальный аэропорт «Минск» временно закрыт по метеоусловиям! Задержан прилет восьми рейсов!</p>
                </li>
                <li>
                    <p class="grey">13.06.2013</p>
                    <p>Национальный аэропорт «Минск» временно закрыт по метеоусловиям! Задержан прилет восьми рейсов!</p>
                </li>
            </ul>
            <ul>
                <li>
                    <p class="grey">13.06.2013</p>
                    <p>Национальный аэропорт «Минск» временно закрыт по метеоусловиям! Задержан прилет восьми рейсов!</p>
                </li>
                <li>
                    <p class="grey">13.06.2013</p>
                    <p>Национальный аэропорт «Минск» временно закрыт по метеоусловиям! Задержан прилет восьми рейсов!</p>
                </li>
                <li>
                    <p class="grey">13.06.2013</p>
                    <p>Национальный аэропорт «Минск» временно закрыт по метеоусловиям! Задержан прилет восьми рейсов!</p>
                </li>
                <li>
                    <p class="grey">13.06.2013</p>
                    <p>Национальный аэропорт «Минск» временно закрыт по метеоусловиям! Задержан прилет восьми рейсов!</p>
                </li>
            </ul>
        </aside>
        <div class="margintop10">
            <img src="themes/{PHP.theme}/img/LEFT_banner3.jpg" alt="" width="240" height="200" />
        </div>
    </div>

    <div class="span8">
        <div class="row">
            <div class="span8 IDX_news">
                {INDEX_BLOCK}
            </div>
        </div>

        <div class="row">
            <div class="span8">
                <article class="IDX_article">
            <img class="pull-left marginright10" src="themes/{PHP.theme}/img/IDX_article.jpg" alt="" width="250" height="188" />
            <p class="date">14.03.2013</p>
            <p>Говоря о визах, члены правления (на заседании присутствовали директора компаний «Топ-Тур», «Экотур-6», «Сакуб», «Бел-Ориентир», «АлатанТур», «СМОК Травэл») отметили проблему электронного бронирования на сайтах некоторых консульств. С вопросом о сложностях с регистрацией анкет на сайтах было решено обратиться в МИД. Также руководители турфирм предложили рассмотреть возможность открывать «европейские» визы через посольства Латвии и Эстонии. Этот вопрос стоит детально проработать с представителями посольств...</p>
            <a href="#" class="btn">Читать далее</a>
                </article>
            </div>
        </div>

        <div class=" row IDX_blocks">
            <article class="span4 hot">
                <h2><a href="#">Горячие предложения</a></h2>
                <p><img class="pull-left marginright10" src="themes/{PHP.theme}/img/IDX_block.jpg" alt="" width="90" height="70" />
                    Лето-2013! Бронируй сейчас! - 30% на Болгарию, Грецию, Турцию, Италию 
                </p>
                <p class="no-border"><img class="pull-left marginright10" src="themes/{PHP.theme}/img/IDX_block.jpg" alt="" width="90" height="70" />
                    Лето-2013! Бронируй сейчас! - 30% на Болгарию, Грецию, Турцию, Италию 
                </p>
                <a href="#" class="hot_more">Смотреть больше предложений</a>
            </article>
            <article class="span4">
                <h2><a href="#">Мнение</a></h2>
                <p><img class="pull-left marginright10" src="themes/{PHP.theme}/img/IDX_block.jpg" alt="" width="90" height="70" />
                    Лето-2013! Бронируй сейчас! - 30% на Болгарию, Грецию, Турцию, Италию
                </p>
                <p class="no-border"><img class="pull-left marginright10" src="themes/{PHP.theme}/img/IDX_block.jpg" alt="" width="90" height="70" />
                    Лето-2013! Бронируй сейчас! - 30% на Болгарию, Грецию, Турцию, Италию
                </p>
                <a href="#" class="more">Смотреть больше предложений</a>
            </article>
            <article class="span4">
                <h2><a href="#">Клуб путешественников</a></h2>
                <div class="pull-left width50">
                    <img src="themes/{PHP.theme}/img/IDX_block2.jpg" alt="" width="162" height="132" />
                    <a href="#">Сувенирщики</a>
                </div>
                <div class="pull-right width50">
                    <img class="pull-right textright" src="themes/{PHP.theme}/img/IDX_block3.jpg" alt="" width="162" height="132" />
                    <a href="#">Санкт-Петербург</a>
                </div>
            </article>
            <article class="span4">
                <h2><a href="#">Экспертиза</a></h2>
                <img class="pull-left marginright10" src="themes/{PHP.theme}/img/IDX_block.jpg" alt="" width="90" height="70" />
                <h3><a href="#">Тема: <span class="theme">Как устроиться аниматором?</span></a></h3>
                <div>“На форум нашего сайта пришел вопрос от читателя, желающего поработать аниматором. О том, насколько легко найти подобную работу, кто из туроператоров обучает и трудоустраивает «массовиков-затейников», а также сколько можно заработать на пляжах Турции и Египта – в нашем обзоре.”
                </div>
            </article>
        </div>

        <div class="row">
            <div class="span8">
                <img class="pull-left margintop10" src="themes/{PHP.theme}/img/IDX_banner1.jpg" alt="" width="710" height="88" />
            </div>
        </div>
        <div class="row IDX_blocks2 margintop10">
            <div class="span4">
                <h2><a href="#">В Беларуси</a></h2>
                <article>
                    {INDEX_BLOCK_OBYAVLENIYA}
                </article>
            </div>
            <div class="span4">
                <h2><a href="#">Турбизнес</a></h2>
                <article>
                    {INDEX_BLOCK_TURBIZNES}
                </article>

            </div>
        </div>
        <div class="row IDX_blocks2 margintop10">
            <div class="span4">
                <h2><a href="#">В мире</a></h2>
                <article>
                    {INDEX_BLOCK_TURBIZNES}
                </article>
            </div>
            <div class="span4">
                <h2><a href="#">Объявления</a></h2>
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

                <h2><a href="#">Газета "Туризм и отдых"</a></h2>
                <article>
                    <img class="pull-left marginright10" src="themes/{PHP.theme}/img/IDX_block4.jpg" alt="" width="162" height="132" />
                    <p class="grey small margin0">14.03.2013</p>
                    <h3 class="under">Фотография как двигатель туризма</h3>
                    <p>Быть путешественником – значит шагать по свету с широко открытыми глазами и… фотоаппаратом наперевес. Серьезно, все без исключения туристы сегодня в той или иной степени еще непременно и фотографы: а как иначе делиться увиденным и пережитым в путешествии, если не при помощи фотографий?! Головокружительными закатами, буддистскими храмами в розоватой рассветной дымке, одногорбым верблюдом – ленивым «кораблем пустыни», пляшущими на океанской глади солнечными бликами… А может быть, и драматическими моментами экстремальных путешествий – опасных восхождений по отвесным скалам, сплавов по бурным рекам, сложных подъемов по горным перевалам.</p>
                </article>
                <article>
                    <img class="pull-left marginright10" src="themes/{PHP.theme}/img/IDX_block4.jpg" alt="" width="162" height="132" />
                    <p class="grey small margin0">14.03.2013</p>
                    <h3 class="under">Фотография как двигатель туризма</h3>
                    <p>Быть путешественником – значит шагать по свету с широко открытыми глазами и… фотоаппаратом наперевес. Серьезно, все без исключения туристы сегодня в той или иной степени еще непременно и фотографы: а как иначе делиться увиденным и пережитым в путешествии, если не при помощи фотографий?! Головокружительными закатами, буддистскими храмами в розоватой рассветной дымке, одногорбым верблюдом – ленивым «кораблем пустыни», пляшущими на океанской глади солнечными бликами… А может быть, и драматическими моментами экстремальных путешествий – опасных восхождений по отвесным скалам, сплавов по бурным рекам, сложных подъемов по горным перевалам.</p>
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
                <h2><a href="#">В Беларуси</a></h2>
                <article>
                    {INDEX_BLOCK_OBYAVLENIYA}
                </article>
            </div>
            <div class="span4">
                <h2><a href="#">Турбизнес</a></h2>
                <article>
                    {INDEX_BLOCK_TURBIZNES}
                </article>

            </div>
        </div>
        <div class="row IDX_blocks2 margintop10">
            <div class="span4">
                <h2><a href="#">В мире</a></h2>
                <article>
                    {INDEX_BLOCK_TURBIZNES}
                </article>
            </div>
            <div class="span4">
                <h2><a href="#">Объявления</a></h2>
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
                    <h2><a href="/blogs">Блоги</a></h2>
                </div>

               
                    
                        {INDEX_BLOCK_BLOGS}
                    
               
               
                <a class="more" href="#">Все блоги</a>
           
        </div>
    </div>
</div>
</div>


<!-- END: MAIN -->