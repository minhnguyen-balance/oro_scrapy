<?php
/**
 * User: minhnvt1
 * Date: 4/23/14 - 10:36 AM
 */

namespace Balancenet\Bundle\ScrapyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection as ArrayCollection;



/**
 * Class ScrapedObjClass
 * @ORM\Table(name="scrapy_scrapedobjclass")
 * @ORM\Entity(repositoryClass="Balancenet\Bundle\ScrapyBundle\Entity\Repository\ScrapedObjClassRepository")
 */
class ScrapedObjClass
{
    /**
     * @var Integer
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
     * @var String
     *
     * @ORM\Column(name="scraper_scheduler_conf", type="text")
     */
    private $scraperSchedulerConf;

    /**
     * @var String
     *
     * @ORM\Column(name="checker_scheduler_conf", type="text")
     */
    private $checkerSchedulerConf;

    /**
     * @var String
     *
     * @ORM\Column(name="comments", type="text")
     */
    private $comments;


    /**
     * @var scrapedObjAttrs
     *
     * @ORM\OneToMany(targetEntity="ScrapedObjAttr", mappedBy="objClassId")
     */
    private $scrapedObjAttrs;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime")
     */
    private $updatedAt;

    public function __construct()
    {

        $this->scrapedObjAttrs = new ArrayCollection();

        $this->setCreatedAt(new \DateTime());
        $this->setUpdatedAt(new \DateTime());
    }

    /**
     * Override __toString() method to return the name of ScrapedObjClass
     *
     * @return string name
     */
    public function __toString()
    {
        return $this->name;
    }

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
     * @return ScrapedObjClass
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
     * Set scraperSchedulerConf
     *
     * @param string $scraperSchedulerConf
     * @return ScrapedObjClass
     */
    public function setScraperSchedulerConf($scraperSchedulerConf)
    {
        $this->scraperSchedulerConf = $scraperSchedulerConf;

        return $this;
    }

    /**
     * Get scraperSchedulerConf
     *
     * @return string 
     */
    public function getScraperSchedulerConf()
    {
        return $this->scraperSchedulerConf;
    }

    /**
     * Set checkerSchedulerConf
     *
     * @param string $checkerSchedulerConf
     * @return ScrapedObjClass
     */
    public function setCheckerSchedulerConf($checkerSchedulerConf)
    {
        $this->checkerSchedulerConf = $checkerSchedulerConf;

        return $this;
    }

    /**
     * Get checkerSchedulerConf
     *
     * @return string 
     */
    public function getCheckerSchedulerConf()
    {
        return $this->checkerSchedulerConf;
    }

    /**
     * Set comments
     *
     * @param string $comments
     * @return ScrapedObjClass
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
     * @return ScrapedObjClass
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
     * @return ScrapedObjClass
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
     * Add scrapedObjAttrs
     *
     * @param \Balancenet\Bundle\ScrapyBundle\Entity\ScrapedObjAttr $scrapedObjAttrs
     * @return ScrapedObjClass
     */
    public function addScrapedObjAttr(\Balancenet\Bundle\ScrapyBundle\Entity\ScrapedObjAttr $scrapedObjAttrs)
    {
        $this->scrapedObjAttrs[] = $scrapedObjAttrs;

        return $this;
    }

    /**
     * Remove scrapedObjAttrs
     *
     * @param \Balancenet\Bundle\ScrapyBundle\Entity\ScrapedObjAttr $scrapedObjAttrs
     */
    public function removeScrapedObjAttr(\Balancenet\Bundle\ScrapyBundle\Entity\ScrapedObjAttr $scrapedObjAttrs)
    {
        $this->scrapedObjAttrs->removeElement($scrapedObjAttrs);
    }

    /**
     * Get scrapedObjAttrs
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getScrapedObjAttrs()
    {
        return $this->scrapedObjAttrs;
    }
}
