<!-- BEGIN: HEADER -->
<!DOCTYPE html>
<html>
    <head>
        <title>{HEADER_TITLE}</title>
        <!-- IF {HEADER_META_DESCRIPTION} --><meta name="description" content="{HEADER_META_DESCRIPTION}" /><!-- ENDIF -->
        <!-- IF {HEADER_META_KEYWORDS} --><meta name="keywords" content="{HEADER_META_KEYWORDS}" /><!-- ENDIF -->
        <meta http-equiv="content-type" content="{HEADER_META_CONTENTTYPE}; charset=UTF-8" />
        <meta name="generator" content="{PHP.cfg.maintitle} {PHP.cfg.mainurl}" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="canonical" href="{HEADER_CANONICAL_URL}" />
        {HEADER_BASEHREF}
        {HEADER_HEAD}
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
        <link rel="shortcut icon" href="favicon.ico" />
        <link rel="apple-touch-icon" href="apple-touch-icon.png" />
        <link href='http://fonts.googleapis.com/css?family=Istok+Web:400,400italic,700,700italic&subset=latin,cyrillic-ext,latin-ext,cyrillic' rel='stylesheet' type='text/css'>
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <script type="text/javascript">
            $(function(){
            $("input:file").uniform();
        });
        </script>
    </head>
    <body>
        <div class="container">
            <div class="header">
                <div class="row">
                    <div class="span12">
                        <img src="themes/{PHP.theme}/img/HD_banner.jpg" alt="" width="970" height="126" />
                    </div>
                </div>
                <div class="row">
                    <div class="span7 offset3">
                        <nav>
                            <ul class="nav1">
                                        <li><a href="{PHP.cfg.mainurl}" title="{PHP.cfg.maintitle} {PHP.cfg.separator} {PHP.cfg.subtitle}">Реклама</a></li>
                                        <li class="<!-- IF {PHP.m} == 'contact' OR {PHP.env.ext} == 'contact' -->active<!-- ENDIF -->"><a href="{PHP|cot_url('contact')}">{PHP.L.blogster_contact}</a></li>
                                        <li class="<!-- IF {PHP.m} == 'page' OR {PHP.env.ext} == 'page' -->active<!-- ENDIF -->"><a href="{PHP|cot_url('page', 'c=aboutus')}">О редакции</a></li>
                                        <li class="<!-- IF {PHP.m} == 'forums' OR {PHP.env.ext} == 'forums' -->active<!-- ENDIF -->"><a href="#">Партнеры</a></li>
                                        <li class="<!-- IF {PHP.m} == 'users' OR {PHP.env.ext} == 'users' -->active<!-- ENDIF -->"><a href="{PHP|cot_url('login')}">Вход</a></li>
                                        <li class="<!-- IF {PHP.m} == 'users' OR {PHP.env.ext} == 'users' -->active<!-- ENDIF -->"><a href="{PHP|cot_url('users','m=register')}">Регистрация</a></li>
                            </ul>
                        </nav>
                    </div>
                                    <div class="span2">
                                        <img class="soc_buttons" src="themes/{PHP.theme}/img/soc_buttons.png" alt="" width="87" height="20" />
                                    </div>
                    </div>
                        <div class="row">
                            <div class="span4_left">
                                <h1>
                                    <a href="{PHP.cfg.mainurl}" title="{PHP.cfg.maintitle} {PHP.cfg.separator} {PHP.cfg.subtitle}">
                                        <span class="invisible">{PHP.cfg.maintitle}</span>
                                    </a>
                                </h1>
                            </div>
                                    <div class="span8">
                                        <img src="themes/{PHP.theme}/img/HD_sub_banner.jpg" alt="" width="710" height="88" />
                                    </div>
                        </div>
                                    </div>
                                    </div>
                                    
                        <nav class="nav2">
                            <div class="navbar container">
                                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </a>
                                <div class="nav-collapse collapse">
                                    <ul class="nav">
                                        <li class="<!-- IF {PHP.m} == 'index' OR {PHP.env.ext} == 'index' -->active<!-- ENDIF -->"><a href="{PHP.cfg.mainurl}" title="{PHP.cfg.maintitle} {PHP.cfg.separator} {PHP.cfg.subtitle}">{PHP.L.Home}</a></li>
                                        <li class="<!-- IF {PHP.m} == 'contact' OR {PHP.env.ext} == 'contact' -->active<!-- ENDIF -->"><a href="{PHP|cot_url('#')}">Газета</a></li>
                                        <li class="<!-- IF {PHP.m} == 'page' OR {PHP.env.ext} == 'page' -->active<!-- ENDIF -->"><a href="{PHP|cot_url('page', 'c=#')}">Для профи</a></li>
                                        <li class="<!-- IF {PHP.m} == 'forums' OR {PHP.env.ext} == 'forums' -->active<!-- ENDIF -->"><a href="{PHP|cot_url('#')}">Наши проекты</a></li>
                                        <li class="<!-- IF {PHP.m} == 'users' OR {PHP.env.ext} == 'users' -->active<!-- ENDIF -->"><a href="{PHP|cot_url('#')}">Поиск туров</a></li>
                                        <li class="<!-- IF {PHP.m} == 'page' OR {PHP.env.ext} == 'page' -->active<!-- ENDIF -->"><a href="{PHP|cot_url('page', 'c=news')}">{PHP.L.News}</a></li>
                                        <li class="<!-- IF {PHP.m} == 'forums' OR {PHP.env.ext} == 'forums' -->active<!-- ENDIF -->"><a href="{PHP|cot_url('#')}">Фотогалерея</a></li>
                                        <li class="<!-- IF {PHP.m} == 'users' OR {PHP.env.ext} == 'users' -->active<!-- ENDIF -->"><a href="{PHP|cot_url('#')}">Форум</a></li>
                                        <li class="<!-- IF {PHP.m} == 'users' OR {PHP.env.ext} == 'users' -->active<!-- ENDIF -->"><a href="{PHP|cot_url('#')}">Блоги</a></li>
                                        <li class="<!-- IF {PHP.m} == 'users' OR {PHP.env.ext} == 'users' -->active<!-- ENDIF -->"><a href="{PHP|cot_url('#')}">Справочник</a></li>
                                        <li class="<!-- IF {PHP.m} == 'users' OR {PHP.env.ext} == 'users' -->active<!-- ENDIF -->"><a href="{PHP|cot_url('#')}">Выставки</a></li>
                                    </ul>
                                    
                                        </div><!--/.nav-collapse -->
                                    </div>
                                </nav>
                            
                    </div>
                </div>

                <div class="container">
                    
                        <!-- END: HEADER -->