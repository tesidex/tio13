<?php

defined('COT_CODE') or die('Wrong URL.');


     cot_extrafield_add('bel_pages', 'location_title', 'input', $R['input_text'],
	     '', '', '', '',
	     'Название города');
     
     cot_extrafield_add('bel_pages', 'object_type', 'select', $R['input_text'],
	     '', '', '', '',
	     'Тип объекта архитектуры');