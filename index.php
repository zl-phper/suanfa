<?php


* 有 n 桶牛奶，其中有 1 桶有问题，老鼠喝了后第二天会死掉。如何用最少的老鼠测出有问题的那瓶牛奶？
* 
* 答案
* 
* 把 n 转换成二进制，二进制的长度就是对应老鼠的个数
* 
* 操作方案
* 
* 为了方便演示假设 n = 8，转换成二进制位 1000，可知需要最少的老鼠是 4 只
* 
* 第一步
* 
* 给 8 桶牛奶用二进制编号
* 第 1 桶牛奶 0001
* 第 2 桶牛奶 0010
* 第 3 桶牛奶 0011
* 第 4 桶牛奶 0100
* 第 5 桶牛奶 0101
* 第 6 桶牛奶 0110
* 第 7 桶牛奶 0111
* 第 8 桶牛奶 1000
* 
* 第二步
* 
* 4 只老鼠按顺序排好，面对着牛奶对应的二进制编号，每桶二进制编号为 1 对应的老鼠喝牛奶
* 
* 老鼠 1 喝第 8 桶的牛奶
* 老鼠 2 喝第 4、5、6、7 桶的牛奶
* 老鼠 3 喝第 2、3、6、7 桶的牛奶
* 老鼠 4 喝第 1、3、5、7 桶的牛奶
* 
* 第三步
* 
* 第二天后把这 4 只老鼠还按昨天的顺序排好，死了的老鼠标记为 1，没有死的老鼠标记为 0，这这样 4 只老鼠就组成了一个二进制的数，与之对应的牛奶编号就是有毒的那桶。比如老鼠 2 和老鼠 3 死了，对应的二进制编号为 0110，那就说明第 6 桶牛奶有毒




/**
 * 在一个二维数组中（每个一维数组的长度相同），
 * 每一行都按照从左到右递增的顺序排序，每一列都按照从上到下递增的顺序排序。
 * 请完成一个函数，输入这样的一个二维数组和一个整数，判断数组中是否含有该整数
 * @param $target 所需要查询的数
 * @param $array  二维数组
 * @return bool 是否找到了这个数字
 */
function Find($target, $array)
{
    $isFind = false;
    foreach ($array as $key => $val) {

        if (in_array($target, $val)) $isFind = true;
    }
    return $isFind;
}

/**
 * 请实现一个函数，将一个字符串中的每个空格替换成“%20”。例如，当字符串为We Are Happy.
 * 则经过替换之后的字符串为We%20Are%20Happy。
 * @param $str
 * @return string
 */
function replaceSpace($str)
{
    $returnStr = '';
    $cont = strlen($str);

    for ($i = 0; $i < $cont; $i++) {
        $new = (ord($str[$i]) == 32) ? "%20" : $str[$i];
        $returnStr .= $new;
    }

    return $returnStr;
}

/**
 * 把一个数组最开始的若干个元素搬到数组的末尾，我们称之为数组的旋转。 输入一个非
 * 减排序的数组的一个旋转，输出旋转数组的最小元素。 例如数组{3,4,5,1,2}为{1,2,3,4,5}
 * 的一个旋转，该数组的最小值为1。 NOTE：给出的所有元素都大于0，若数组大小为0，请返回0。
 * @param $rotateArray
 * @return string
 */
function minNumberInRotateArray($rotateArray)
{
    if (empty($rotateArray)) return 0;

    sort($rotateArray); // 快排替换

    return $rotateArray[0];
}

/**
 * 大家都知道斐波那契数列，现在要求输入一个整数n，请你输出斐波那契数列的第n项（从0开始，第0项为0）。
 * @param $n
 * @return mixed
 */
function Fibonacci($n)
{
//    递归 太他妈慢了 时间复杂度太高
//    if ($n == 1 || $n == 0) {
//        return $n;
//    }
//
//    return Fibonacci($n - 1) + Fibonacci($n - 2);

    $last = 0;
    $sum = 1;
    while ($n-- > 0) {
        $sum += $last;
        $last = $sum - $last;
    }
    return $last;

}

/**
 * 一只青蛙一次可以跳上1级台阶，也可以跳上2级。求该青蛙跳上一个n级的台阶总共有多少种跳法（先后次序不同算不同的结果）。
 * @param $num
 * @return int
 */
