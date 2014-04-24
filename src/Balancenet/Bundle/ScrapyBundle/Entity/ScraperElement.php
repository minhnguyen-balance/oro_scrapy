<?php
/**
 * User: minhnvt1
 * Date: 4/23/14 - 2:27 PM
 */

namespace Balancenet\Bundle\ScrapyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class ScraperElement
 * @ORM\Table(name="scrapy_scraperelement")
 * @ORM\Entity(repositoryClass="Balancenet\Bundle\ScrapyBundle\Entity\Repository\ScraperElementRepository")
 */
class ScraperElement
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var ScrapedObjAttrId
     *
     * @ORM\Column(name="scraped_obj_attr_id", type="integer")
     */
    private $scrapedObjAttrId;

    /**
     * @var ScrapedObjAttr
     *
     * @ORM\ManyToOne(targetEntity="ScrapedObjAttr", inversedBy="scraperElements")
     * @ORM\JoinColumn(name="scraped_obj_attr_id", referencedColumnName="id")
     */
    private $scrapedObjAttr;

    /**
     * @var ScraperId
     *
     * @ORM\Column(name="scraper_id", type="integer")
     */
    private $scraperId;

    /**
     * @var Scraper
     *
     * @ORM\ManyToOne(targetEntity="Scraper", inversedBy="scraperElements")
     * @ORM\JoinColumn(name="scraper_id", referencedColumnName="id")
     */
    private $scraper;

    /**
     * @var string
     *
     * @ORM\Column(name="x_path", type="string", length=255)
     */
    private $xPath;

    /**
     * @var string
     *
     * @ORM\Column(name="reg_exp", type="string", length=255)
     */
    private $regExp;

    /**
     * @var bool
     *
     * @ORM\Column(name="from_detail_page", type="boolean")
     */
    private $fromDetailPage = false;

    /**
     * @var string
     *
     * @ORM\Column(name="processors", type="string", length=255)
     */
    private $processors;

    /**
     * @var string
     *
     * @ORM\Column(name="proc_ctxt", type="string", length=255)
     */
    private $procCTxt;

    /**
     * @var bool
     *
     * @ORM\Column(name="mandatory", type="boolean")
     */
    private $mandatoty;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set scrapedObjAttr
     *
     * @param integer $scrapedObjAttr
     * @return ScraperElement
     */
    public function setScrapedObjAttr($scrapedObjAttr)
    {
        $this->scrapedObjAttr = $scrapedObjAttr;

        return $this;
    }

    /**
     * Get scrapedObjAttr
     *
     * @return integer 
     */
    public function getScrapedObjAttr()
    {
        return $this->scrapedObjAttr;
    }

    /**
     * Set scraper
     *
     * @param integer $scraper
     * @return ScraperElement
     */
    public function setScraper($scraper)
    {
        $this->scraper = $scraper;

        return $this;
    }

    /**
     * Get scraper
     *
     * @return integer 
     */
    public function getScraper()
    {
        return $this->scraper;
    }

    /**
     * Set xPath
     *
     * @param string $xPath
     * @return ScraperElement
     */
    public function setXPath($xPath)
    {
        $this->xPath = $xPath;

        return $this;
    }

    /**
     * Get xPath
     *
     * @return string 
     */
    public function getXPath()
    {
        return $this->xPath;
    }

    /**
     * Set regExp
     *
     * @param string $regExp
     * @return ScraperElement
     */
    public function setRegExp($regExp)
    {
        $this->regExp = $regExp;

        return $this;
    }

    /**
     * Get regExp
     *
     * @return string 
     */
    public function getRegExp()
    {
        return $this->regExp;
    }

    /**
     * Set fromDetailPage
     *
     * @param boolean $fromDetailPage
     * @return ScraperElement
     */
    public function setFromDetailPage($fromDetailPage)
    {
        $this->fromDetailPage = $fromDetailPage;

        return $this;
    }

    /**
     * Get fromDetailPage
     *
     * @return boolean 
     */
    public function getFromDetailPage()
    {
        return $this->fromDetailPage;
    }

    /**
     * Set processors
     *
     * @param string $processors
     * @return ScraperElement
     */
    public function setProcessors($processors)
    {
        $this->processors = $processors;

        return $this;
    }

    /**
     * Get processors
     *
     * @return string 
     */
    public function getProcessors()
    {
        return $this->processors;
    }

    /**
     * Set procCTxt
     *
     * @param string $procCTxt
     * @return ScraperElement
     */
    public function setProcCTxt($procCTxt)
    {
        $this->procCTxt = $procCTxt;

        return $this;
    }

    /**
     * Get procCTxt
     *
     * @return string 
     */
    public function getProcCTxt()
    {
        return $this->procCTxt;
    }

    /**
     * Set mandatoty
     *
     * @param boolean $mandatoty
     * @return ScraperElement
     */
    public function setMandatoty($mandatoty)
    {
        $this->mandatoty = $mandatoty;

        return $this;
    }

    /**
     * Get mandatoty
     *
     * @return boolean 
     */
    public function getMandatoty()
    {
        return $this->mandatoty;
    }

    /**
     * Set scrapedObjAttrId
     *
     * @param integer $scrapedObjAttrId
     * @return ScraperElement
     */
    public function setScrapedObjAttrId($scrapedObjAttrId)
    {
        $this->scrapedObjAttrId = $scrapedObjAttrId;

        return $this;
    }

    /**
     * Get scrapedObjAttrId
     *
     * @return integer 
     */
    public function getScrapedObjAttrId()
    {
        return $this->scrapedObjAttrId;
    }

    /**
     * Set scraperId
     *
     * @param integer $scraperId
     * @return ScraperElement
     */
    public function setScraperId($scraperId)
    {
        $this->scraperId = $scraperId;

        return $this;
    }

    /**
     * Get scraperId
     *
     * @return integer 
     */
    public function getScraperId()
    {
        return $this->scraperId;
    }
}
