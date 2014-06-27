<?php

class BHorizontalMenu extends CWidget
{
    /**
     * @var array
     * examle:
     * 'items':[{
     *          label:label,
     *          url:url|array(route,params)
     *          active:route_regexp||boolean
     *   },..]
     */
    public $items;
    public $class = 'nav';
    public $style = "";

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        $current_route = '/' . $this->controller->module->id . '/' . $this->controller->id . '/' . $this->controller->action->id;
//		CVarDumper::dump($this->items,10,true); exit;
        echo '<ul class="', $this->class, '" style="', $this->style, '">';
        foreach ($this->items as $item)
		{
            echo
            '<li', (($item['alias'] == $this->controller->modelAlias) ? ' class="active"' : ''), '>',
            CHtml::link($item['label'], $item['url']),
            '</li>';
        }
        echo '</ul>';
    }

}
