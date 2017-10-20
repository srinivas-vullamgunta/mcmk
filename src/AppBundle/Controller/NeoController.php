<?php

namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use AppBundle\Entity\Nearearthobjects;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;

class NeoController extends Controller
{
    /**
     * Matches /Neo exactly
     *
     * @Route("/neo/hazardous", name="blog_list")
     */
    public function hazardousAction()
    {   
        $em = $this->getDoctrine()->getManager();  
        $Nearearthobjects = new Nearearthobjects();
        $query = $em->createQuery( 'SELECT n.id, n.date, n.reference, n.name, n.name, n.speed, n.ishazardous
                                        FROM AppBundle:Nearearthobjects n
                                        WHERE n.ishazardous = :ishazardous
                                        ORDER BY n.reference ASC'
                                    )->setParameter('ishazardous', "true");

        $NeoObj = $query->getResult();  
        $NeoObjJsonFormat = json_encode($NeoObj);  
        return $this->render('neo/hazardous.html.twig', array('Status' => $NeoObjJsonFormat)); 
    } 

    public function fastestAction($hazardous)
    {   

        $em = $this->getDoctrine()->getManager();  
        $Nearearthobjects = new Nearearthobjects();
        $query = $em->createQuery( 'SELECT n.name
                                        FROM AppBundle:Nearearthobjects n
                                        WHERE n.ishazardous = :ishazardous
                                        ORDER BY n.speed DESC'
                                    )->setParameter('ishazardous', $hazardous);

        $NeoObj = $query->setMaxResults(1)->setFirstResult(0)->getResult();  

        $NeoObjJsonFormat = json_encode($NeoObj);  
        return $this->render('neo/fastesthazardous.html.twig', array('Status' => $NeoObjJsonFormat)); 
    }


    public function bestyearAction($hazardous)
    {   

        $em = $this->getDoctrine()->getManager();  
        $Nearearthobjects = new Nearearthobjects();
        $query = $em->createQuery( 'SELECT n.date, count(n.date) AS NumberOfAsteriod
                                        FROM AppBundle:Nearearthobjects n
                                        WHERE n.ishazardous = :ishazardous
                                        GROUP BY n.date
                                        ORDER BY NumberOfAsteriod DESC'
                                    )->setParameter('ishazardous', $hazardous);


        $NeoObj = $query->setMaxResults(1)->setFirstResult(0)->getResult();  
        
        //echo date('Y', strtotime($NeoObj[0]['date']));
        $NeoObjJsonFormat = json_encode(date('Y', strtotime($NeoObj[0]['date'])));  
        return $this->render('neo/fastesthazardous.html.twig', array('Status' => $NeoObjJsonFormat)); 
    }


    public function bestmonthAction($hazardous)
    {   

        $em = $this->getDoctrine()->getManager();  
        $Nearearthobjects = new Nearearthobjects();
        $query = $em->createQuery( 'SELECT n.date, count(n.date) AS NumberOfAsteriod
                                        FROM AppBundle:Nearearthobjects n
                                        WHERE n.ishazardous = :ishazardous
                                        GROUP BY n.date
                                        ORDER BY NumberOfAsteriod DESC'
                                    )->setParameter('ishazardous', $hazardous);


        $NeoObj = $query->setMaxResults(1)->setFirstResult(0)->getResult();  
        
        //echo date('Y', strtotime($NeoObj[0]['date']));
        $NeoObjJsonFormat = json_encode(date('M', strtotime($NeoObj[0]['date'])));  
        return $this->render('neo/fastesthazardous.html.twig', array('Status' => $NeoObjJsonFormat)); 
    }



 
}