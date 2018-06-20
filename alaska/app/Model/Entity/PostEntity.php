<?php 

namespace App\Model\Entity;

use App\Model\Entity;

class PostEntity extends Entity{
	
	public function getUrl(){
		return 'index.php?p=posts.show&id=' . $this->id;
	}

	public function getExtrait(){ //affiche le debut du billets
		$html = '<p>' . substr($this->contenu, 0, 300) . '...</p>';
		$html .= '<p><a href="'. $this->getUrl() . '">Voir la suite</a></p>';
		return $html;
	}
}