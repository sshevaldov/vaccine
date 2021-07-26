<?php
session_start();
$_SESSION['dp1'] = $_POST['datepicker_startDate'];
$_SESSION['dp2'] = $_POST['datepicker_endDate'];
$_SESSION['city_sel'] = $_POST['city_selector'];
$_SESSION['pl_sel'] = $_POST['place_selector'];
$_SESSION['t_sel'] = $_POST['time_selector'];
