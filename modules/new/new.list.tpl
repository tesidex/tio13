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
    <div class="span8">
        <div class="row">
            <div class="span8">
                <!-- IF {PHP.usr.auth_write} -->
                <div class="block">
                    <h3 class="admin">{PHP.L.Admin}</h3>
                    <ul class="bullets">
                        <!-- IF {PHP.usr.isadmin} -->
                        <li><a href="{PHP|cot_url('admin')}">{PHP.L.Adminpanel}</a></li>
                        <!-- ENDIF -->
                        <li>{LIST_SUBMITNEWNEW}</li>
                    </ul>
                </div>
                <!-- ENDIF -->
            </div>
        </div>
        <div class="row">

            <div class="span8">
                <h2>{LIST_CATTITLE}</h2>
                <!-- BEGIN: LIST_ROWCAT -->
                <h3><a href="{LIST_ROWCAT_URL}" title="{LIST_ROWCAT_TITLE}">{LIST_ROWCAT_TITLE}</a> ({LIST_ROWCAT_COUNT})</h3>
                <!-- IF {LIST_ROWCAT_DESC} -->
                <p class="small">{LIST_ROWCAT_DESC}</p>
                <!-- ENDIF -->
                <!-- END: LIST_ROWCAT -->

                <!-- BEGIN: LIST_ROW -->
                <h3><a href="{LIST_ROW_URL}">{LIST_ROW_SHORTTITLE}</a></h3>
                <!-- IF {LIST_ROW_DESC} --><p class="small marginbottom10">{LIST_ROW_DESC}</p><!-- ENDIF -->
                <!-- IF {PHP.usr.isadmin} --><p class="small marginbottom10">{LIST_ROW_ADMIN} ({LIST_ROW_COUNT})</p><!-- ENDIF -->
                <div>
                    {LIST_ROW_TEXT_CUT}
                    <!-- IF {LIST_ROW_TEXT_IS_CUT} -->{LIST_ROW_MORE}<!-- ENDIF -->
                </div>
                <!-- END: LIST_ROW -->
            </div>
            <!-- IF {LIST_TOP_PAGINATION} -->
            <p class="paging clear"><span>{PHP.L.New} {LIST_TOP_CURRENTNEW} {PHP.L.Of} {LIST_TOP_TOTALNEWS}</span>{LIST_TOP_NEWPREV}{LIST_TOP_PAGINATION}{LIST_TOP_NEWNEXT}</p>
            <!-- ENDIF -->
        </div>
        <div class="row">
            <div class="span8">
                <h2 class="tags">{PHP.L.Tags}</h2>
                {LIST_TAG_CLOUD}
            </div>
        </div>
    </div>

</div>
</div>
<!-- END: MAIN -->