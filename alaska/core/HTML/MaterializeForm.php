<?php


namespace Core\HTML;


class MaterializeForm extends Form{

    /**
     * @param $html string Code HTML à entourer
     * @return string
     */
    protected function surround($html){
        return "<div class=\"\">{$html}</div>";
    }

    /**
     * @param $name string
     * @param $label
     * @param array $options
     * @return string
     */
    public function input($name, $label, $options = []){
        $type = isset($options['type']) ? $options['type'] : 'text';
        $label = '<label>' . $label . '</label>';
        if($type === 'textarea'){
            $input = '<textarea  name="'.$name.'"class="form-control">' . $this->getValue($name).'</textarea>';

        }else if($type === 'hidden'){
            $input = '<input type="hidden" name="'.$name.'" value="' . $this->getValue($name).'">';

        }else if($type === 'mail'){
            $input = '<input required pattern ="(^[a-z0-9]+)@([a-z0-9])+(\.)([a-z]{2,4})" name="'.$name.'"class="form-control"' . $this->getValue($name).'/>';

        }else {
            $input = '<input required type="'.$type.'" name="' .$name.'" value="'.$this->getValue($name).'" class="form-control"/>';
        }
        return $this->surround($label . $input);
    }

    public function select($name, $label, $options){
        $label = '<label>' . $label . '</label>';
        $input = '<select class="browser-default" name="' . $name . '">';
        foreach($options as $k => $v){
            $attributes = '';
            if($k == $this->getValue($name)){
                $attributes = ' selected';
            }
            $input .= "<option value='$k'$attributes>$v</option>";
        }
        $input .= '</select></br>';
        return $this->surround($label . $input);
    }

    /**
     * @return string
     */
    public function submit(){
        return $this->surround('<button type="submit" class="btn btn-primary">Envoyer</button>');
    }
}