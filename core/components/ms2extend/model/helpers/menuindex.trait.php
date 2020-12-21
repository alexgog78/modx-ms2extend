<?php

/**
 * TODO
 * issue after deleting not last
 */
trait ms2ExtendModelHelperMenuindex
{
    private function setMenuindex()
    {
        if ($this->_new) {
            $field = $this->getMenuindexField();
            $menuIndex = $this->xpdo->getCount(get_class($this), $this->getMenuindexConditions());
            $this->set($field, $menuIndex);
        }
    }

    /**
     * @return string
     */
    private function getMenuindexField()
    {
        return $this->menuindexField ?? 'menuindex';
    }

    /**
     * @return array
     */
    protected function getMenuindexConditions()
    {
        return [];
    }
}
