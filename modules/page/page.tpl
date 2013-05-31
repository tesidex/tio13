<!-- BEGIN: MAIN -->
    <div class="row margintop10">
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
        <div class="">
            <ul class="nav-tabs" id="TABS1">
                <li><a href="#popular" data-toggle="tab"><h2>Популярное</h2></a></li>
                <li><a href="#discuss" data-toggle="tab"><h2>Обсуждаемое</h2></a></li>
            </ul>
            <div class="tab-content popular">
                <ul class="tab-pane active" id="popular">
                    {PHP|blockrecent('popular',10)}
               </ul>
                <ul class="tab-pane" id="discuss">
                    {PHP|blockrecent('discuss',5)}
               </ul>
            </div>
        </div>
        <div class="margintop10">
            <img src="themes/{PHP.theme}/img/LEFT_banner3.jpg" alt="" width="240" height="200" />
        </div>
    </aside>
      <div class="span8">
        <article class="span8">
                <div class="row">
                    <!-- IF {PAGE_AVATAR} -->
                    <div class="span4">
                        <div>
                            <a href="{PAGE_URL}">
                                <!-- IF {PAGE_AVATAR|mb_strstr($this,'page_')} -->
                                <img src="./datas/photos/thumb_{PAGE_AVATAR}" alt="">
                                <!-- ELSE -->
                                <img src="http://tio.by/uploads/fields_files/{PAGE_AVATAR}" alt="">
                                <!-- ENDIF -->
                            </a>
                        </div>
                    </div>
                    <div class="span4">
                        <!-- ELSE -->
                        <div class="span8">
                            <!-- ENDIF -->
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
                                <p class="pull-left">{PAGE_DATE_STAMP|cot_date('d.m.Y', $this)}</p> &#160;- <span class="breadcrumbs blue">{PAGE_TITLE}</span>

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
                        </div>
                        <div class="row">
                            <div class="span8">
                                <!-- IF {PAGE_DESC} -->
                                <div class="strong marginbottom20">{PAGE_DESC}</div>
                                <!-- ENDIF -->
                                <p>{PAGE_TEXT}</p>

                                <p>{PAGE_COMMENTS_DISPLAY}</p>
                            </div>
                        </div>
                </article>
          
        
        <!-- BEGIN: PAGE_MULTI -->
          <h3>{PHP.L.Summary}:</h3>
          {PAGE_MULTI_TABTITLES}
          <p class="paging">{PAGE_MULTI_TABNAV}</p>
        <!-- END: PAGE_MULTI -->
      </div>
    </div>
<!-- END: MAIN -->