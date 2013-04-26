<!-- BEGIN: MAIN -->
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
    <article class="span8">
        <div class="span4">
            <!-- IF {PAGE_AVATAR} -->
            <div>
                <a href="{PAGE_URL}">
                    <img src="./datas/photos/thumb_{PAGE_AVATAR}" alt="">
                </a>
            </div>
            <!-- ENDIF -->
        </div>
        <div class="span4">
            <p>{PAGE_DATE_STAMP|cot_date('d.m.Y', $this)} - <span class="breadcrumbs blue">{PAGE_TITLE}</span></p>

            <h2>{PAGE_SHORTTITLE}</h2>
            <div class="PAGE_soc_buttons">
                <p class="em">Поделиться:</p>
                <span class='st_vkontakte' displayText=''></span>
                <span class='st_facebook' displayText=''></span>
                <span class='st_livejournal' displayText=''></span>
                <span class='st_plusone' displayText=''></span>
                <span class='st_twitter' displayText=''></span>
                <span class='st_odnoklassniki' displayText=''></span>
                <span class='st_mail_ru' displayText=''></span>
                <span class='st_friendfeed' displayText=''></span>    
            </div> 
        </div>
        <div class="span8">
            <!-- IF {PAGE_DESC} -->
            <div class="strong marginbottom20">{PAGE_DESC}</div>
            <!-- ENDIF -->
            <p>{PAGE_TEXT}</p>

            <p>{PAGE_COMMENTS_DISPLAY}</p>
        </div>
    </article>
    <div class="span8">
        <!-- BEGIN: PAGE_ADMIN -->
        <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#admin-page-options">
            {PHP.L.Administration}&nbsp;&nbsp;&nbsp;<i class="icon-circle-arrow-down icon-white"></i>
            </button>
            <div id="admin-page-options" class="collapse" style="margin-bottom: 10px;">
                <ul class="unstyled">
                    <!-- IF {PHP.usr.isadmin} -->
                    <li><a href="{PHP|cot_url('admin')}">{PHP.L.Adminpanel}</a></li>
                    <!-- ENDIF -->
                    <li><a href="{PAGE_CAT|cot_url('page','m=add&c=$this')}">{PHP.L.page_addtitle}</a></li>
                    <li>{PAGE_ADMIN_UNVALIDATE}</li>
                    <li>{PAGE_ADMIN_EDIT}</li>
                    <li>{PAGE_ADMIN_DELETE}</li>
                </ul>
            </div>
            <!-- END: PAGE_ADMIN -->
            <!-- BEGIN: PAGE_MULTI -->
            <h3>{PHP.L.Summary}:</h3>
            {PAGE_MULTI_TABTITLES}
            <p class="paging">{PAGE_MULTI_TABNAV}</p>
            <!-- END: PAGE_MULTI -->
        </div>
        <div class="span8">
            <img class="pull-left margintop10" src="themes/{PHP.theme}/img/IDX_banner1.jpg" alt="" width="710" height="88" />
        </div>
        <div class="IDX_blocks">
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


    </div>
    <!-- END: MAIN -->