<?php

namespace Balancenet\Bundle\ScrapyBundle\Form\Handler;

use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;

use Oro\Bundle\TagBundle\Entity\TagManager;
use Oro\Bundle\TagBundle\Form\Handler\TagHandlerInterface;

use Balancenet\Bundle\ScrapyBundle\Entity\ScrapedObjClass;

class ProductHandler implements TagHandlerInterface
{
    /**
     * @var FormInterface
     */
    protected $form;

    /**
     * @var Request
     */
    protected $request;

    /**
     * @var ObjectManager
     */
    protected $manager;

    /**
     * @var TagManager
     */
    protected $tagManager;

    /**
     *
     * @param FormInterface $form
     * @param Request       $request
     * @param ObjectManager $manager
     */
    public function __construct(FormInterface $form, Request $request, ObjectManager $manager)
    {
        $this->form    = $form;
        $this->request = $request;
        $this->manager = $manager;
    }

    /**
     * Process form
     *
     * @param  Page $entity
     * @return bool True on successful processing, false otherwise
     */
    public function process(ScrapedObjClass $entity)
    {
        $this->form->setData($entity);

        if (in_array($this->request->getMethod(), array('POST', 'PUT'))) {
            $this->form->submit($this->request);
            // $this->handleContacts($entity);

            if ($this->form->isValid()) {
                $this->onSuccess($entity);

                return true;
            }
        }

        return false;
    }

    /**
     * "Success" form handler
     *
     * @param Page $entity
     */
    protected function onSuccess(ScrapedObjClass $entity)
    {
        $this->manager->persist($entity);
        $this->manager->flush();
        //$this->tagManager->saveTagging($entity);
    }

    /**
     * {@inheritdoc}
     */
    public function setTagManager(TagManager $tagManager)
    {
        $this->tagManager = $tagManager;
    }
}
