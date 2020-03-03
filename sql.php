<?php

create table users_level
(
	lvl_id int not null primary key auto_increment,
	lvl_name varchar(50) not null,
	lvl_slug varchar(50) not null,
	lvl_description text not null,
	lvl_created_at TIMESTAMP NOT NULL,
	lvl_created_by VARCHAR(50) NOT NULL,
	lvl_edited_at TIMESTAMP NOT NULL,
	lvl_edited_by VARCHAR(50) NOT NULL
)

create table users
(
	usr_id int not null primary key auto_increment,
	usr_lvl_id int not null,
	usr_fullname varchar(50) not null,
	usr_slug varchar(50) not null,
	usr_email varchar(50) not null,
	usr_password varchar(50) not null,
	usr_phone varchar(13) not null,
	usr_address text not null,
	usr_photo varchar(255) not null,
	usr_created_at TIMESTAMP NOT NULL,
	usr_created_by VARCHAR(50) NOT NULL,
	usr_edited_at TIMESTAMP NOT NULL,
	usr_edited_by VARCHAR(50) NOT NULL
);

create table iconbar
(
	icb_id int not null primary key auto_increment,
	icb_name varchar(100) not null,
	icb_slug varchar(100) not null,
	icb_image varchar(120) not null,
	icb_created_at TIMESTAMP NOT NULL,
	icb_created_by VARCHAR(50) NOT NULL,
	icb_edited_at TIMESTAMP NOT NULL,
	icb_edited_by VARCHAR(50) NOT NULL
);

create table menubar
(
	mnb_id int not null primary key auto_increment,
	mnb_name varchar(100) not null,
	mnb_slug varchar(100) not null,
	mnb_image varchar(120) not null,
	mnb_created_at TIMESTAMP NOT NULL,
	mnb_created_by VARCHAR(50) NOT NULL,
	mnb_edited_at TIMESTAMP NOT NULL,
	mnb_edited_by VARCHAR(50) NOT NULL
);

create table blogs_category
(
	cat_id int not null primary key auto_increment,
	cat_name varchar(100) not null,
	cat_slug varchar(100) not null,
	cat_color varchar(100) not null,
	cat_description text not null,
	cat_image varchar(255) not null,
	cat_created_at TIMESTAMP NOT NULL,
	cat_created_by VARCHAR(50) NOT NULL,
	cat_edited_at TIMESTAMP NOT NULL,
	cat_edited_by VARCHAR(50) NOT NULL
);

create table blogs
(
	blg_id int not null primary key auto_increment,
	blg_title varchar(255) not null,
	blg_slug varchar(255) not null,
	blg_cat_id int not null,
	blg_view_id int not null,
	blg_image varchar(255) not null,
	blg_video varchar(255) not null,
	blg_text_content text not null,
	blg_tags varchar(255) not null,
	blg_status int not null,
	blg_created_at TIMESTAMP NOT NULL,
	blg_created_by VARCHAR(50) NOT NULL,
	blg_edited_at TIMESTAMP NOT NULL,
	blg_edited_by VARCHAR(50) NOT NULL
);

create table sosmed
(
	smd_id int not null primary key auto_increment,
	smd_name varchar(100) not null,
	smd_slug varchar(100) not null,
	smd_link varchar(255) not null,
	smd_image varchar(120) not null,
	smd_created_at TIMESTAMP NOT NULL,
	smd_created_by VARCHAR(50) NOT NULL,
	smd_edited_at TIMESTAMP NOT NULL,
	smd_edited_by VARCHAR(50) NOT NULL
);

create table pages
(
	pgs_id int not null primary key auto_increment,
	pgs_name varchar(255) not null,
	pgs_slug varchar(255) not null,
	pgs_image varchar(255) not null,
	pgs_maps_link varchar(255) not null,
	pgs_text_content text not null,
	pgs_tags varchar(255) not null,
	pgs_created_at TIMESTAMP NOT NULL,
	pgs_created_by VARCHAR(50) NOT NULL,
	pgs_edited_at TIMESTAMP NOT NULL,
	pgs_edited_by VARCHAR(50) NOT NULL
);

create table ads
(
	ads_id int not null primary key auto_increment,
	ads_name varchar(100) not null,
	ads_slug varchar(100) not null,
	ads_position varchar(100) not null,
	ads_link varchar(255) not null,
	ads_image varchar(120) not null,
	ads_created_at TIMESTAMP NOT NULL,
	ads_created_by VARCHAR(50) NOT NULL,
	ads_edited_at TIMESTAMP NOT NULL,
	ads_edited_by VARCHAR(50) NOT NULL
);