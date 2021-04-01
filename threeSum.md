给你一个包含 n 个整数的数组 nums，判断 nums 中是否存在三个元素 a，b，c ，使得 a + b + c = 0 ？请你找出所有和为 0 且不重复的三元组。
注意：答案中不可以包含重复的三元组。
排序 + 双指针
流程：
  1. 首先将数据排序 数组的总数 = n
  2. 判断数组的第一个元素是不是大于0 如果大于0 的话 因为数组是有序的那么 肯定没有三个数的和是大于0了
  3. 然后找出两个指针 L和R 
  4. 令左指针L = nums[i+1], 右指针R = nums[s-1] 然后执行循环：
     4.1 当nums[i] + nums[L] + num[R] == 0 的时候 注意这时候要判断下左边界和右边界下一个值是不是重复的 如果重复就把指针继续往下移位
     4.2 当nums[i] + nums[L] + num[R] > 0 的时候 说明R 太大了 把R 向下移位
     4.3 反之把L 像下一位移位
 