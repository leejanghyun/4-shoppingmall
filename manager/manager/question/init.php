<?php
    require_once('../db/database.php');
    mysql_query("set names utf8");//한글꺠짐 방지      
  	$conn=mysql_connect($dbServer,$dbUser,$dbPass) or die("init.php error");
    session_start();
    $question_tbl="question";
    
    //프라이머리키 재정렬
    $sql="ALTER TABLE shoppingmall.$question_tbl AUTO_INCREMENT=1";
    $result = mysql_query($sql,$conn);
    $sql="SET @COUNT = 0";
    $result = mysql_query($sql,$conn);
    $sql="update shoppingmall.$question_tbl SET shoppingmall.$question_tbl.no = @COUNT:=@COUNT+1";
    $result = mysql_query($sql,$conn); 

    $page_size=8;//한페이지당 8개 작성
    
    $result=mysql_query("SELECT count(*) FROM shoppingmall.$question_tbl",$conn);
    $result_row=mysql_fetch_row($result);
    $total_row = $result_row[0];//현재 저장된 댓글의 총 갯수

    if($total_row<=0) $total_row=0;
   
    $total_page = floor(($total_row-1) /$page_size)+1; 
    
 
?>