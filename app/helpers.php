<?php

use Carbon\Carbon;

if ( ! function_exists('changeSelectedDateFormat')) {

      function changeSelectedDateFormat($value)
      {
        if ( ! empty($value)) {
          $carbonDate = Carbon::parse($value);            
          $value = ($carbonDate->timestamp >= 0) ? $carbonDate->format(config('general.carbon_date_format')) : null;
        }
        echo $value;
      }

  }