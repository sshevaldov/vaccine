<?php
session_start();
if (true) {
    $_SESSION['ps'] = $_POST['datepicker_startDate'];
    if ($_POST['period_selector'] == "today") {
        $_SESSION['dp1'] = "CURRENT_DATE";
        $_SESSION['dp2'] = "CURRENT_DATE";
    } elseif ($_POST['period_selector'] == "tom") {
        $_SESSION['dp1'] = "DATE_ADD(CURRENT_DATE, INTERVAL +1 DAY)";
        $_SESSION['dp2'] = "DATE_ADD(CURRENT_DATE, INTERVAL +1 DAY)";
    } else {



        if ($_POST['datepicker_startDate'] == '')
            $_SESSION['dp1'] = null;
        else $_SESSION['dp1'] = "'{$_POST['datepicker_startDate']}'";
        if ($_POST['datepicker_endDate'] == '')
            $_SESSION['dp2'] = '';
        else $_SESSION['dp2'] = "'{$_POST['datepicker_endDate']}'";
    }
    $_SESSION['sort'] = $_POST['sort'];

    $_SESSION['city_sel'] = $_POST['city_selector'];
    $_SESSION['pl_sel'] = $_POST['place_selector'];
    $_SESSION['t_sel'] = $_POST['time_selector'];
    $res = $_POST['datepicker1'];
    $result1 = array(
        'name' =>  $res
    );
    echo json_encode($result1);
}


// SELECT
//     *
// FROM
//     `list`
// WHERE
//     `date` >=  '\"CURRENT_DATE\"'
// ORDER BY
//     DATE,
//     TIME
