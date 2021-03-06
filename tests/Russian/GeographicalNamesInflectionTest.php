<?php
namespace morhos\test\Russian;

require_once __DIR__.'/../../vendor/autoload.php';

use morphos\Russian\Cases;
use morphos\Russian\GeographicalNamesInflection;

class GeographicalNamesInflectionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider wordsProvider
     */
    public function testInflection($word, $case2, $case3, $case4, $case5, $case6)
    {
        $this->assertEquals([
            Cases::IMENIT => $word,
            Cases::RODIT => $case2,
            Cases::DAT => $case3,
            Cases::VINIT => $case4,
            Cases::TVORIT => $case5,
            Cases::PREDLOJ => $case6,
        ], GeographicalNamesInflection::getCases($word));
    }

    public function wordsProvider()
    {
        return array(
            ['Москва', 'Москвы', 'Москве', 'Москву', 'Москвой', 'Москве'],
            ['Киев', 'Киева', 'Киеву', 'Киев', 'Киевом', 'Киеве'],
            ['Ишимбай', 'Ишимбая', 'Ишимбаю', 'Ишимбай', 'Ишимбаем', 'Ишимбае'],
            ['Африка', 'Африки', 'Африке', 'Африку', 'Африкой', 'Африке'],
            ['Уругвай', 'Уругвая', 'Уругваю', 'Уругвай', 'Уругваем', 'Уругвае'],
            ['Европа', 'Европы', 'Европе', 'Европу', 'Европой', 'Европе'],
            ['Азия', 'Азии', 'Азии', 'Азию', 'Азией', 'Азии'],
            ['Рига', 'Риги', 'Риге', 'Ригу', 'Ригой', 'Риге'],
            ['Волга', 'Волги', 'Волге', 'Волгу', 'Волгой', 'Волге'],
            ['Ставрополь', 'Ставрополя', 'Ставрополю', 'Ставрополь', 'Ставрополем', 'Ставрополе'],
            ['Тверь', 'Твери', 'Твери', 'Тверь', 'Тверью', 'Твери'],
            ['Ессентуки', 'Ессентуков', 'Ессентукам', 'Ессентуки', 'Ессентуками', 'Ессентуках'],
            ['Пермь', 'Перми', 'Перми', 'Пермь', 'Пермью', 'Перми'],
            ['Рязань', 'Рязани', 'Рязани', 'Рязань', 'Рязанью', 'Рязани'],
            ['Осташков', 'Осташкова', 'Осташкову', 'Осташков', 'Осташковым', 'Осташкове'],
            ['Грозный', 'Грозного', 'Грозному', 'Грозный', 'Грозным', 'Грозном'],
            ['Благодарный', 'Благодарного', 'Благодарному', 'Благодарный', 'Благодарным', 'Благодарном'],
            ['Псков', 'Пскова', 'Пскову', 'Псков', 'Псковом', 'Пскове'],
            ['Киров', 'Кирова', 'Кирову', 'Киров', 'Кировом', 'Кирове'],

            // сложные названия
            ['Санкт-Петербург', 'Санкт-Петербурга', 'Санкт-Петербургу', 'Санкт-Петербург', 'Санкт-Петербургом', 'Санкт-Петербурге'],
            ['Ростов-на-Дону', 'Ростова-на-Дону', 'Ростову-на-Дону', 'Ростов-на-Дону', 'Ростовом-на-Дону', 'Ростове-на-Дону'],
            ['Нижний Новгород', 'Нижнего Новгорода', 'Нижнему Новгороду', 'Нижний Новгород', 'Нижним Новгородом', 'Нижнем Новгороде'],
            ['Набережные Челны', 'Набережных Челнов', 'Набережным Челнам', 'Набережные Челны', 'Набережными Челнами', 'Набережных Челнах'],

            // N край
            ['Краснодарский край', 'Краснодарского края', 'Краснодарскому краю', 'Краснодарский край', 'Краснодарским краем', 'Краснодарском крае'],

           	// N область
            ['Ростовская область', 'Ростовской области', 'Ростовской области', 'Ростовскую область', 'Ростовской областью', 'Ростовской области'],

            // город N
            ['город Москва', 'города Москва', 'городу Москва', 'город Москва', 'городом Москва', 'городе Москва'],

            // село N
            ['село Привольное', 'села Привольное', 'селу Привольное', 'село Привольное', 'селом Привольное', 'селе Привольное'],

            // исключения
            ['Великие Луки', 'Великих Лук', 'Великим Лукам', 'Великие Луки', 'Великими Луками', 'Великих Луках'],

            // неизменяемые названия
            ['США', 'США', 'США', 'США', 'США', 'США'],
            ['ОАЭ', 'ОАЭ', 'ОАЭ', 'ОАЭ', 'ОАЭ', 'ОАЭ'],
        );
    }

    /**
     * @dataProvider immutableWordsProvider
     */
    public function testImmutableWords($word)
    {
        $this->assertFalse(GeographicalNamesInflection::isMutable($word));
    }

    public function immutableWordsProvider()
    {
        return array(
            array('сша'),
            array('оаэ'),
        );
    }
}
