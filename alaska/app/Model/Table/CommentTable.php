<?php 

namespace App\Model\Table;

use App\Model\Table;

class CommentTable extends Table{

	protected $table = 'comment';


	/**
	 *Recupere les derniers comment
	 * @return array
	 */
	public function last(){
		return $this->query('
			SELECT comment.id, comment.pseudo, comment.mail, comment.contenu, comment.date
			FROM comment
			ORDER BY comment.date ASC
		');
	}


	/**
	 *Recupere les derniers comment de l'articles
	 *@param $category_id int
	 * @return array
	 */
	public function lastByCategory($id_articles){
		return $this->query('
			SELECT comment.id, comment.pseudo, comment.mail, comment.contenu, comment.date, articles.titre as articles
			FROM comment
			LEFT JOIN articles on id_articles = articles.id 
			WHERE comment.id_articles = ?
			ORDER BY comment.date DESC
		', [$id_articles]);
	}



	/**
	 *Recupere un article en liant l'article associer
	 *@param $id int
	 * @return \App\Entity\PostEntity
	 */
	public function findWithCategory($id){
		return $this->query('
			SELECT comment.id, comment.pseudo, comment.mail, comment.contenu, comment.date articles.id as articles
			FROM comment
			WHERE id_articles = ?
		', [$id], true);
	}
}

