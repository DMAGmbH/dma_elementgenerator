<?php
namespace Dma\Dma_elementgenerator\Controller;
/**
 * Created By Conversoft Generator
 * https://conversoft.rocks
 * https://github.com/conversoft
 * @author Thomas Lonnemann <thomas@conversoft.rocks>
**/
// Model REQUIRES ELOQUENT
// use Dma\Dma_elementgenerator\Models\Dmadma_elementgenerator;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

/*
*
* @Route("dma_elementgenerator")
*/

class ContaoDmaDma_elementgeneratorController extends Controller
{
    /**
     * @Route("/dma_elementgenerator")
     */
    public function indexAction($id)
    {
        $this->container->get('contao.framework')->initialize();
        $data = [];
        // REQUIRES ELOQUENT
        //$dmadma_elementgenerator = Dmadma_elementgenerator::where('title', $id)->first();

        if ($dmadma_elementgenerator) {
            $return = [];
        }  
        if (!count($data)) {
                $data = ['error' => 'noResults'];
        }

        $response = new JsonResponse();
        $response->setData(array(
            'data' => $data
        ));
        return $response;

    }
}
