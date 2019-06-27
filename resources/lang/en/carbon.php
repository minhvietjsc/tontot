<?php
/*
 * This file is part of the Carbon package.
 *
 * (c) Brian Nesbitt <brian@nesbot.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
return [
    'year' => ':count năm|:count năm',
    'y' => ':countyr|:countyrs',
    'month' => ':count tháng|:count tháng',
    'm' => ':countmo|:countmos',
    'week' => ':count tuần|:count tuần',
    'w' => ':countw|:countw',
    'day' => ':count ngày|:count ngày',
    'd' => ':countd|:countd',
    'hour' => ':count giờ|:count giờ',
    'h' => ':counth|:counth',
    'minute' => ':count phút|:count phút',
    'min' => ':countm|:countm',
    'second' => ':count giây|:count giây',
    's' => ':counts|:counts',
    'ago' => ':time trước đây',
    'from_now' => ':time từ giờ',
    'after' => ':time sau',
    'before' => ':time trước',
    'diff_now' => 'vừa xong',
    'diff_yesterday' => 'hôm qua',
    'diff_tomorrow' => 'ngày mai',
    'diff_before_yesterday' => 'trước ngày hôm qua',
    'diff_after_tomorrow' => 'sau ngày mai',
    'period_recurrences' => '1 lần|:count lần',
    'period_interval' => 'mỗi :interval',
    'period_start_date' => 'từ :date',
    'period_end_date' => 'đến :date',
    'months' => ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'],
    'months_short' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
    'weekdays' => ['Chủ nhật', 'Thứ 2', 'Thứ 3', 'Thứ 4', 'Thứ 5', 'Thứ 6', 'Thứ 7'],
    'weekdays_short' => ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
    'weekdays_min' => ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
    'ordinal' => function ($number) {
        $lastDigit = $number % 10;
        return $number.(
            (~~($number % 100 / 10) === 1) ? 'th' : (
                ($lastDigit === 1) ? 'st' : (
                    ($lastDigit === 2) ? 'nd' : (
                        ($lastDigit === 3) ? 'rd' : 'th'
                    )
                )
            )
        );
    },
];