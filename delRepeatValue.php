<?php
//给你一个有序数组 nums ，请你 原地 删除重复出现的元素，使每个元素 最多出现两次 ，返回删除后数组的新长度。
//不要使用额外的数组空间，你必须在 原地 修改输入数组 并在使用 O(1) 额外空间的条件下完成。
// 分析 ： 数组是有序的 所以 重复的元素必然是相连的，那么我们可以使用快慢之指针来完成，
// step1 : slow 和 fast 指针都指向数组的 0 个位置，因为数组前两个元素不需要去重所以我们把两个指针都向后移
// step2 : 如果nums[slow -2 ] 和 fast 相等 那么说明已经出现了三个重复的值，那么我们需要把fast 指针向后移动，
// slow 不动，代表当前位置的值需要被替换掉
// 如果fast 和 slow -2 不一样了 说明这个值可以继续后移位  然后快指针溢出 那么 slow的值就是长度

function removeRepectValue(&$nums){
	$slow = 0;
    $size = count($nums);
	for($fast=0; $fast<$nums; $fast++){
		if($slow <2 || $nums[$fast] != $nums[$slow - 2]){
		$nums[$slow] = $nums[$fast];
		$slow += 1;
		}

	}
	return $slow;
}
