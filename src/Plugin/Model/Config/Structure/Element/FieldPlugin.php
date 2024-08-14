<?php

declare(strict_types=1);

namespace tr33m4n\SystemPathHints\Plugin\Model\Config\Structure\Element;

use Magento\Config\Model\Config\Structure\Element\Field;
use Magento\Framework\App\Config\ScopeConfigInterface;

class FieldPlugin
{
    private const XML_ENABLE_PATH_HINTS_PATH = 'dev/debug/system_path_hints';

    /**
     * FieldPlugin constructor.
     */
    public function __construct(
        private readonly ScopeConfigInterface $scopeConfig
    ) {
    }

    /**
     * Add path to the field comment
     */
    public function afterGetComment(Field $subject, string $result): string
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
