<?php

/**
 * Helper class for wizard handling
 */

namespace HDNET\Focuspoint\Service;

use TYPO3\CMS\Backend\Utility\IconUtility;
use TYPO3\CMS\Core\Imaging\Icon;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Utility\LocalizationUtility;

/**
 * WizardService
 */
class WizardService extends AbstractService
{
    /**
     * Get the wizard button with the given URI
     *
     * @param string|null $uri
     * @return string
     */
    public function getWizardButton($uri = null)
    {
        $spriteIcon = $this->getWizardIcon();
        $label = LocalizationUtility::translate('focuspoint.wizard', 'focuspoint');
        if ($uri === null) {
            $label .= ' ' . LocalizationUtility::translate('focuspoint.wizard.imagesonly', 'focuspoint');
            return '<span class="btn btn-default disabled" title="' . $label . '">' . $spriteIcon . '</span>';
        }
        return '<a href="' . $uri . '" class="btn btn-default" title="' . $label . '">' . $spriteIcon . '</a>';
    }

    /**
     * Get the wizard icon
     *
     * @return string
     */
    protected function getWizardIcon()
    {
        if (GeneralUtility::compat_version('7.5')) {
            /** @var \TYPO3\CMS\Core\Imaging\IconFactory $iconFactory */
            $iconFactory = GeneralUtility::makeInstance('TYPO3\\CMS\\Core\\Imaging\\IconFactory');
            $icon = $iconFactory->getIcon('extensions-focuspoint-focuspoint', Icon::SIZE_SMALL, null);
            return $icon->render();
        }
        return IconUtility::getSpriteIcon('extensions-focuspoint-focuspoint');
    }
}