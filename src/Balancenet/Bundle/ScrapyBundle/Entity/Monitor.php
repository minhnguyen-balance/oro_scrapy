<?php
/**
 * User: minhnvt1
 * Date: 4/21/14 - 1:42 PM
 */

namespace Balancenet\Bundle\ScrapyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Monitor
 * @ORM\Table(name="scrapy_monitor")
 * @ORM\Entity(repositoryClass="Balancenet\Bundle\ScrapyBundle\Entity\Repository\MonitorRepository")
 */
class Monitor
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
} 