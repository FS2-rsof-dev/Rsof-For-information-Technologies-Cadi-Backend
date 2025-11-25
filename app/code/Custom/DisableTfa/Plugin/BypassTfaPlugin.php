<?php
/**
 * Copyright © Custom. All rights reserved.
 */

namespace Custom\DisableTfa\Plugin;

use Magento\TwoFactorAuth\Api\TfaInterface;

class BypassTfaPlugin
{
    /**
     * Make isConfigurationRequiredFor return false
     *
     * @param TfaInterface $subject
     * @param callable $proceed
     * @param int $userId
     * @return bool
     */
    public function aroundIsConfigurationRequiredFor(TfaInterface $subject, callable $proceed, int $userId)
    {
        return false;
    }
}
