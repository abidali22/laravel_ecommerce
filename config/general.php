<?php

return [
    'mysql_date_format'        => "%m-%d-%Y", //carbon date format,
    'mysql_datetime_format'    => "%m-%d-%Y %H:%I:%S",
    'carbon_date_format'       => "d-m-Y", //carbon date format,
    'carbon_datetime_format'   => "Y-m-d H:i:s",
    'carbon_date_format_renewal' => "m/d/Y", //carbon date format,
    'carbon_date_format_renewal_short' => "m/d", //carbon date format
    'user_avatar_path'         => 'uploads/avatars',
    'user_avatar_public_path'  => public_path('uploads/avatars/').'/',
    'user_avatar_default_name' => "avatar-blank.jpg",
];
