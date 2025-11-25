<?php
/**
 * Copyright © Custom. All rights reserved.
 */

namespace Custom\DisableTfa\Plugin;

use Magento\TwoFactorAuth\Api\TfaSessionInterface;

class BypassTfaSessionPlugin
{
    /**
     * Make isGranted always return true
     *
     * @param TfaSessionInterface $subject
     * @param callable $proceed
     * @return bool
     */
    public function aroundIsGranted(TfaSessionInterface $subject, callable $proceed)
    {
        return true;
    }
}
