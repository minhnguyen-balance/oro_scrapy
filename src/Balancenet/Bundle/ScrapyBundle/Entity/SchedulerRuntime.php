<?php
/**
 * User: minhnvt1
 * Date: 4/23/14 - 3:45 PM
 */

namespace Balancenet\Bundle\ScrapyBundle\Entity;


use Doctrine\ORM\Mapping as ORM;


/**
 * Class SchedulerRuntime
 *
 * @ORM\Table(name="scrapy_schedulerruntime")
 * @ORM\Entity(repositoryClass="Balancenet\Bundle\ScrapyBundle\Entity\Repository\SchedulerRuntimeRepository")
 */
class SchedulerRuntime
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
     * @var string
     *
     * @ORM\Column(name="runtime_type", type="string", length=255)
     */
    private $runtimeType;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="next_action_time", type="datetime")
     */
    private $nextActionTime;

    /**
     * @var int
     *
     * @ORM\Column(name="next_action_factor", type="integer")
     */
    private $nextActionFactor;

    /**
     * @var int
     *
     * @ORM\Column(name="num_zero_actions", type="integer")
     */
    private $numZeroActions;


    /**
     * @var Site
     *
     * @ORM\OneToMany(targetEntity="Site", mappedBy="schedulerRuntime")
     */
    private $sites;

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
     * Set runtimeType
     *
     * @param string $runtimeType
     * @return SchedulerRuntime
     */
    public function setRuntimeType($runtimeType)
    {
        $this->runtimeType = $runtimeType;

        return $this;
    }

    /**
     * Get runtimeType
     *
     * @return string 
     */
    public function getRuntimeType()
    {
        return $this->runtimeType;
    }

    /**
     * Set nextActionTime
     *
     * @param \DateTime $nextActionTime
     * @return SchedulerRuntime
     */
    public function setNextActionTime($nextActionTime)
    {
        $this->nextActionTime = $nextActionTime;

        return $this;
    }

    /**
     * Get nextActionTime
     *
     * @return \DateTime 
     */
    public function getNextActionTime()
    {
        return $this->nextActionTime;
    }

    /**
     * Set nextActionFactor
     *
     * @param integer $nextActionFactor
     * @return SchedulerRuntime
     */
    public function setNextActionFactor($nextActionFactor)
    {
        $this->nextActionFactor = $nextActionFactor;

        return $this;
    }

    /**
     * Get nextActionFactor
     *
     * @return integer 
     */
    public function getNextActionFactor()
    {
        return $this->nextActionFactor;
    }

    /**
     * Set numZeroActions
     *
     * @param integer $numZeroActions
     * @return SchedulerRuntime
     */
    public function setNumZeroActions($numZeroActions)
    {
        $this->numZeroActions = $numZeroActions;

        return $this;
    }

    /**
     * Get numZeroActions
     *
     * @return integer 
     */
    public function getNumZeroActions()
    {
        return $this->numZeroActions;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->sites = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add sites
     *
     * @param \Balancenet\Bundle\ScrapyBundle\Entity\Site $sites
     * @return SchedulerRuntime
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
}
