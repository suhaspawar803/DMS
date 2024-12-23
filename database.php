<?php

$db = pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=root");

if($db)
{
  $sql ="CREATE DATABASE dms;";
  pg_query($db, $sql);
  $db = pg_connect("host=localhost port=5432 dbname=dms user=postgres password=root");
  
  $sqls ="CREATE TABLE research_paper_info(sr_no serial primary key, tname varchar(30), title varchar(30), sem_con varchar(50),organizer varchar(25), fdate date, tdate date, place varchar(20), level varchar(15));";
  $sqls .="CREATE TABLE books_published_info(sr_no serial primary key,tname varchar(25),title varchar(30),conference varchar(50),publisher varchar(25), date date,isbn_issn varchar(50),level varchar(20));";
  $sqls .="CREATE TABLE student_competition_info(sr_no serial primary key,sname varchar(50), cname varchar(30), awards varchar(20),duration varchar(10), comp_date date, level varchar(20), place varchar(25), class char(5), library_no varchar(10));";
  $sqls .="CREATE TABLE users(id serial primary key,name varchar(30), username varchar(30), password varchar(8), role varchar(10), library_No varchar(10));";
  $sqls .= "CREATE TABLE placements(sr_no serial PRIMARY KEY, cname varchar(25), total_registered integer, total_selected integer, date date);";
  $sqls .= "CREATE TABLE extra_activity(sr_no serial PRIMARY KEY, department varchar(15), activity varchar(50), total_students integer, date date);";
  $sqls .= "CREATE TABLE staff_committee(sr_no serial PRIMARY KEY, tname varchar(30), committee varchar(30), nature_work varchar(50), date date);";
  $sqls .= "CREATE TABLE extainsions(sr_no serial PRIMARY KEY, department varchar(15), activity varchar(50), total_benefited integer, date date);";
  $sqls .= "CREATE TABLE staff_activity(sr_no serial PRIMARY KEY, tname varchar(30), department varchar(15), activity varchar(50), date date);";
  $sqls .= "CREATE TABLE student_activity(sr_no serial PRIMARY KEY, Department varchar(30), class varchar(15), activity varchar(50), date date, total_participated integer);";
  $sqls .= "CREATE TABLE mou_info(sr_no serial PRIMARY KEY, Department varchar(30), company varchar(50), fdate date, tdate date, activity varchar(50), purpose varchar(100));";
  $sqls .= "CREATE TABLE alumni_info(sr_no serial PRIMARY KEY, Department varchar(30), alumni_total integer, real_time_data varchar(20), total_registered integer, mou varchar(15), lecture integer, visit integer, placement integer);";

  $res=pg_query($db, $sqls);
  if (!$res) 
  {
    echo pg_last_error($db);
  } 
  else
  {
    echo "Tables created successfully";
  }
}

pg_close($db);
?>