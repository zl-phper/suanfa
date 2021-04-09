<?php
//给你 n 个非负整数 a1，a2，...，an，每个数代表坐标中的一个点 (i, ai) 。在坐标内画 n 条垂直线，垂直线
//i 的两个端点分别为 (i, ai) 和 (i, 0) 。找出其中的两条线，使得它们与 x 轴共同构成的容器可以容纳最多的水。
//说明：你不能倾斜容器。
class Solution {

    /**
     * @param Integer[] $height
     * @return Integer
     */
    function maxArea($height) {
        $arr = $height;

        $left = 0;
        $right = count($arr) - 1;
        $max = 0;

        while ($left < $right) {
            $size = ($right - $left) * min($arr[$left],$arr[$right]);
            $max = max($size,$max);
            if($arr[$left] < $arr[$right]){
                $left++;
            }else{
                $right --;
            }
        }
        return $max;
    }
}
