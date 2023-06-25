<?php
namespace Magelearn\CategoryAttribute\Model\Category\Attribute\Source;

class Filter extends \Magento\Eav\Model\Entity\Attribute\Source\AbstractSource
{
    /**
     * {@inheritdoc}
     */
    public function getAllOptions()
    {
        if ($this->_options === null) {
            $this->_options = [
                                ['label' => __('Label 1'), 'value' => 'Value 1'],
                                ['label' => __('Label 2'), 'value' => 'Value 2'],
                                ['label' => __('Label 3'), 'value' => 'Value 3'],
                                ['label' => __('Label 4'), 'value' => 'Value 4'],
                                ['label' => __('Label 5'), 'value' => 'Value 5'],
                              ];

        }
        return $this->_options;
    }
}