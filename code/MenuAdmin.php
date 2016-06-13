<?php

/**
 * Class MenuAdmin
 */
class MenuAdmin extends ModelAdmin
{
    /**
     * @var array
     */
    private static $managed_models = array(
        'MenuSet'
    );

    /**
     * @var string
     */
    private static $url_segment = 'menu';

    /**
     * @var string
     */
    private static $menu_title = 'Menu Management';

    /**
     * @var array
     */
    private static $model_importers = array();


    public function getEditForm($id = null, $fields = null){
        $form = parent::getEditForm($id, $fields);

        $gridField = $form->Fields()->fieldByName($this->sanitiseClassName($this->modelClass));
        if(class_exists('Subsite')){
            $list = $gridField->getList()->filter(array('SubsiteID'=>Subsite::currentSubsiteID()));
            $gridField->setList($list);
        }

        return $form;
    }

}
