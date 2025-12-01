<?php
/**
 * Copyright © Cadi. All rights reserved.
 * See COPYING.txt for license details.
 */

use Magento\Framework\Component\ComponentRegistrar;

ComponentRegistrar::register(
    ComponentRegistrar::THEME,
    "frontend/Cadi/custom",
    __DIR__
);
