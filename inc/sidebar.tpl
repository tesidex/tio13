<aside class="span4_left">
        <div>
            <h3>Поиск по сайту:</h3>
            <form id="search" action="{PHP|cot_url('plug','e=search')}" method="post" class="form-search" >

                <input type="text" name="sq" onblur="if(this.value=='') this.value='{PHP.L.Search}...';" onfocus="if(this.value=='{PHP.L.Search}...') this.value='';">

                <button type="submit" class="btn pull-right" title="{PHP.L.Search}">Искать</button>
            </form>
        </div>
        <nav id="sidebar">
            <ul>
                <li><a href="http://belarus.tio.by">Туризм и отдых в Беларуси</a></li>
                <li><a href="http://belarus.tio.by">Каталог агроусадеб Беларуси</a></li>
                <li><a href="http://wildlife.by">Дикая природа Беларуси</a></li>
                <li><a href="http://photo.by">Портал PHOTO.BY</a></li>
            </ul>
        </nav>
        <div class="margintop10">
            <img src="themes/{PHP.theme}/img/LEFT_banner1.jpg" alt="" width="240" height="400" />
        </div>
        <div class="margintop10">
            <img src="themes/{PHP.theme}/img/LEFT_banner2.jpg" alt="" width="240" height="200" />
        </div>
        
            <ul class="nav-tabs" id="TABS1">
                <li><a href="#popular" data-toggle="tab"><h2>Популярное</h2></a></li>
                <li><a href="#discuss" data-toggle="tab"><h2>Обсуждаемое</h2></a></li>
            </ul>
            <div class="tab-content aside_popular">
                <ul class="tab-pane" id="popular">
                    {PHP|blockrecent('popular',10)}
               </ul>
                <ul class="tab-pane" id="discuss">
                    {PHP|blockrecent('discuss',5)}
               </ul>
            </div>

        <div class="margintop10">
            <img src="themes/{PHP.theme}/img/LEFT_banner3.jpg" alt="" width="240" height="200" />
        </div>

        <div class="margintop10 hot">
	    <h2><a href="{PHP|cot_url('new', 'c=company-news')}">Новости компаний</a></h2>
            {INDEX_BLOCK_COMPANY_NEWS}
        </div>
    </aside>