<?php 

namespace App\Model\Entity;

use App\Model\Entity;

class CommentEntity extends Entity{
	
	public function getUrl(){
		return 'index.php?p=posts.show&id=' . $this->id;
	}
}