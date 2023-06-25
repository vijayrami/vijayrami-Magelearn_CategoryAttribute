<?php
namespace Magelearn\CategoryAttribute\Model\Category\Attribute\Source;

class Menu extends \Magento\Eav\Model\Entity\Attribute\Source\AbstractSource
{
    /**
     * {@inheritdoc}
     */
    public function getAllOptions()
    {
        if ($this->_options === null) {
            $this->_options = [
                                ['label' => __('Label 1 only'), 'value' => 'Value 1 only'],
                                ['label' => __('Label 2 only'), 'value' => 'Value 2 only']
                              ];

        }
        return $this->_options;
    }
}