<?php

/**
 * Hackathon
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magento to newer
 * versions in the future. If you wish to customize Magento for your
 * needs please refer to http://www.magentocommerce.com for more information.
 *
 * @category    Hackathon
 * @package     Hackathon_Socialcommerce
 * @copyright   Copyright (c) 2012 Hackathon
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/**
 * Social Commerce Data Helper
 *
 * @category Hackathon
 * @package Hackathon_Socialcommerce
 * @author Sylvain Rayé <sylvain.raye@gmail.com>
 */
class Hackathon_Socialcommerce_Model_Shorturl_Factory
{
    /**
     *
     * @param string|null $service
     * @param array  $configuration
     *
     * @return Hackathon_Socialcommerce_Model_Shorturl_Service
     */
    public function create($service = null, $configuration = array())
    {
        if (is_null($service)) {
            $service = Mage::getStoreConfig('socialcommerce/urlshortener/service');
        }

        $configuration = array_merge($configuration, Mage::getStoreConfig('socialcommerce/urlshortenerservice_' . $service));

        $shortUrlService = Mage::getModel('socialcommerce/shorturl_service_' . $service);
        if ($shortUrlService) {
            $shortUrlService->setConfiguration($configuration);
        }
        return $shortUrlService;
    }
}
