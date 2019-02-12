<?php

function search_author_login($bdd, $email, $password){
	$reponse = $bdd->prepare('SELECT * from authors where (email=? and password=?)');
	$reponse->execute(array($email, MD5($password)));
	$user = $reponse->fetch(); 
	$reponse->closeCursor();
	return $user;
}

function search_author($bdd, $id){
	$reponse = $bdd->prepare('SELECT * from authors where (id=?)');
	$reponse->execute(array($id));
	$author = $reponse->fetch(); 
	$reponse->closeCursor();
	return $author;
}



function search_all_authors($bdd){
	$reponse= $bdd->prepare('SELECT * from authors');
	$reponse->execute();
	$list_authors=array();
	while ($author = $reponse->fetch()){
		$list_authors[] =$author;
	}
	$reponse->closeCursor();
	return $list_authors;

}


function delete_avatar($bdd, $id){
	$author = search_author($bdd, $id);
	unlink($author['avatar']);

}

function create_author ($bdd, $firstname, $lastname, $email, $password, $level, $file){
	$new_name=md5(basename($file['name']. time()));
	$fin=explode('.', $file['name']);
	$extension=end($fin);
	$image_folder = 'img/uploaded_file/avatar/'.$new_name.'.'.$extension;
	move_uploaded_file($file['tmp_name'], $image_folder);
	$reponse= $bdd->prepare("INSERT INTO authors(firstname, lastname, email, password, level, avatar) values(?,?,?,?,?,?)");
	$reponse->execute(array(utf8_decode($firstname), utf8_decode($lastname), $email, MD5($password), $level, $image_folder ));
	$reponse->closeCursor();
	
}
function update_author ($bdd, $id, $firstname, $lastname, $email, $password, $level, $file){
	$new_name=md5(basename($file['name']. time()));
	$fin=explode('.', $file['name']);
	$extension=end($fin);
	$image_folder = 'img/uploaded_file/avatar/'.$new_name.'.'.$extension;
	move_uploaded_file($file['tmp_name'], $image_folder);
	$reponse= $bdd->prepare("UPDATE authors SET firstname =?, lastname =?, email =?, password =?, level =?, avatar =? where id=?");
	$reponse->execute(array(utf8_decode($firstname), utf8_decode($lastname), $email, MD5($password), $level, $image_folder, $id));
	$reponse->closeCursor();
	
}
function delete_author($bdd, $id)
{

	$author = search_author($bdd, $id);
	unlink($author['avatar']);
    $reponse = $bdd->prepare('DELETE FROM authors where id=?');
    $reponse->execute(array($id));
    $reponse->closeCursor();
}
function search_email($bdd, $email){
	$reponse = $bdd->prepare('SELECT email from authors where (email=?)');
	$reponse->execute(array($email));
	$mail = $reponse->fetch(); 
	$reponse->closeCursor();
	return $mail;
}

function search_all_categories($bdd){
	$reponse= $bdd->prepare('SELECT * from categories');
	$reponse->execute();
	$list_category=array();
	while ($category = $reponse->fetch()){
		$list_category[] =$category;
	}
	$reponse->closeCursor();
	return $list_category;
}

function create_category ($bdd, $name){
	$reponse= $bdd->prepare("INSERT INTO categories(name) values(?)");
	$reponse->execute(array(utf8_decode($name)));
	$reponse->closeCursor();
	
}

function search_category($bdd, $id){
	$reponse = $bdd->prepare('SELECT * from categories where (id=?)');
	$reponse->execute(array($id));
	$cat = $reponse->fetch();
	$reponse->closeCursor(); 
	return $cat;
}

function update_category ($bdd, $id, $name){
	$reponse= $bdd->prepare("UPDATE categories SET name =? where id=?");
	$reponse->execute(array(utf8_decode($name), $id));
	$reponse->closeCursor();
	
}
function delete_category($bdd, $id){
	$category=search_all_categories($bdd, $id);
    $reponse = $bdd->prepare('DELETE FROM categories where id=?');
    $reponse->execute(array($id));
    $reponse->closeCursor();
}

function search_all_comments($bdd, $id){
	$reponse=$bdd->prepare('SELECT a.firstname, a.lastname, a.level, a.avatar, c.created_comment_date, c.id, c.id_post, c.comment_content, c.id_author FROM `comments` AS c INNER JOIN authors AS a ON c.id_author=a.id INNER JOIN posts AS p ON c.id_post=p.id WHERE p.id=? order by c.id ASC');
	$reponse->execute(array($id)); 
    $list_comments = array();   
    while ($comment = $reponse->fetch()) {
    $list_comments[] = $comment;
    }
    $reponse->closeCursor();
    return $list_comments;
}

function count_comments_per_post($bdd, $id){
	$reponse=$bdd->prepare('SELECT  count(*) FROM `comments` AS c INNER JOIN posts AS p ON c.id_post=p.id WHERE p.id=? ');
	$reponse->execute(array($id)); 
	$post = $reponse->fetch();
    return $post;
}

function create_comment($bdd, $comment_content, $id_post, $id_author){
	$reponse= $bdd->prepare("INSERT INTO comments( created_comment_date, comment_content, id_post, id_author) values(?,?,?,?)");
	$reponse->execute(array(date("Y-m-d H:i:s"), utf8_decode($comment_content), $id_post, $id_author));
	$reponse->closeCursor();
}
function delete_comment($bdd, $id){
	$category=search_all_comments($bdd, $id);
    $reponse = $bdd->prepare('DELETE FROM comments where id=?');
    $reponse->execute(array($id));
    $reponse->closeCursor();
}
?>