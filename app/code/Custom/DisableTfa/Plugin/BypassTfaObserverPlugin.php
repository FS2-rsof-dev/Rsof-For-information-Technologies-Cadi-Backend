<?php
/**
 * Copyright © Custom. All rights reserved.
 */

namespace Custom\DisableTfa\Plugin;

use Magento\TwoFactorAuth\Observer\AdminLogin;

class BypassTfaObserverPlugin
{
    /**
     * Bypass the observer that redirects to 2FA page
     *
     * @param AdminLogin $subject
     * @param callable $proceed
     * @param \Magento\Framework\Event\Observer $observer
     * @return void
     */
    public function aroundExecute(AdminLogin $subject, callable $proceed, \Magento\Framework\Event\Observer $observer)
    {
        // Do nothing - bypass the 2FA redirect
        return;
    }
}
