<?php 

namespace App\Model\Table;

use App\Model\Table;

class PostTable extends Table{

	protected $table = 'articles';


	/**
	 *Recupere les derniers articles
	 * @return array
	 */
	public function last(){
		return $this->query('
			SELECT articles.id, articles.titre, articles.contenu, articles.date, categories.titre as categorie
			FROM articles
			LEFT JOIN categories on category_id = categories.id 
			ORDER BY articles.date ASC
		');
	}

	/**
	 *Recupere les derniers articles de la categorie
	 *@param $category_id int
	 * @return array
	 */
	public function lastByCategory($category_id){
		return $this->query('
			SELECT articles.id, articles.titre, articles.contenu, articles.date, categories.titre as categorie
			FROM articles
			LEFT JOIN categories on category_id = categories.id 
			WHERE articles.category_id = ?
			ORDER BY articles.date DESC
		', [$category_id]);
	}

	public function lastNews(){
		return $this->query('
			SELECT articles.id, articles.titre, articles.contenu, articles.date, categories.titre as categorie
			FROM articles
			LEFT JOIN categories on category_id = categories.id 
			ORDER BY articles.date DESC
			LIMIT 1
		');
	}



	/**
	 *Recupere un article en liant la categorie associer
	 *@param $id int
	 * @return \App\Entity\PostEntity
	 */
	public function findWithCategory($id){
		return $this->query('
			SELECT articles.id, articles.titre, articles.contenu, articles.date, categories.titre as categorie
			FROM articles
			LEFT JOIN categories on category_id = categories.id 
			WHERE articles.id = ?
		', [$id], true);
	}
}