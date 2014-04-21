<?php

namespace Balancenet\Bundle\ScrapyBundle\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

use Oro\Bundle\SecurityBundle\Annotation\AclAncestor;
use Oro\Bundle\SecurityBundle\Annotation\Acl;


/**
 * History controller.
 *
 * @Route("/history")
 */
class HistoryController extends Controller
{

    /**
     * @Route(
     *      "/",
     *      name="balancenet_scrapy_history_index",
     *      requirements={"_format"="html|json"},
     *      defaults={"_format" = "html"}
     * )
     * @AclAncestor("balancenet_scrapy_history_view")
     * @Template
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('BalancenetScrapyBundle:History')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Create user form
     *
     * @Route("/create/{id}", name="balancenet_scrapy_scraper_create", requirements={"id"="\d+"})
     * @Template("BalancenetScrapyBundle:Scraper:update.html.twig")
     * @Acl(
     *      id="balancenet_scrapy_scraper_create",
     *      type="entity",
     *      class="BalancenetScrapyBundle:Scraper",
     *      permission="CREATE"
     * )
     */
    public function createAction()
    {
        return $this->update();
    }


    /**
     * Edit Person form
     *
     * @Route("/update/{id}", name="nearest_franchise_person_update", requirements={"id"="\d+"})
     * @Template
     * @Acl(
     *      id="franchise_person_update",
     *      type="entity",
     *      permission="EDIT",
     *      class="NearestFranchiseBundle:Person"
     * )
     */
    public function updateAction(Person $entity)
    {
        return $this->update($entity);
    }


    /**
     * @Route("/view/{id}", name="nearest_franchise_person_view", requirements={"id"="\d+"})
     * @Template
     * @Acl(
     *      id="nearest_franchise_person_view",
     *      type="entity",
     *      permission="VIEW",
     *      class="NearestFranchiseBundle:Person"
     * )
     */
    public function viewAction(Person $entity)
    {
        return ['entity'  => $entity];
    }


//    /**
//     * Deletes a Page entity.
//     *
//     * @Route("/{id}", name="page_delete")
//     * @Method("DELETE")
//     */
//    public function deleteAction(Request $request, $id)
//    {
//        $form = $this->createDeleteForm($id);
//        $form->handleRequest($request);
//
//        if ($form->isValid()) {
//            $em = $this->getDoctrine()->getManager();
//            $entity = $em->getRepository('NearestFranchiseBundle:Person')->find($id);
//
//            if (!$entity) {
//                throw $this->createNotFoundException('Unable to find Page entity.');
//            }
//
//            $em->remove($entity);
//            $em->flush();
//        }
//
//        return $this->redirect($this->generateUrl('page'));
//    }
//

    /**
     * @return ApiEntityManager
     */
    protected function getManager()
    {
        return $this->get('nearest_franchise.person.manager.api');
    }


    /**
     * @param Person $entity
     * @return array
     */
    protected function update(Person $entity = null)
    {

        if (!$entity) {
            $entity = $this->getManager()->createEntity();
        }


        if ($this->get('nearest_franchise.form.handler.franchisor')->process($entity)) {
            $this->get('session')->getFlashBag()->add(
                'success',
                'the Franchisee has been saved'
            );

            return $this->get('oro_ui.router')->actionRedirect(
                array(
                    'route' => 'nearest_franchise_franchisor_update',
                    'parameters' => array('id' => $entity->getId()),
                ),
                array(
                    'route' => 'nearest_franchise_franchisor_view',
                    'parameters' => array('id' => $entity->getId())
                )
            );
        }

        return array(
            'form' => $this->get('balancenet_scrapy.form.scraper')->createView()
        );
    }


    /**
     * @Route("/widget/info/{id}", name="nearest_franchise_person_widget_info", requirements={"id"="\d+"})
     * @AclAncestor("nearest_franchise_person_view")
     * @Template
     */
    public function infoAction(Person $entity)
    {
        return [
            'entity'  => $entity
        ];
    }


    /**
     * @Route("/widget/location/{id}", name="nearest_franchise_person_widget_location", requirements={"id"="\d+"})
     * @AclAncestor("nearest_franchise_person_view")
     * @Template
     */
    public function locationAction(Person $entity)
    {
        return [
            'entity'  => $entity
        ];
    }


}
