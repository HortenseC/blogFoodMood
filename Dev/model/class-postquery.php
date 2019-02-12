<?php

class PostQuery{


	public function __construct(){

	}
	public static function search_all_posts($bdd){
		$reponse = $bdd->prepare('SELECT p.id, p.title, p.content,p.id_cat, p.id_author, p.created_date, p.updated_date, p.image, a.firstname, a.lastname, c.name from posts as p inner join authors as a on p.id_author = a.id inner join categories as c on p.id_cat = c.id  order by p.id ASC');
    	$reponse->execute(); 
   	 	$list_post = array();   
   	 	while ($post = $reponse->fetch()) {
        $list_post[] = $post;
    	}
    	$reponse->closeCursor();
    	return $list_post;
	}

	public static function search_post($bdd, $id)
	{
	    $reponse = $bdd->prepare('SELECT p.id, p.title, p.content,p.id_cat, p.id_author, p.created_date, p.image, a.firstname, a.lastname, c.name from posts as p inner join authors as a on p.id_author = a.id inner join categories as c on p.id_cat = c.id where p.id=?');
	    $reponse->execute(array($id)); 
	    $single_post = $reponse->fetch();  
	    $reponse->closeCursor();
	    return $single_post;
	}

	public static function create_post ($bdd, $title, $content, $category, $author, $file){

		$new_name=md5(basename($file['name']. time()));
		$fin=explode('.', $file['name']);
		$extension=end($fin);
		$image_folder = 'img/uploaded_file/'.$new_name.'.'.$extension;
		move_uploaded_file($file['tmp_name'], $image_folder);
		$reponse= $bdd->prepare("INSERT INTO posts(title, content, id_cat, id_author, created_date, updated_date, image) values(?,?,?,?,?,?,?)");
		$reponse->execute(array(utf8_decode($title), utf8_decode($content), $category, $author, date("Y-m-d H:i:s"), date("Y-m-d H:i:s"), $image_folder));
		$reponse->closeCursor();
	}

	public static function update_post ($bdd,  $id, $title, $content, $category, $file){
		$new_name=md5(basename($file['name']. time()));
		$fin=explode('.', $file['name']);
		$extension=end($fin);
		$image_folder = 'img/uploaded_file/'.$new_name.'.'.$extension;
		move_uploaded_file($file['tmp_name'], $image_folder);
		$reponse= $bdd->prepare("UPDATE posts SET title =?, content =?, id_cat =?, created_date =?, updated_date =?, image =? where id=?");
		$reponse->execute(array(utf8_decode($title), utf8_decode($content), $category, date("Y-m-d H:i:s"), date("Y-m-d H:i:s"), $image_folder, $id));
	}
	public static function delete_post($bdd, $id)
	{

		$single_post = PostQuery::search_post($bdd, $id);
		unlink($single_post['image']);
	    $reponse = $bdd->prepare('DELETE FROM posts where id=?');
	    $reponse->execute(array($id));

	}

	public static function delete_image($bdd, $id){
		$single_post = PostQuery::search_post($bdd, $id);
		unlink($single_post['image']);

	}

	public static function sort_by_categories($bdd, $id){
		$reponse=$bdd->prepare('SELECT p.id, p.title, p.content, p.id_author, p.created_date, p.updated_date, p.image, a.firstname, a.lastname, c.name from posts as p inner join authors as a on p.id_author = a.id inner join categories as c on p.id_cat = c.id where p.id_cat=? order by p.id ASC');
		$reponse->execute(array($id)); 
	    $list_post = array();   
	    while ($post = $reponse->fetch()) {
	    $list_post[] = $post;
	    }
	    $reponse->closeCursor();
	    return $list_post;
	}

	public static function count_posts_per_cat($bdd){
		$reponse=$bdd->prepare('SELECT c.id, c.name, count(*) FROM `posts` AS p INNER JOIN categories AS c ON p.id_cat=c.id GROUP BY id_cat');
		$reponse->execute(); 
		
	    return $reponse;
	}

	public static function sort_by_authors($bdd, $id){
		$reponse=$bdd->prepare('SELECT p.id, p.title, p.content, p.id_author, p.created_date, p.updated_date, p.image, a.firstname, a.lastname, c.name from posts as p inner join authors as a on p.id_author = a.id inner join categories as c on p.id_cat = c.id where p.id_author=? order by p.id ASC');
		$reponse->execute(array($id)); 
	    $list_post = array();   
	    while ($post = $reponse->fetch()) {
	    $list_post[] = $post;
	    }
	    $reponse->closeCursor();
	    return $list_post;
	}

	public static function count_posts_per_authors($bdd, $id){
		$reponse=$bdd->prepare('SELECT a.id, a.firstname, a.lastname, count(*) FROM `posts` AS p INNER JOIN authors AS a ON p.id_author=a.id WHERE a.id=? GROUP BY id_author');
		$reponse->execute(array($id)); 
		$post = $reponse->fetch();
		$reponse->closeCursor();
	    return $post;
	}
}

?>