function jumpFloor($num)
{
    // 递归慢的话 可以参考上面代码
    if ($num == 1) {
        return 1;
    } else if ($num == 2) {
        return 2;
    } else {
        return jumpFloor($num - 1) + jumpFloor($num - 2);
    }
}

/**
 * 一只青蛙一次可以跳上1级台阶，也可以跳上2级……它也可以跳上n级。求该青蛙跳上一个n级的台阶总共有多少种跳法。  变态跳台阶
 * @param $number
 * @return int
 */
function jumpFloorII($number)
{
    if ($number <= 0)
        return -1;
    if ($number == 1)
        return 1;
    return 2 * jumpFloor($number - 1);
}

/**
 * 我们可以用2*1的小矩形横着或者竖着去覆盖更大的矩形。请问用n个2*1的小矩形无重叠地覆盖一个2*n的大矩形，总共有多少种方法？ (斐波那契数列 变种题 找规律)
 * @param $number
 * @return int
 */
function rectCover($number)
{
    if ($number <= 0) {
        return 0;
    }
    if ($number == 1) {
        return 1;
    }
    if ($number == 2) {
        return 2;
    }
    $numOne = 1;
    $numTwo = 2;
    for ($i = 3; $i <= $number; $i++) {
        $numTwo += $numOne;
        $numOne = $numTwo - $numOne;
    }
    return $numTwo;
}

/**
 * 输入一个整数，输出该数二进制表示中1的个数。其中负数用补码表示。 需要了解  什么是反码 什么是补码 （请百度）
 * @param $n
 * @return int
 */
function NumberOf1($n)
{
    $flag = true;
    /**
     *如果是一个负数，要做的有两点：
     *1. 对flag进行标记
     *2. 该数要和-1进行异或^
     *和-1进行异或，是因为-1的补码表示是32个1,进行异或后，
     *该负数的补码表示中，所有为0的位，都变为了1，就和正数一样进行1的统计，
     *最后还要用32减去该值，因为在n为负数的情况下，统计的是其中位数为0的个数。
     */
    if ($n < 0) {
        $flag = false;
        $n = $n ^ -1;
    }

    $count = 0;
    while ($n != 0) {
        if ($n % 2 != 0) {
            $count++;
        }
        $n = $n >> 1;
    }

    if (!$flag) {
        $count = 32 - $count;
    }

    return $count;
}

/**
 * 输入一个整数数组，实现一个函数来调整该数组中数字的顺序，使得所有的奇数位于数组的前半部分，
 * 所有的偶数位于数组的后半部分，并保证奇数和奇数，偶数和偶数之间的相对位置不变。
 * @param $array
 * @return array
 */
function reOrderArray($array)
{
    if (empty($array) || !is_array($array)) return [];

    $left = [];
    $right = [];

    foreach ($array as $k => $v) {
        if ($v % 2 == 0) {
            $right[] = $v;
        } else {
            $left[] = $v;
        }
    }
    return array_merge($left, $right);
}

/**
 * 输入一个矩阵，按照从外向里以顺时针的顺序依次打印出每一个数字，例如，如果输入如下4 X 4矩阵：
 *        1    2   3   4
 *     5    6   7   8
 *     9    10  11 12
 *      13  14 15 16
 * 则依次打印出数字1、2、3、4、8、12、16、15、14、13、9、5、6、7、11、10。
 * @param $matrix
 * @return  array
 */
function printMatrix($matrix)
{
    $output = [];
    $left = 0;
    $right = count($matrix[0]) - 1;
    $top = 0;
    $bottom = count($matrix) - 1;
    while ($left <= $right && $top <= $bottom) {
        for ($i = $left; $i <= $right; $i++) $output[] = $matrix[$top][$i];
        if ($top >= $bottom) break;
        for ($i = $top + 1; $i <= $bottom; $i++) $output[] = $matrix[$i][$right];
        if ($left >= $right) break;
        for ($i = $right - 1; $i >= $left; $i--) $output[] = $matrix[$bottom][$i];
        if ($bottom - 1 <= $top) break;
        for ($i = $bottom - 1; $i > $top; $i--) $output[] = $matrix[$i][$left];
        $left++;
        $right--;
        $top++;
        $bottom--;
    }
    return $output;
}

