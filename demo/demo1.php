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

die;

$fiveEur = Money::EUR(500);

echo $fiveEur;

$tenEur = $fiveEur->add($fiveEur);


list($part1, $part2, $part3) = $tenEur->allocate(array(1, 1, 1));
assert($part1->equals(Money::EUR(334)));
assert($part2->equals(Money::EUR(333)));
assert($part3->equals(Money::EUR(333)));

?>