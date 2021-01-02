<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Magento\Setup\Controller;

use Magento\Framework\App\SetupInfo;
use Magento\Framework\Config\ConfigOptionsListConstants;
use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;

/**
 * WebConfiguration controller
 */
class WebConfiguration extends AbstractActionController
{
    /**
     * Displays web configuration form
     *
     * @return array|ViewModel
     */
    public function indexAction()
    {
        // phpcs:ignore Magento2.Security.Superglobal
        $setupInfo = new SetupInfo($_SERVER);
        $view = new ViewModel(
            [
                'autoBaseUrl'   => $setupInfo->getProjectUrl(),
                'autoAdminPath' => $setupInfo->getProjectAdminPath(),
                'sessionSave'   => [
                        ConfigOptionsListConstants::SESSION_SAVE_FILES,
                        ConfigOptionsListConstants::SESSION_SAVE_DB,
                    ],
            ]
        );
        $view->setTerminal(true);
        return $view;
    }
}
