<?php

namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use AppBundle\Entity\Nearearthobjects;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;

class Last3daysController extends Controller
{
    /**
     * Matches /Last3days exactly
     *
     * @Route("/Last3days", name="blog_list")
     */
    public function listAction()
    {  
        echo "<pre>";
        $start_date = date('Y-m-d', strtotime("-3 days"));
        $end_date   = date('Y-m-d'); 

        $output     = file_get_contents('https://api.nasa.gov/neo/rest/v1/feed?start_date='.$start_date.'&end_date='.$end_date.'&detailed=true&api_key=N7LkblDsc5aen05FJqBQ8wU4qSdmsftwJagVK7UD');
        $datalist   = json_decode($output);
        $neos       =  $datalist->near_earth_objects;

        $formatedNeoData = array();
        $count = 0;

        foreach($neos as $k => $v)
        { 
            foreach($v as $vk)
            {    
                $formatedNeoData[$count]['date'] = $k;
                $formatedNeoData[$count]['reference'] = $vk->neo_reference_id;
                $formatedNeoData[$count]['name'] = $vk->name;
                
                foreach ($vk->close_approach_data as $vc)
                {
                     $formatedNeoData[$count]['speed'] = $vc->relative_velocity->miles_per_hour; 
                }
                $formatedNeoData[$count]['ishasardous'] = $vk->is_potentially_hazardous_asteroid;

                $count++;
            }  
        }  

        $em = $this->getDoctrine()->getManager();  
        foreach($formatedNeoData as $neosData)
        { 
            $Nearearthobjects = new Nearearthobjects();
            $Nearearthobjects->setDate($neosData['date']);
            $Nearearthobjects->setReference($neosData['reference']);
            $Nearearthobjects->setName($neosData['name']);            
            $Nearearthobjects->setSpeed($neosData['speed']); 
            $Nearearthobjects->setIshazardous( (!empty($neosData['ishasardous'])?"true":"false") );

             // tells Doctrine you want to (eventually) save the Product (no queries yet)
            $em->persist($Nearearthobjects);

            // actually executes the queries (i.e. the INSERT query)
            $em->flush();

            //return new Response('Saved new product with id '.$Nearearthobjects->getId());
        } 
        $Status = array('msg' => 'Near-Earth Objects are sucessfully inserted in to database.');
        return $this->render('last3days/list.html.twig', array('Status' => $Status, ));
    }

    /**
     * Matches /Last3days/*
     *
     * @Route("/Last3days/{slug}", name="blog_show")
     */
    public function showAction()
    {
        // $slug will equal the dynamic part of the URL
        // e.g. at /Last3days/yay-routing, then $slug='yay-routing'

        // ...
		$hellowWorld = json_encode(array('hello3' => 'world'));
        return $this->render('last3days/show.html.twig', array('hello' => $hellowWorld, ));

    } 

}