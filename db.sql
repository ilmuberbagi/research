create table publication_type(
	type_id int(2) primary key auto_increment,
	type_name varchar(100) not null
);
 
PUBLICATION_AUTHOR
	pub_author_id (int 11, ai, pk)
	pub_id (int 11, FK)
	author_id (int 11, FK)
	
EXTERNAL_AUTHOR
	pub_id (int 11, FK)
	first_name (text)
	sure_name(text)
	institution(text)
	country(text)

create table publication_author(
	pub_author_id int primary key auto_increment,
	pub_id varchar(30) not null,
	author_id varchar(30) not null,
	foreign key (pub_id) references publication(pub_id) ON DELETE CASCADE,
	foreign key (author_id) references users(user_id) ON DELETE CASCADE 
);