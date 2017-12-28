<?php

    //echo date_pasre_fr2en('15/10/2015');
    //echo date_parse_en2fr('2010-11-10');

    // dd/mm/yyyy ==> yyyy-mm-dd
    function date_pasre_fr2en($date, $sep='/')
    {
        if($date == null || $date == '')
            return '';
        else
        {
            $dateConvert = $date == '' ? NULL : date('Y-m-d', strtotime(str_replace($sep, '-', $date)));
            return $dateConvert;
        }
    }

    // yyyy-mm-dd ==>  dd/mm/yyyy
    function date_parse_en2fr($date)
    {
        if($date == null || $date == '')
            return '';
        else
        {
            $new_date = date('d/m/Y',strtotime($date));
            return $new_date;
        }
    }