/**
 * 数组中有一个数字出现的次数超过数组长度的一半，请找出这个数字。例如输入一个长度为9的数组{1,2,3,2,2,2,5,4,2}。
 * 由于数字2在数组中出现了5次，超过数组长度的一半，因此输出2。如果不存在则输出0。
 * 思路 ： 如果一个数出现超过了一般 那么 他肯定比其他数出现的总和 还要多 （先找出这个数 然后查看这个数是不是超过数组长度的一半）
 * @param $array
 * @return int
 */
function moreThanHalfNum($array)
{
    $arrayCount = count($array);
    $res = $array[0];
    $count = 1;
    for ($i = 1; $i < $arrayCount; $i++) {
        if ($array[$i] == $res) {
            $count++;
        } else {
            $count--;
        }
        if ($count == 0) {
            $res = $array[$i];
            $count = 1;
        }
    }
    $count = 0;
    for ($i = 0; $i < $arrayCount; $i++) {
        if ($array[$i] == $res) $count++;
    }
    return $count > $arrayCount / 2 ? $res : 0;
}

/**
 * 输入n个整数，找出其中最小的K个数。例如输入4,5,1,6,2,7,3,8这8个数字，则最小的4个数字是1,2,3,4,。
 * 思路: 可以构建一个最小的堆 然后循环每个数字 去和堆顶的数字比较
 * @param $input
 * @param $k
 */
function GetLeastNumbers($input, $k)
{
    //异常判断  如果数组的长度小于 $k  直接返回 输入数组

    if (count($input) < $k) return [];

    $top = [];

    //首先拿 数组中的 $k个值放入 top 中

    for ($i = 0; $i < $k; $i++) {
        $top[] = $input[$i];
    }
    sort($top);

    // 循环去判断$k 后面数组的数据是不是比top的顶部还要小  如果还小 那么做替换

    for ($i = $k; $i < count($input); $i++) {
        if ($input[$i] < $top[$k - 1]) {
            $top[$k - 1] = $input[$i];
            sort($top);
        }
    }

    return $top;
}

/**
 * 例如:{6,-3,-2,7,-15,1,2,2},连续子向量的最大和为8(从第0个开始,到第3个为止)。给一个数组，返回它的最大连续子序列的和，
 * 思路   ：
 * @param $array
 * @return int
 */
function FindGreatestSumOfSubArray($array)
{
    $max = 0;
    $tmp = 0;
    $flag = false;
    $isAllNagetive = true;
    foreach ($array as $num) {
        $tmp += $num;
        if ($num >= 0) {
            $isAllNagetive = false;
        }
        if (!flag) {
            $max = $tmp;    //max初始化
            $flag = true;
        }
        if ($tmp > $max) {
            $max = $tmp;
        } else if ($tmp < 0) {
            $tmp = 0;
        }
    }
    if ($isAllNagetive) {
        $flag = false;
        foreach ($array as $num) {
            if (!$flag) {
                $max = $num;
                $flag = true;
            }
            if ($max < $num) {
                $max = $num;
            }
        }
    }
    return $max;
}

/**
 * 输入一个字符串,按字典序打印出该字符串中字符的所有排列。例如输入字符串abc,则打印出由字符a,b,c所能排列出来的所有字符串abc,acb,bac,bca,cab和cba。
 * @param $str
 * @return array
 */
function Permutation($str)
{
    // write code here
    $arr = array();
    if ($str == "") {
        return $arr;
    } else {
        $a = str_split($str);
        if (count($a) == 1) {
            array_push($arr, $str);
            return $arr;
        } else {

            func2($a, '', $arr);
            return $arr;
        }
    }
}

function func2($a, $str, &$arr)
{ // $str 为保存由 i 组成的一个排列情况
    $cnt = count($a);
    if ($cnt == 1) {
        array_push($arr, $str . $a[0]);
    } else {
        for ($i = 0; $i < count($a); $i++) {

            $tmp = $a[0];
            $a[0] = $a[$i];
            $a[$i] = $tmp;
            if ($a[0] == $a[$i] && $i != 0) {
            } else {
                func2(array_slice($a, 1), $str . $a[0], $arr);
            }
        }
    }

}

/**
 * 求出1~13的整数中1出现的次数,并算出100~1300的整数中1出现的次数？
 * 为此他特别数了一下1~13中包含1的数字有1、10、11、12、13因此共出现6次,
 * 但是对于后面问题他就没辙了。ACMer希望你们帮帮他,并把问题更加普遍化,可以很快的求出任意非负整数区间中1出现的次数（从1 到 n 中1出现的次数）。
 * @param $n
 * @return float|int
 */
