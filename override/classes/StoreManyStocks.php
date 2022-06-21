<?php
/**
 * Classe d'exemple pour le webservice
 */
class Sample extends ObjectModel
{
    /** @var string Référence du document */
    public $reference;

    /** @var string nom */
    public $name;

    /** @var string description */
    public $description;

    /**
     * Définition des paramètres de la classe
     */
    public static $definition = [
        'table' => 'sample',
        'primary' => 'id_sample',
        'multilang' => true,
        'multilang_shop' => false,
        'fields' => [
            'reference' => [
                'type' => self::TYPE_STRING,
                'validate' => 'isCleanHtml',
                'size' => 255,
            ],
            'name' => [
                'type' => self::TYPE_STRING,
                'validate' => 'isCleanHtml',
                'size' => 255,
                'lang' => true,
            ],
            'description' => [
                'type' => self::TYPE_STRING,
                'validate' => 'isCleanHtml',
                'lang' => true,
            ],
        ],
    ];

    /**
     * Mapping de la classe avec le webservice
     *
     * @var type
     */
    protected $webserviceParameters = [
        'objectsNodeName' => 'send_stocks', //objectsNodeName doit être la valeur déclarée dans le hookAddWebserviceResources ( liste des entités )
        'objectNodeName' => 'send_stock', // Détail d'une entité
        'fields' => [],
    ];
}
