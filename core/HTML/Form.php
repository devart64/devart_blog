<?php
/**
 * Created by PhpStorm.
 * User: monark
 * Date: 09/07/2017
 * Time: 07:02
 */

namespace Core\HTML;

/**
 * Class Form
 * Permet de générer un formulaire rapidement et simplement
 * @package Core\HTML
 */
class Form
{
    /**
     * @var array Données utilisée par le formulaire
     */
    private $data;
    /**
     * @var string Tag utilisé pour entourer les champs
     */
    public $surround = 'p';

    /**
     * Form constructor.
     * @param array $data Données utilisée par le formulaire
     */
    public function __construct($data = [])
    {
        $this->data = $data;
    }

    /**
     * @param $html string Code HTML à entourer
     * @return string
     */
    protected function surround($html)
    {
        return "<{$this->surround}>{$html}</{$this->surround}>";
    }

    /**
     * @param $index string Index de la valeur à récupérer
     * @return string
     */
    protected function getValue($index)
    {
        if (is_object($this->data))
        {
            return $this->data->$index;
        }
        return isset($this->data[$index]) ? $this->data['index'] : null;
    }

    /**
     * @param $name string
     * @param $label
     * @param array $options
     * @return string
     */
    protected  function input($name,$options = [])
    {
        $type = isset($options['type']) ? $options['type'] : 'text';
        return $this->surround('<input type="' . $type . '" name="' . $name . '" value= "' . $this->getValue($name) . '">'
        );
    }

    /**
     * @return string
     */
    protected function submit()
    {
        return $this->surround('<button type="submit">Envoyer</button>');
    }
}