function NumberOf1Between1AndN_Solution($n)
{

    if ($n < 1) {
        return 0;
    }
    $res = 0;
    $factor = 1;   //统计的位数
    while (floor($n / $factor)) {
        $low = $n - floor($n / $factor) * $factor;
        $cur = floor($n / $factor) % 10;
        $high = floor($n / ($factor * 10));
        switch ($cur) {
            case 0:
                $res += $high * $factor;
                break;
            case 1:
                $res += $high * $factor + $low + 1;
                break;
            default:
                $res += ($high + 1) * $factor;
        }
        $factor *= 10;
    }
    return $res;
}

/**
 * 输入一个正整数数组，把数组里所有数字拼接起来排成一个数，打印能拼接出的所有数字中最小的一个。例如输入数组{3，32，321}，
 * 则打印出这三个数字能排成的最小数字为321323。
 * @param $numbers
 * @return mixed
 */
function PrintMinNumber($numbers)
{
    if (count($numbers) == 1) {
        return $numbers[0];
    }
    sort($numbers);
    $arr = $numbers;
    $result = [];

    for ($i = 0; $i < count($arr); $i++) {
        //循环次数
        $newArr = $numbers;
        unset($newArr[$i]);
        $newArr = array_values($newArr);
        //print_r($newArr);
        for ($j = 0; $j < count($newArr); $j++) {
            $str = '';
            $str = $arr[$i] . $newArr[$j];
            unset($newArr[$j]);
            $str = $str . implode("", $newArr);
            $result [] = $str;
            $newArr = $numbers;
            unset($newArr[$i]);
            $newArr = array_values($newArr);

        }
    }
    sort($result);
    return $result[0];
}

/**
 * 把只包含质因子2、3和5的数称作丑数（Ugly Number）。例如6、8都是丑数，但14不是，因为它包含质因子7。
 * 习惯上我们把1当做是第一个丑数。求按从小到大的顺序的第N个丑数。
 * @param $index
 * @return int|mixed
 */
function GetUglyNumber_Solution($index)
{
    if ($index == 0) return 0;

    $arr = [];
    $arr[0] = 1;
    $index1 = 0;
    $index2 = 0;
    $index3 = 0;
    for ($i = 1; $i < $index; $i++) {
        $arr[$i] = min($arr[$index1] * 2, $arr[$index2] * 3, $arr[$index3] * 5);
        if ($arr[$i] == $arr[$index1] * 2)
            $index1++;
        if ($arr[$i] == $arr[$index2] * 3)
            $index2++;
        if ($arr[$i] == $arr[$index3] * 5)
            $index3++;
    }
    return end($arr);
}

/**
 * 在一个字符串(0<=字符串长度<=10000，全部由字母组成)中找到第一个只出现一次的字符,并返回它的位置, 如果没有则返回 -1（需要区分大小写）.
 * @param $str
 * @return int
 */
function FirstNotRepeatingChar($str)
{
    if ($str == '') return -1;

    $count = strlen($str);
    $str1 = $str;
    for ($i = 0; $i < $count; $i++) {
        $count1 = 0;
        for ($j = 0; $j < $count; $j++) {
            if ($str[$i] == $str1[$j])
                $count1++;
            if ($count1 > 1)
                continue;
        }
        if ($count1 == 1)
            return $i;
    }
}

/**
 * 一个整型数组里除了两个数字之外，其他的数字都出现了偶数次。请写程序找出这两个只出现一次的数字。
 * @param $array
 * @return array
 */
function FindNumsAppearOnce($array)
{
    // 比如[a,b]，其中ab是出现一次的两个数字
    $k = [];
    for ($i = 0; $i < count($array); $i++) {
        $count = 0;
        if ($k[$array[$i]] != null) {
            $count = $k[$array[$i]];
        }
        $k[$array[$i]] = $count + 1;
    }
    $res = [];
    foreach ($k as $key => $value) {
        if ($value == 1) {
            array_push($res, $key);
        }
    }
    if (count($res) < 2) {
        for ($i = 0; $i < 2 - count($res); $i++) {
            array_push($res, 0);
        }
    }
    return $res;
}

