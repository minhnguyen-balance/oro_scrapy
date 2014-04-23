<?php
/**
 * User: minhnvt1
 * Date: 4/23/14 - 10:22 AM
 */

namespace Balancenet\Bundle\ScrapyBundle\Provider;

use Balancenet\Bundle\ScrapyBundle\Model\ScrapedObjAttr as ScrapedObjAttr;

class MonitorProvider
{
    /**
     * @var array
     */
    protected $attributes = array(
        ScrapedObjAttr::STANDARD   => 'STANDARD',
        ScrapedObjAttr::STANDARD_UPDATE => 'STANDARD (UPDATE)',
        ScrapedObjAttr::BASE => 'BASE',
        ScrapedObjAttr::DETAIL_PAGE_URL => 'DETAIL PAGE URL',
        ScrapedObjAttr::IMAGE => 'IMAGE'
    );

    public function getAttributes()
    {
        return $this->attributes;
    }
} 