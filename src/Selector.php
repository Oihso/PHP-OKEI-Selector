<?php
/**
 * Created by Ivan Oihso Amelin
 * Date: 06.03.2020
 * Time: 23:30
 * All rights reserved
 */

namespace Oihso\OKEI;

class Selector
{
    private static $codes = [
        '354' => 'с',
        '355' => 'мин',
        '356' => 'ч',
        '359' => 'дн',
        '360' => 'нед',
        '361' => 'дек',
        '362' => 'мес',
        '364' => 'кварт',
        '365' => 'полгода',
        '366' => 'лет',
        '368' => 'деслет',
        '003' => 'мм',
        '004' => 'см',
        '005' => 'дм',
        '006' => 'м',
        '008' => 'км',
        '009' => 'Мм',
        '039' => 'дюйм',
        '041' => 'фут',
        '043' => 'ярд',
        '047' => 'миля',
        '352' => 'мкс',
        '353' => 'млс',
        '018' => 'пог. м',
        '160' => 'гг',
        '161' => 'мг',
        '162' => 'кар',
        '163' => 'г',
        '164' => 'мкг',
        '166' => 'кг',
        '168' => 'т',
        '170' => 'кт',
        '173' => 'сг',
        '181' => 'БРТ',
        '185' => 'т грп',
        '206' => 'ц',
        '110' => 'мм3',
        '111' => 'мл',
        '112' => 'л',
        '113' => 'м3',
        '118' => 'дл',
        '122' => 'гл',
        '126' => 'Мл',
        '131' => 'дюйм3',
        '132' => 'фут3',
        '133' => 'ярд3',
        '159' => 'млн м3',
        '050' => 'мм2',
        '051' => 'см2',
        '053' => 'дм2',
        '055' => 'м2',
        '058' => 'тыс м2',
        '059' => 'га',
        '061' => 'км2',
        '071' => 'дюйм2',
        '073' => 'фут2',
        '075' => 'ярд2',
        '109' => 'а',
        '212' => 'Вт',
        '214' => 'кВт',
        '215' => 'МВт',
        '222' => 'В',
        '223' => 'кВ',
        '227' => 'кВ.А',
        '228' => 'МВ.А',
        '230' => 'квар',
        '243' => 'Вт.ч',
        '245' => 'кВт.ч',
        '246' => 'МВт.ч',
        '247' => 'ГВт.ч',
        '260' => 'А',
        '263' => 'А.ч',
        '264' => 'кА.ч',
        '270' => 'Кл',
        '271' => 'Дж',
        '273' => 'кДж',
        '274' => 'Ом',
        '280' => 'град. C',
        '281' => 'град. F',
        '282' => 'кд',
        '283' => 'лк',
        '284' => 'лм',
        '288' => 'K',
        '289' => 'Н',
        '290' => 'Гц',
        '291' => 'кГц',
        '292' => 'МГц',
        '294' => 'Па',
        '296' => 'См',
        '297' => 'кПа',
        '298' => 'МПа',
        '300' => 'атм',
        '301' => 'ат',
        '302' => 'ГБк',
        '303' => 'кБк',
        '304' => 'мКи',
        '305' => 'Ки',
        '306' => 'г Д/И',
        '307' => 'МБк',
        '308' => 'мб',
        '309' => 'бар',
        '310' => 'гб',
        '312' => 'кб',
        '314' => 'Ф',
        '316' => 'кг/м3',
        '320' => 'моль',
        '323' => 'Бк',
        '324' => 'Вб',
        '327' => 'уз',
        '328' => 'м/с',
        '330' => 'об/с',
        '331' => 'об/мин',
        '333' => 'км/ч',
        '335' => 'м/с2',
        '349' => 'Кл/кг',
        '499' => 'кг/с',
        '533' => 'т пар/ч',
        '596' => 'м3/с',
        '598' => 'м3/ч',
        '599' => 'тыс м3/сут',
        '616' => 'боб',
        '625' => 'л.',
        '626' => '100 л.',
        '630' => 'тыс станд. усл. кирп',
        '641' => 'дюжина',
        '657' => 'изд',
        '683' => '100 ящ.',
        '704' => 'набор',
        '715' => 'пар',
        '730' => '20',
        '732' => '10 пар',
        '733' => 'дюжина пар',
        '734' => 'посыл',
        '735' => 'часть',
        '736' => 'рул',
        '737' => 'дюжина рул',
        '740' => 'дюжина шт',
        '745' => 'элем',
        '778' => 'упак',
        '780' => 'дюжина упак',
        '781' => '100 упак',
        '796' => 'шт',
        '797' => '100 шт',
        '798' => 'тыс. шт',
        '799' => 'млн. шт',
        '800' => 'млрд. шт',
        '801' => 'билл. шт',
        '802' => 'квинт. шт',
        '820' => 'креп. спирта по массе',
        '821' => 'креп. спирта по объему',
        '831' => 'л 100% спирта',
        '833' => 'Гл 100% спирта',
        '841' => 'кг H2О2',
        '845' => 'кг 90% с/в',
        '847' => 'т 90% с/в',
        '852' => 'кг К2О',
        '859' => 'кг КОН',
        '861' => 'кг N',
        '863' => 'кг NaOH',
        '865' => 'кг Р2О5',
        '867' => 'кг U',
        '226' => 'В.А',
        '231' => 'м/ч',
        '232' => 'ккал',
        '233' => 'Гкал',
        '236' => 'кал/ч',
        '237' => 'ккал/ч',
        '238' => 'Гкал/ч',
        '251' => 'л. с',
        '254' => 'бит',
        '255' => 'бай',
        '256' => 'кбайт',
        '257' => 'Мбайт',
        '258' => 'бод',
        '287' => 'Гн',
        '313' => 'Тл',
        '317' => 'кг/см2',
        '337' => 'мм вод. ст',
        '338' => 'мм рт. ст',
        '339' => 'см вод. ст',
        '383' => 'руб',
        '414' => 'пасс.км',
        '421' => 'пасс. мест',
        '427' => 'пасс.поток',
        '449' => 'т.км',
        '510' => 'г/кВт.ч',
        '511' => 'кг/Гкал',
        '512' => 'т.ном',
        '513' => 'авто т',
        '514' => 'т.тяги',
        '515' => 'дедвейт.т',
        '516' => 'т.танид',
        '521' => 'чел/м2',
        '522' => 'чел/км2',
        '534' => 'т/ч',
        '535' => 'т/сут',
        '536' => 'т/смен',
        '539' => 'чел.ч',
        '540' => 'чел.дн',
        '545' => 'посещ/смен',
        '547' => 'пар/смен',
        '552' => 'т перераб/сут',
        '554' => 'ц перераб/сут',
        '639' => 'доз',
        '642' => 'ед',
        '661' => 'канал',
        '698' => 'мест',
        '728' => 'пач',
        '744' => '%',
        '746' => 'промилле',
        '762' => 'станц',
        '792' => 'чел',
        '810' => 'яч',
        '812' => 'ящ',
        '836' => 'гол',
        '839' => 'компл',
        '840' => 'секц',
        '868' => 'бут',
        '870' => 'ампул',
        '872' => 'флак',
        '876' => 'усл. ед',
        '879' => 'усл. шт',
        '881' => 'усл. банк',
        '884' => 'усл. кус',
        '887' => 'усл. ящ',
        '889' => 'усл. кат',
        '893' => 'усл. кирп',
        '896' => 'семей',
        '899' => 'домхоз',
        '902' => 'учен. мест',
        '904' => 'раб. мест',
        '906' => 'посад. мест',
        '908' => 'ном',
        '909' => 'кварт',
        '911' => 'коек',
        '913' => 'том книжн. фонд',
        '915' => 'усл. рем',
        '916' => 'усл. рем/год',
        '917' => 'смен',
        '918' => 'л. авт',
        '920' => 'л. печ',
        '921' => 'л. уч.-изд',
        '922' => 'знак',
        '923' => 'слово',
        '924' => 'символ',
        '925' => 'усл. труб',
        '950' => 'ваг (маш).дн',
        '954' => 'ваг.сут',
        '959' => 'автомоб.дн',
        '963' => 'привед.ч',
        '964' => 'самолет.км',
        '971' => 'корм. дн',
        '972' => 'ц корм ед',
        '975' => 'суго. сут.',
        '976' => 'штук в 20-футовом эквиваленте',
        '977' => 'канал. км',
        '978' => 'канал. конц',
        '983' => 'суд.сут',
        '984' => 'ц/га',
        '989' => 'чел/ч',
        '990' => 'пасс/ч',
        '991' => 'пасс. миля',
        '9910' => 'МЕ',
        '9911' => 'тыс. МЕ',
        '9912' => 'млн. МЕ',
        '9913' => 'МЕ/г',
        '9914' => 'тыс. МЕ/г',
        '9915' => 'млн. МЕ/г',
        '9916' => 'МЕ/мл',
        '9917' => 'тыс. МЕ/мл',
        '9918' => 'млн. МЕ/мл',
        '9920' => 'ЕД',
        '9921' => 'ЕД/г',
        '9922' => 'тыс. ЕД/г',
        '9923' => 'ЕД/мкл',
        '9924' => 'ЕД/мл',
        '9925' => 'тыс. ЕД/мл',
        '9926' => 'млн. ЕД/мл',
        '9927' => 'ЕД/сут',
        '9930' => 'АЕ',
        '9931' => 'тыс. АЕ',
        '9940' => 'АТрЕ',
        '9941' => 'тыс. АТрЕ',
        '9950' => 'ИР',
        '9951' => 'ИР/мл',
        '9960' => 'кБк/мл',
        '9961' => 'МБк/мл',
        '9962' => 'МБк/м2',
        '9970' => 'КИЕ/мл',
        '9971' => 'тыс. КИЕ/МЛ',
        '9980' => 'млн. КОЕ',
        '9981' => 'млн. КОЕ/пакет',
        '9982' => 'млрд. КОЕ',
        '9983' => 'ПЕ',
        '9985' => 'Мкг/мл',
        '9986' => 'Мкг/сут',
        '9987' => 'Мкг/ч',
        '9988' => 'Мкг/доза',
        '9990' => 'моль/мл',
        '9991' => 'ммоль/л',
        '2541' => 'бит/с',
        '2543' => 'кбит/с',
        '2545' => 'Мбит/с',
        '2547' => 'Гбит/с',
        '2551' => 'Байт/с',
        '2552' => 'Гбайт/с',
        '2553' => 'Гбайт',
        '2554' => 'Тбайт',
        '2555' => 'Пбайт',
        '2556' => 'Эбайт',
        '2557' => 'Збайт',
        '2558' => 'Йбайт',
        '2561' => 'кбайт/с',
        '2571' => 'Мбайт/с',
        '2581' => 'Эрл',
        '2931' => 'ГГц',
        '3135' => 'Дб',
        '3831' => 'руб. тонна',
        '5401' => 'дет. дн',
        '5451' => 'посещ',
        '6421' => 'ед/год',
        '6422' => 'вызов',
        '6423' => 'пос.ед',
        '6424' => 'штамм',
        '7923' => 'Абонент',
        '8361' => 'ос',
        '8751' => 'кор',
        '9111' => 'койк. дн',
        '9113' => 'пациент. дн',
        '9245' => 'запись',
        '9246' => 'докум',
        '9491' => 'лист. оттиск',
        '9501' => 'ваг (маш) ч',
        '9641' => 'летн. ч',
        '9642' => 'балл',
        '9805' => 'доллар за тонну'
    ];

    /**
     * Возвращает значение по коду. Например $code = '055', return = 'м2'
     * @param string $code
     * @return string
     */
    public static function getValueByCode(string $code): ?string
    {
        if (array_key_exists($code, self::$codes)) {
            return self::$codes[$code];
        }
        return null;
    }

    /**
     * Возвращает код по значению. Например $value = 'м2', return = '055'
     * @param string $value
     * @return string
     */
    public static function getCodeByValue(string $value): ?string
    {
        $result = array_search($value, self::$codes, true);
        if ($result !== false) {
            return $result;
        }
        return null;
    }
}