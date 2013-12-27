CREATE TABLE Newsletters (
news_id int unsigned auto_increment primary key,
active varchar(3),
title varchar(100),
date_posted varchar(10),
news_text text,
html varchar(3)
);


CREATE TABLE NlCustomers (
cust_id int unsigned,
cust_email varchar(30),
sub_status varchar(3)
);
