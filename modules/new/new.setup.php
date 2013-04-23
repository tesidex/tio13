<?php
/* ====================
[BEGIN_COT_EXT]
Name=News
Description=News and Categories
Version=0.9.12
Date=2012-12-02
Author=Neocrome & Cotonti Team
Copyright=(c) Cotonti Team 2008-2013
Notes=BSD License
Auth_guests=R
Lock_guests=A
Auth_members=RW1
Lock_members=
Admin_icon=img/adminmenu_new.png
[END_COT_EXT]

[BEGIN_COT_EXT_CONFIG]
markup=01:radio::1:
parser=02:callback:cot_get_parsers():none:
count_admin=03:radio::0:
autovalidate=04:radio::1:
maxlistspernew=06:select:5,10,15,20,25,30,40,50,60,70,100,200,500:30:
title_new=07:string::{TITLE} - {CATEGORY}:
[END_COT_EXT_CONFIG]

[BEGIN_COT_EXT_CONFIG_STRUCTURE]
order=01:callback:cot_new_config_order():title:
way=02:select:asc,desc:asc:
maxrowspernew=03:string::30:
truncatetext=04:string::0:
allowemptytext=05:radio::0:
keywords=06:string:::
[END_COT_EXT_CONFIG_STRUCTURE]
==================== */
