<?php
/**
 * User: minhnvt1
 * Date: 4/21/14 - 1:42 PM
 */

namespace Balancenet\Bundle\ScrapyBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;


use Balancenet\Bundle\ScrapyBundle\Entity\ScrapedObjClass;
/**
 * Scraper
 * @ORM\Table(name="scrapy_scraper")
 * @ORM\Entity(repositoryClass="Balancenet\Bundle\ScrapyBundle\Entity\Repository\ScraperRepository")
 */
class Scraper
{
    /**
     * id
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * name
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var int
     *
     * @ORM\Column(name="scraped_obj_class_id", type="integer")
     */
    private $scrapedObjClassId;

    /**
     * @var ScrapedObjClass
     *
     * @ORM\ManyToOne(targetEntity="ScrapedObjClass", inversedBy="scrapers")
     * @ORM\JoinColumn(name="scraped_obj_class_id", referencedColumnName="id")
     */
    private $scrapedObjClass;

    /**
     * @ORM\OneToMany(targetEntity="Site", mappedBy="scraper")
     */
    private $sites;

    /**
     * @ORM\OneToMany(targetEntity="ScraperElement", mappedBy="scraper")
     */
    private $scraperElements;

    /**
     * @ORM\OneToMany(targetEntity="History", mappedBy="scraper")
     */
    private $histories;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=1)
     */
    private $status;

    /**
     * @var string
     *
     * @ORM\Column(name="content_type", type="string", length=1)
     */
    private $contentType;

    /**
     * @var int
     *
     * @ORM\Column(name="max_items_read", type="integer")
     */
    private $maxItemsRead;

    /**
     * @var int
     *
     * @ORM\Column(name="max_items_save", type="integer")
     */
    private $maxItemsSave;

    /**
     * @var string
     *
     * @ORM\Column(name="pagination_type", type="string", length=1)
     */
    private $paginationType;

    /**
     * @var bool
     *
     * @ORM\Column(name="pagination_on_start", type="boolean")
     */
    private $paginationOnStart = true;

    /**
     * @var string
     *
     * @ORM\Column(name="pagination_append_str", type="string", length=255)
     */
    private $paginationAppendStr;

    /**
     * @var string
     *
     * @ORM\Column(name="pagination_page_replace", type="text")
     */
    private $paginationPageReplace;


    /**
     * @var string
     *
     * @ORM\Column(name="checker_type", type="string", length=1)
     */
    private $checkerType;

    /**
     * @var string
     *
     * @ORM\Column(name="checker_x_path", type="string", length=255)
     */
    private $checkerXPath;

    /**
     * @var string
     *
     * @ORM\Column(name="checker_x_path_result", type="string", length=255)
     */
    private $checkerXPathResult;

    /**
     * @var string
     *
     * @ORM\Column(name="checker_ref_url", type="string", length=255)
     */
    private $checkerRefUrl;

    /**
     * @var string
     *
     * @ORM\Column(name="comments", type="string", length=255)
     */
    private $comments;


    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;

    /**
     * @var \DateTime;
     *
     * @ORM\Column(name="updated_at", type="datetime")
     */
    private $updatedAt;

    public function __construct()
    {
        $this->sites = new ArrayCollection();

        $this->createdAt = new \DateTime();
        $this->updatedAt = new \DateTime();
    }

    public function __toString(){
        return $this->getName();
    }

    /**
     * get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * set name
     *
     * @param string $name
     * @return Scraper
     */
    public function setName($name)
    {
        $this->name = $name;
    }
    /**
     * get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set scrapedObjClass
     *
     * @param integer $scrapedObjClass
     * @return Scraper
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
     * Set status
     *
     * @param string $status
     * @return Scraper
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set contentType
     *
     * @param string $contentType
     * @return Scraper
     */
    public function setContentType($contentType)
    {
        $this->contentType = $contentType;

        return $this;
    }

    /**
     * Get contentType
     *
     * @return string 
     */
    public function getContentType()
    {
        return $this->contentType;
    }

    /**
     * Set maxItemsRead
     *
     * @param integer $maxItemsRead
     * @return Scraper
     */
    public function setMaxItemsRead($maxItemsRead)
    {
        $this->maxItemsRead = $maxItemsRead;

        return $this;
    }

    /**
     * Get maxItemsRead
     *
     * @return integer 
     */
    public function getMaxItemsRead()
    {
        return $this->maxItemsRead;
    }

    /**
     * Set maxItemsSave
     *
     * @param integer $maxItemsSave
     * @return Scraper
     */
    public function setMaxItemsSave($maxItemsSave)
    {
        $this->maxItemsSave = $maxItemsSave;

        return $this;
    }

    /**
     * Get maxItemsSave
     *
     * @return integer 
     */
    public function getMaxItemsSave()
    {
        return $this->maxItemsSave;
    }

    /**
     * Set paginationType
     *
     * @param string $paginationType
     * @return Scraper
     */
    public function setPaginationType($paginationType)
    {
        $this->paginationType = $paginationType;

        return $this;
    }

    /**
     * Get paginationType
     *
     * @return string 
     */
    public function getPaginationType()
    {
        return $this->paginationType;
    }

    /**
     * Set paginationOnStart
     *
     * @param boolean $paginationOnStart
     * @return Scraper
     */
    public function setPaginationOnStart($paginationOnStart)
    {
        $this->paginationOnStart = $paginationOnStart;

        return $this;
    }

    /**
     * Get paginationOnStart
     *
     * @return boolean 
     */
    public function getPaginationOnStart()
    {
        return $this->paginationOnStart;
    }

    /**
     * Set paginationAppendStr
     *
     * @param string $paginationAppendStr
     * @return Scraper
     */
    public function setPaginationAppendStr($paginationAppendStr)
    {
        $this->paginationAppendStr = $paginationAppendStr;

        return $this;
    }

    /**
     * Get paginationAppendStr
     *
     * @return string 
     */
    public function getPaginationAppendStr()
    {
        return $this->paginationAppendStr;
    }

    /**
     * Set paginationPageReplace
     *
     * @param string $paginationPageReplace
     * @return Scraper
     */
    public function setPaginationPageReplace($paginationPageReplace)
    {
        $this->paginationPageReplace = $paginationPageReplace;

        return $this;
    }

    /**
     * Get paginationPageReplace
     *
     * @return string 
     */
    public function getPaginationPageReplace()
    {
        return $this->paginationPageReplace;
    }

    /**
     * Set checkerType
     *
     * @param string $checkerType
     * @return Scraper
     */
    public function setCheckerType($checkerType)
    {
        $this->checkerType = $checkerType;

        return $this;
    }

    /**
     * Get checkerType
     *
     * @return string 
     */
    public function getCheckerType()
    {
        return $this->checkerType;
    }

    /**
     * Set checkerXPath
     *
     * @param string $checkerXPath
     * @return Scraper
     */
    public function setCheckerXPath($checkerXPath)
    {
        $this->checkerXPath = $checkerXPath;

        return $this;
    }

    /**
     * Get checkerXPath
     *
     * @return string 
     */
    public function getCheckerXPath()
    {
        return $this->checkerXPath;
    }

    /**
     * Set checkerXPathResult
     *
     * @param string $checkerXPathResult
     * @return Scraper
     */
    public function setCheckerXPathResult($checkerXPathResult)
    {
        $this->checkerXPathResult = $checkerXPathResult;

        return $this;
    }

    /**
     * Get checkerXPathResult
     *
     * @return string 
     */
    public function getCheckerXPathResult()
    {
        return $this->checkerXPathResult;
    }

    /**
     * Set checkerRefUrl
     *
     * @param string $checkerRefUrl
     * @return Scraper
     */
    public function setCheckerRefUrl($checkerRefUrl)
    {
        $this->checkerRefUrl = $checkerRefUrl;

        return $this;
    }

    /**
     * Get checkerRefUrl
     *
     * @return string 
     */
    public function getCheckerRefUrl()
    {
        return $this->checkerRefUrl;
    }

    /**
     * Set comments
     *
     * @param string $comments
     * @return Scraper
     */
    public function setComments($comments)
    {
        $this->comments = $comments;

        return $this;
    }

    /**
     * Get comments
     *
     * @return string 
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Scraper
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     * @return Scraper
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime 
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Add sites
     *
     * @param \Balancenet\Bundle\ScrapyBundle\Entity\Site $sites
     * @return Scraper
     */
    public function addSite(\Balancenet\Bundle\ScrapyBundle\Entity\Site $sites)
    {
        $this->sites[] = $sites;

        return $this;
    }

    /**
     * Remove sites
     *
     * @param \Balancenet\Bundle\ScrapyBundle\Entity\Site $sites
     */
    public function removeSite(\Balancenet\Bundle\ScrapyBundle\Entity\Site $sites)
    {
        $this->sites->removeElement($sites);
    }

    /**
     * Get sites
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSites()
    {
        return $this->sites;
    }

    /**
     * Set scrapedObjClassId
     *
     * @param integer $scrapedObjClassId
     * @return Scraper
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

    /**
     * Add histories
     *
     * @param \Balancenet\Bundle\ScrapyBundle\Entity\History $histories
     * @return Scraper
     */
    public function addHistory(\Balancenet\Bundle\ScrapyBundle\Entity\History $histories)
    {
        $this->histories[] = $histories;

        return $this;
    }

    /**
     * Remove histories
     *
     * @param \Balancenet\Bundle\ScrapyBundle\Entity\History $histories
     */
    public function removeHistory(\Balancenet\Bundle\ScrapyBundle\Entity\History $histories)
    {
        $this->histories->removeElement($histories);
    }

    /**
     * Get histories
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getHistories()
    {
        return $this->histories;
    }

    /**
     * Add scraperElements
     *
     * @param \Balancenet\Bundle\ScrapyBundle\Entity\ScraperElement $scraperElements
     * @return Scraper
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
}
