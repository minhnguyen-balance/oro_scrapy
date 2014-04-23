<?php
/**
 * User: minhnvt1
 * Date: 4/21/14 - 1:42 PM
 */

namespace Balancenet\Bundle\ScrapyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * History
 * @ORM\Table(name="scrapy_history")
 * @ORM\Entity(repositoryClass="Balancenet\Bundle\ScrapyBundle\Entity\Repository\HistoryRepository")
 */
class History
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
     * @ORM\Column(name="message", type="text")
     */
    private  $message;

    /**
     * @var string
     *
     * @ORM\Column(name="ref_object", type="string", length=255)
     */
    private $refObject;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=25)
     */
    private $type;

    /**
     * @var int
     *
     * @ORM\Column(name="level", type="integer")
     */
    private $level;

    /**
     * @var string
     *
     * @ORM\Column(name="spider_name", type="string", length=255)
     */
    private $spiderName;


    /**
     * @var int
     *
     * @ORM\Column(name="scraper_id", type="integer")
     */
    private $scraper_id;

    /**
     * @var Scraper
     *
     * @ORM\ManyToOne(targetEntity="Scraper", inversedBy="histories")
     * @ORM\JoinColumn(name="scraper_id", referencedColumnName="id")
     */
    private $scraper;


    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;

    public function __toString(){
        return '';
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
     * Set message
     *
     * @param string $message
     * @return History
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get message
     *
     * @return string 
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set refObject
     *
     * @param string $refObject
     * @return History
     */
    public function setRefObject($refObject)
    {
        $this->refObject = $refObject;

        return $this;
    }

    /**
     * Get refObject
     *
     * @return string 
     */
    public function getRefObject()
    {
        return $this->refObject;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return History
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set level
     *
     * @param integer $level
     * @return History
     */
    public function setLevel($level)
    {
        $this->level = $level;

        return $this;
    }

    /**
     * Get level
     *
     * @return integer 
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * Set spiderName
     *
     * @param string $spiderName
     * @return History
     */
    public function setSpiderName($spiderName)
    {
        $this->spiderName = $spiderName;

        return $this;
    }

    /**
     * Get spiderName
     *
     * @return string 
     */
    public function getSpiderName()
    {
        return $this->spiderName;
    }

    /**
     * Set scraper_id
     *
     * @param integer $scraperId
     * @return History
     */
    public function setScraperId($scraperId)
    {
        $this->scraper_id = $scraperId;

        return $this;
    }

    /**
     * Get scraper_id
     *
     * @return integer 
     */
    public function getScraperId()
    {
        return $this->scraper_id;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return History
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
     * Set scraper
     *
     * @param \Balancenet\Bundle\ScrapyBundle\Entity\Scraper $scraper
     * @return History
     */
    public function setScraper(\Balancenet\Bundle\ScrapyBundle\Entity\Scraper $scraper = null)
    {
        $this->scraper = $scraper;

        return $this;
    }

    /**
     * Get scraper
     *
     * @return \Balancenet\Bundle\ScrapyBundle\Entity\Scraper 
     */
    public function getScraper()
    {
        return $this->scraper;
    }
}
