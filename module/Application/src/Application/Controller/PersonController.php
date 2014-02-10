<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\View\Model\JsonModel;

use Application\Models\Person;

class PersonController extends AbstractActionController{

    public function personAction(){
        $get    = $this->getRequest()->getQuery();
        $intent = $this->params()->fromRoute( 'intent', "json" );

        if( $intent !== "json" && $intent !== "view" ){
            $intent = "view";
        }

        $name   = $this->params()->fromQuery( 'name', 'A Person');
        $height = $this->params()->fromQuery( 'height', "of average height" );

        $person = new Person();
        $person ->setName( $name )
                ->setHeight( $height );

        if( $intent == "json" ){
            $returnValues = [
                "name" => $person->getName(),
                "height" => $person->getHeight(),
                "isSexy" => $person->isSexy()
            ];

            $return = new JsonModel( $returnValues );
        }
        else{

            $return = new ViewModel( [ 'person' => $person ] );
            $return->setTemplate( "person/person" );
        }

        return $return;
    }
}
