<?php
/**
 * User: minhnvt1
 * Date: 4/21/14 - 1:42 PM
 */

namespace Balancenet\Bundle\ScrapyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Site
 * @ORM\Table(name="scrapy_site")
 * @ORM\Entity(repositoryClass="Balancenet\Bundle\ScrapyBundle\Entity\Repository\SiteRepository")
 */
class Site
{
    /**
     * id
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * name
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    protected $name;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255)
     */
    private $url;

    /**
     * @var int
     *
     * @ORM\Column(name="scraper_id", type="integer")
     */
    private $scraperId;

    /**
     * @var Scraper
     *
     * @ORM\ManyToOne(targetEntity="Scraper", inversedBy="sites")
     * @ORM\JoinColumn(name="scraper_id", referencedColumnName="id")
     */
    private $scraper;

    /**
     * @var int
     *
     * @ORM\Column(name="scraper_runtime_id", type="integer")
     */
    private $scraperRuntimeId;

    /**
     * @var SchedulerRuntime
     *
     * @ORM\ManyToOne(targetEntity="SchedulerRunTime", inversedBy="sites")
     * @ORM\JoinColumn(name="scraper_runtime_id", referencedColumnName="id")
     */
    private $schedulerRuntime;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="string", length=255)
     */
    private $createdAt;

    /**
     * @var \DateTime
     * @ORM\Column(name="updated_at", type="string", length=255)
     */
    private $updatedAt;


    public function __construct()
    {
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
     * Set url
     *
     * @param string $url
     * @return Site
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set createdAt
     *
     * @param string $createdAt
     * @return Site
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return string 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param string $updatedAt
     * @return Site
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return string 
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set scraper
     *
     * @param integer $scraper
     * @return Site
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
     * Set scraperId
     *
     * @param integer $scraperId
     * @return Site
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

    /**
     * Set scraperRuntimeId
     *
     * @param integer $scraperRuntimeId
     * @return Site
     */
    public function setScraperRuntimeId($scraperRuntimeId)
    {
        $this->scraperRuntimeId = $scraperRuntimeId;

        return $this;
    }

    /**
     * Get scraperRuntimeId
     *
     * @return integer 
     */
    public function getScraperRuntimeId()
    {
        return $this->scraperRuntimeId;
    }

    /**
     * Set schedulerRuntime
     *
     * @param \Balancenet\Bundle\ScrapyBundle\Entity\SchedulerRunTime $schedulerRuntime
     * @return Site
     */
    public function setSchedulerRuntime(\Balancenet\Bundle\ScrapyBundle\Entity\SchedulerRunTime $schedulerRuntime = null)
    {
        $this->schedulerRuntime = $schedulerRuntime;

        return $this;
    }

    /**
     * Get schedulerRuntime
     *
     * @return \Balancenet\Bundle\ScrapyBundle\Entity\SchedulerRunTime 
     */
    public function getSchedulerRuntime()
    {
        return $this->schedulerRuntime;
    }
}
