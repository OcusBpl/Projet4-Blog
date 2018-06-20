<?php 

namespace App\Model\Table;

use App\Model\Table;

class DraftTable extends Table{

	protected $table = 'draft';


	/**
	 *Recupere les derniers brouillons
	 * @return array
	 */
	public function last(){
		return $this->query('
			SELECT draft.id, draft.titre, draft.contenu, draft.date, categories.titre as categorie
			FROM draft
			LEFT JOIN categories on category_id = categories.id 
			ORDER BY draft.date ASC
		');
	}

	/**
	 *Recupere les derniers articles de la categorie
	 *@param $category_id int
	 * @return array
	 */
	public function lastByCategory($category_id){
		return $this->query('
			SELECT draft.id, draft.titre, draft.contenu, draft.date, categories.titre as categorie
			FROM draft
			LEFT JOIN categories on category_id = categories.id 
			WHERE draft.category_id = ?
			ORDER BY draft.date DESC
		', [$category_id]);
	}



	/**
	 *Recupere un article en liant la categorie associer
	 *@param $id int
	 * @return \App\Entity\PostEntity
	 */
	public function findWithCategory($id){
		return $this->query('
			SELECT draft.id, draft.titre, draft.contenu, draft.date, categories.titre as categorie
			FROM draft
			LEFT JOIN categories on category_id = categories.id 
			WHERE draft.id = ?
		', [$id], true);
	}
}