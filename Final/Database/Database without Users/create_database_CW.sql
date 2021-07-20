create database CW_database;

use CW_database;

create table theory (theory_id int not null auto_increment,
					 theory_name varchar(60) not null, #theory name
					 theory_statement TEXT not null, 
                     theory_explanation TEXT ,
                     theory_date date,
                     showcaseImage varchar(60),#image shown on the list
                     theory_image varchar(60), #image shown on the theory page
					 Constraint TheoryPK primary key (theory_id));

create table categories (category_id int not null auto_increment,
					 category_name varchar(60) not null, #category name
                     category_image varchar(60), #category image
					 Constraint CategoryPK primary key (category_id));
                     
create table theory__categories (
                     theory_id int, category_id int,
					 Constraint TheoriesFK foreign key (theory_id) references theory(theory_id),
					 Constraint CategoryFK foreign key (category_id) references categories(category_id));
         
create table user_account (user_id int not null auto_increment,
					 username varchar(60) not null, #username
                     email varchar(60) not null, # email
					 user_password TEXT, #user password
					 Constraint UserPK primary key (user_id));

create table quizAnswers (quiz_id int not null auto_increment,
					 quiz_answwer boolean,
					 quiz_date date, 
					 Constraint QuizPK primary key (quiz_id),
                     user_id int, theory_id int,
                     Constraint UserFK foreign key (user_id) references user_account(user_id),
                     Constraint TheoryFK foreign key (theory_id) references theory(theory_id));

create table comments (comment_id int not null auto_increment,
					 commenText TEXT not null, #comment made by the user
					 comment_date date, #date and time of when the comment was made
					 Constraint commentPK primary key (comment_id),
                     user_id int, theory_id int,
                     Constraint UserFK_ foreign key (user_id) references user_account(user_id),
                     Constraint TheoryFK_ foreign key (theory_id) references theory(theory_id));

create table theory__user (favorite_theory boolean,
					theory_id int, user_id int,
					Constraint Theory_FK foreign key (theory_id) references theory(theory_id),
					Constraint User_FK foreign key (user_id) references user_account(user_id));






