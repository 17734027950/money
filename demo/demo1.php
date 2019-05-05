<?php
/**
 * 
 */

require_once __DIR__."/../vendor/autoload.php";

use Money\Money;
// use Money\MoneyConvertor;


$mc = new \Money\MoneyConvertor();

echo "￥1000.00";
echo "&nbsp;";
//数字类型
echo $mc->convert(1000.00);

echo "<hr/>";


echo "￥1.322";
echo "&nbsp;";
//字符串类型
echo $mc->convert('1.322');

echo "<hr/>";


echo "￥100,000,000.00";
echo "&nbsp;";
//特殊字符串逗号分割类型
echo $mc->convert('100,000,000.00');

echo "<hr/>";

echo "￥.5";
echo "&nbsp;";
//特殊字符串无整数位类型
echo $mc->convert('.5');

echo "<hr/>";

$num1 = 0.1234567890;
echo number2chinese($num1);    // 零点一二三四五六七八九
echo number2chinese($num1, true);    // 零元壹角贰分叁厘肆毫

echo "<hr/>";

$num2 = 20000000000000000;
echo number2chinese($num2);    // 两兆
echo number2chinese($num2, true);    // 贰兆元整

echo "<hr/>";

$num3 = -1202030;
echo number2chinese($num3);    // 负一百二十万零两千零三十
echo number2chinese($num3, true);    // 负壹佰贰拾万零贰仟零叁拾元整

echo "<hr/>";

$num2 = 1234567890.0123456789;
echo number2chinese($num2);    // 十二亿三千四百五十六万七千八百九十点零一二三
echo number2chinese($num2, true);    // 壹拾贰亿叁仟肆佰伍拾陆万柒仟捌佰玖拾元零壹分贰厘叁毫

echo "<hr/>";

$num2 = '1234567890.0123456789';
echo number2chinese($num2);    // 十二亿三千四百五十六万七千八百九十点零一二三四五六七八九
echo number2chinese($num2, true);    // 壹拾贰亿叁仟肆佰伍拾陆万柒仟捌佰玖拾元壹分贰厘叁毫

echo "<hr/>";

$num1 = 0.1234567890;
echo number2chinese(number_format($num1, 2));    // 零点一二
echo number2chinese(number_format($num1, 2), true);    // 零元壹角贰分

die;

$fiveEur = Money::EUR(500);

echo $fiveEur;

$tenEur = $fiveEur->add($fiveEur);


list($part1, $part2, $part3) = $tenEur->allocate(array(1, 1, 1));
assert($part1->equals(Money::EUR(334)));
assert($part2->equals(Money::EUR(333)));
assert($part3->equals(Money::EUR(333)));

?>