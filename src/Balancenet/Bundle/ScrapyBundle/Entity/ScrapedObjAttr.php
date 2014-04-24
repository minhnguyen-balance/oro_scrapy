<?php
/**
 * User: minhnvt1
 * Date: 4/23/14 - 11:13 AM
 */

namespace Balancenet\Bundle\ScrapyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Balancenet\Bundle\ScrapyBundle\Entity\ScrapedObjClass;

/**
 * Class ScrapedObjAttr
 * @ORM\Table(name="scrapy_scrapedobjattr")
 * @ORM\Entity(repositoryClass="Balancenet\Bundle\ScrapyBundle\Entity\Repository\ScrapedObjAttrRepository")
 */
class ScrapedObjAttr
{
    /**
     * @var Int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var String
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var ScrapedObjClass
     *
     * @ORM\ManyToOne(targetEntity="ScrapedObjClass", inversedBy="scrapedObjAttrs")
     * @ORM\JoinColumn(name="obj_class_id", referencedColumnName="id")
     */
    private $scrapedObjClass;

    /**
     * @ORM\Column(name="obj_class_id", type="integer")
     */
    private $scrapedObjClassId;

    /**
     * @var ScraperElements
     *
     * @ORM\OneToMany(targetEntity="ScraperElement", mappedBy="scrapedObjAttr")
     */
    private $scraperElements;

    /**
     * @var String
     *
     * @ORM\Column(name="attr_type", type="string", length=5)
     */
    private $attrType;

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
     * Set name
     *
     * @param string $name
     * @return ScrapedObjAttr
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set objClassId
     *
     * @param integer $objClassId
     * @return ScrapedObjAttr
     */
    public function setObjClassId($objClassId)
    {
        $this->objClassId = $objClassId;

        return $this;
    }

    /**
     * Get objClassId
     *
     * @return integer 
     */
    public function getObjClassId()
    {
        return $this->objClassId;
    }

    /**
     * Set attrType
     *
     * @param string $attrType
     * @return ScrapedObjAttr
     */
    public function setAttrType($attrType)
    {
        $this->attrType = $attrType;

        return $this;
    }

    /**
     * Get attrType
     *
     * @return string 
     */
    public function getAttrType()
    {
        return $this->attrType;
    }

    /**
     * Set scrapedObjClass
     *
     * @param integer $scrapedObjClass
     * @return ScrapedObjAttr
     */
    public function setScrapedObjClass($scrapedObjClass)
    {
        $this->scrapedObjClass = $scrapedObjClass;

        return $this;
    }

    /**
     * Get scrapedObjClass
     *
     * @return integer 
     */
    public function getScrapedObjClass()
    {
        return $this->scrapedObjClass;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->scraperElements = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add scraperElements
     *
     * @param \Balancenet\Bundle\ScrapyBundle\Entity\ScraperElement $scraperElements
     * @return ScrapedObjAttr
     */
    public function addScraperElement(\Balancenet\Bundle\ScrapyBundle\Entity\ScraperElement $scraperElements)
    {
        $this->scraperElements[] = $scraperElements;

        return $this;
    }

    /**
     * Remove scraperElements
     *
     * @param \Balancenet\Bundle\ScrapyBundle\Entity\ScraperElement $scraperElements
     */
    public function removeScraperElement(\Balancenet\Bundle\ScrapyBundle\Entity\ScraperElement $scraperElements)
    {
        $this->scraperElements->removeElement($scraperElements);
    }

    /**
     * Get scraperElements
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getScraperElements()
    {
        return $this->scraperElements;
    }

    /**
     * Set scrapedObjClassId
     *
     * @param integer $scrapedObjClassId
     * @return ScrapedObjAttr
     */
    public function setScrapedObjClassId($scrapedObjClassId)
    {
        $this->scrapedObjClassId = $scrapedObjClassId;

        return $this;
    }

    /**
     * Get scrapedObjClassId
     *
     * @return integer 
     */
    public function getScrapedObjClassId()
    {
        return $this->scrapedObjClassId;
    }
}
