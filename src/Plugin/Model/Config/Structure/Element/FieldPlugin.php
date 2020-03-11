<?php

namespace tr33m4n\SystemPathHints\Plugin\Model\Config\Structure\Element;

use Magento\Config\Model\Config\Structure\Element\Field;
use Magento\Framework\App\Config\ScopeConfigInterface;

/**
 * Class FieldPlugin
 *
 * @package tr33m4n\SystemPathHints\Plugin\Model\Config\Structure\Element
 */
class FieldPlugin
{
    /**
     * System path hints path
     */
    const XML_ENABLE_PATH_HINTS_PATH = 'dev/debug/system_path_hints';

    /**
     * @var \Magento\Framework\App\Config\ScopeConfigInterface
     */
    private $scopeConfig;

    /**
     * FieldPlugin constructor.
     *
     * @param \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
     */
    public function __construct(
        ScopeConfigInterface $scopeConfig
    ) {
        $this->scopeConfig = $scopeConfig;
    }

    /**
     * Add path to the field comment
     *
     * @param \Magento\Config\Model\Config\Structure\Element\Field $subject
     * @param string                                               $result
     * @return string
     */
    public function afterGetComment(Field $subject, string $result) : string
    {
        if (!$this->scopeConfig->isSetFlag(self::XML_ENABLE_PATH_HINTS_PATH)) {
            return $result;
        }

        return $result .= __(
            '%1<strong>Path:</strong> <a href="#" data-tooltip-text="Click to copy" data-path-hint>%2</a>',
            strlen($result) ? '<br>' : '',
            $subject->getConfigPath() ?: $subject->getPath()
        );
    }
}
