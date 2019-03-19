<?php
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
$app = new \Slim\App;

function getResponse($request, $data){
	return [
		'url' => (string)$request->getUri(),
		'response' => [$data],
		'method' => $request->getMethod() 
	];
}
$app->get('/api/numtoword', function(Request $request, Response $response, array $args){
	$allParams = $request->getQueryParams();
	$number = $allParams['number'];
	$words = array(
		900=>'девятьсот',
		800=>'восемьсот',
		700=>'семьсот',
		600=>'шестьсот',
		500=>'пятьсот',
		400=>'четыреста',
		300=>'триста',
		200=>'двести',
		100=>'сто',
		90=>'девяносто',
		80=>'восемьдесят',
		70=>'семьдесят',
		60=>'шестьдесят',
		50=>'пятьдесят',
		40=>'сорок',
		30=>'тридцать',
		20=>'двадцать',
		19=>'девятнадцать',
		18=>'восемнадцать',
		17=>'семнадцать',
		16=>'шестнадцать',
		15=>'пятнадцать',
		14=>'четырнадцать',
		13=>'тринадцать',
		12=>'двенадцать',
		11=>'одиннадцать',
		10=>'десять',
		9=>'девять',
		8=>'восемь',
		7=>'семь',
		6=>'шесть',
		5=>'пять',
		4>'четыре',
		3=>'три',
		2=>'два',
		1=>'один',
	);

	$level=array(
		4=>array('миллиард', 'миллиарда', 'миллиардов'),
		3=>array('миллион', 'миллиона', 'миллионов'),
		2=>array('тысяча', 'тысячи', 'тысяч'),
	);

	$parts=explode(',',number_format($number,2));

	for($str='', $l=count($parts), $i=0; $i<count($parts); $i++, $l--) {
		if (intval($num=$parts[$i])) {
			foreach($words as $key=>$value) {
				if ($num>=$key) {
					if ($l==2 && $key==1) {
						$value='одна';
					}
					if ($l==2 && $key==2) {
						$value='две';
					}
					$str.=($str!=''?' ':'').$value;
					$num-=$key;
				}
			}
			if (isset($level[$l])) {
				$str.=' '.($level[$l][($parts[$i]=($parts[$i]=$parts[$i]%100)>19?($parts[$i]%10):$parts[$i])==1?0 : (($parts[$i]>1&&$parts[$i]<=4)?1:2)]);
			}
		}
	}
	$data = array('data' => (substr($str,0,1).substr($str,1,strlen($str)));
    return $response->withJson(getResponse($request, $data));
});
$app->get('/api/mathexp', function(Request $request, Response $response, array $args){
	$allParams = $request->getQueryParams();
	$a = $allParams['a'];
	$b = $allParams['b'];
	$c = $allParams['c'];

	$D = $b*$b - (4 * $a * $c);
	
	if ($D > 0) {
	    $x1 = ($b * (-1) + bcsqrt($D, 3)) / (2 * $a);
	    $x2 = ($b * (-1) - bcsqrt($D, 3)) / (2 * $a);
		$res = 'x1 = ' . $x1 . ' ,x2 = ' . $x2;
	} elseif ($D < 0) {
	    $res = 'Решений нет';
	} else {
	    $x = -$b / (2 * $a);
		$res = 'x=' . $x;
	}

	$data = array('data' => $res);
    return $response->withJson(getResponse($request, $data));
});
$app->get('/api/dayoftheweek', function(Request $request, Response $response, array $args){
	$allParams = $request->getQueryParams();
	$date = $allParams['date'];

	$data = array('data' => (strftime("%a, %d/%m/%Y", strtotime($date))));
    return $response->withJson(getResponse($request, $data));
});
$app->get('/api/fibon', function(Request $request, Response $response, array $args){
	$allParams = $request->getQueryParams();
	$number = $allParams['number'];
	$result = round(pow((sqrt(5)+1) / 2, $number) / sqrt(5));
	$data = [
		'data' => $result
	];
	return $response->withJson(getResponse($request, $data));
});
$app->get('/api/region', function(Request $request, Response $response, array $args){
	$allParams = $request->getQueryParams();
	$number = $allParams['region'];
	$array = [];
	$array[1] = 'Республика Адыгея';
	$array[2] = 'Республика Башкортостан';
	$array[3] = 'Республика Бурятия';
	$array[4] = 'Республика Алтай';
	$array[5] = 'Республика Дагестан';
	$array[6] = 'Республика Ингушетия';
	$array[7] = 'Кабардино-Балкарская Республика';
	$array[8] = 'Республика Калмыкия';
	$array[9] = 'Карачаево-Черкесская Республика';
	$array[10] = 'Республика Карелия';
	$array[11] = 'Республика Коми';
	$array[12] = 'Республика Марий Эл';
	$array[13] = 'Республика Мордовия';
	$array[14] = 'Республика Саха (Якутия)';
	$array[15] = 'Республика Северная Осетия - Алания';
	$array[16] = 'Республика Татарстан';
	$array[17] = 'Республика Тыва';
	$array[18] = 'Удмуртская Республика';
	$array[19] = 'Республика Хакасия';
	$array[20] = 'Чеченская республика';
	$array[21] = 'Чувашская Республика';
	$array[22] = 'Алтайский край';
	$array[23] = 'Краснодарский край';
	$array[24] = 'Красноярский край';
	$array[25] = 'Приморский край';
	$array[26] = 'Ставропольский край';
	$array[27] = 'Хабаровский край';
	$array[28] = 'Амурская область';
	$array[29] = 'Архангельская область';
	$array[30] = 'Астраханская область';
	$array[31] = 'Белгородская область';
	$array[32] = 'Брянская область';
	$array[33] = 'Владимирская область';
	$array[34] = 'Волгоградская область';
	$array[35] = 'Вологодская область';
	$array[36] = 'Воронежская область';
	$array[37] = 'Ивановская область';
	$array[38] = 'Иркутская область';
	$array[39] = 'Калининградская область';
	$array[40] = 'Калужская область';
	$array[41] = 'Камчатский край';
	$array[42] = 'Кемеровская область';
	$array[43] = 'Кировская область';
	$array[44] = 'Костромская область';
	$array[45] = 'Курганская область';
	$array[46] = 'Курская область';
	$array[47] = 'Ленинградская область';
	$array[48] = 'Липецкая область';
	$array[49] = 'Магаданская область';
	$array[50] = 'Московская область';
	$array[51] = 'Мурманская область';
	$array[52] = 'Нижегородская область';
	$array[53] = 'Новгородская область';
	$array[54] = 'Новосибирская область';
	$array[55] = 'Омская область';
	$array[56] = 'Оренбургская область';
	$array[57] = 'Орловская область';
	$array[58] = 'Пензенская область';
	$array[59] = 'Пермский край';
	$array[60] = 'Псковская область';
	$array[61] = 'Ростовская область';
	$array[62] = 'Рязанская область';
	$array[63] = 'Самарская область';
	$array[64] = 'Саратовская область';
	$array[65] = 'Сахалинская область';
	$array[66] = 'Свердловская область';
	$array[67] = 'Смоленская область';
	$array[68] = 'Тамбовская область';
	$array[69] = 'Тверская область';
	$array[70] = 'Томская область';
	$array[71] = 'Тульская область';
	$array[72] = 'Тюменская область';
	$array[73] = 'Ульяновская область';
	$array[74] = 'Челябинская область';
	$array[75] = 'Забайкальский край';
	$array[76] = 'Ярославская область';
	$array[77] = 'Москва';
	$array[78] = 'Санкт-Петербург';
	$array[79] = 'Еврейская автономная область';
	$array[80] = 'Забайкальский край';
	$array[81] = 'Пермский край';
	$array[82] = 'Республика Крым';
	$array[83] = 'Ненецкий автономный округ';
	$array[84] = 'Красноярский край';
	$array[85] = 'Иркутская область';
	$array[86] = 'Ханты-Мансийский АО';
	$array[87] = 'Чукотский автономный округ';
	$array[88] = 'Красноярский край';
	$array[89] = 'Ямало-Ненецкий автономный округ';
	$array[90] = 'Московская область';
	$array[91] = 'Калининградская область';
	$array[92] = 'Севастополь';
	$array[93] = 'Краснодарский край';
	$array[94] = 'Байконур';
	$array[95] = 'Чеченская республика';
	$array[96] = 'Свердловская область';
	$array[97] = 'Москва';
	$array[98] = 'Санкт-Петербург';
	$array[99] = 'Москва';
	$array[101] = 'Республика Адыгея';
	$array[102] = 'Республика Башкортостан';
	$array[103] = 'Республика Бурятия';
	$array[109] = 'Карачаево-Черкесская Республика';
	$array[111] = 'Республика Коми';
	$array[113] = 'Республика Мордовия';
	$array[116] = 'Республика Татарстан';
	$array[118] = 'Удмуртская Республика';
	$array[121] = 'Чувашская Республика';
	$array[123] = 'Краснодарский край';
	$array[124] = 'Красноярский край';
	$array[125] = 'Приморский край';
	$array[126] = 'Ставропольский край';
	$array[134] = 'Волгоградская область';
	$array[136] = 'Воронежская область';
	$array[138] = 'Иркутская область';
	$array[142] = 'Кемеровская область';
	$array[150] = 'Московская область ';
	$array[152] = 'Нижегородская область';
	$array[154] = 'Новосибирская область';
	$array[159] = 'Пермский край';
	$array[161] = 'Ростовская область';
	$array[163] = 'Самарская область';
	$array[164] = 'Саратовская область';
	$array[173] = 'Ульяновская область';
	$array[174] = 'Челябинская область';
	$array[176] = 'Ярославская область';
	$array[177] = 'Москва';
	$array[178] = 'Санкт-Петербург';
	$array[186] = 'Ханты-Мансийский АО';
	$array[190] = 'Московская область';
	$array[196] = 'Свердловская область';
	$array[197] = 'Москва';
	$array[199] = 'Москва';
	$array[716] = 'Республика Татарстан';
	$array[750] = 'Московская область';
	$array[763] = 'Самарская область';
	$array[777] = 'Москва';
	$array[799] = 'Москва';
	$result = $array[$number];
	$data = array('data' => $result);
    return $response->withJson(getResponse($request, $data));
});