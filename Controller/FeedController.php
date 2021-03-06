<?php


namespace Outlandish\RoutemasterBundle\Controller;


use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Outlandish\RoutemasterBundle\Annotation\Template;

class FeedController extends BaseController {


    /**
     * @Route("/sitemap.xml")
     */
    public function sitemap() {
        $pageItems = $this->get('outlandish_routemaster.query_manager')->query(array('post_type' => 'any', 'orderby' => 'date'));

	    $content = $this->renderView('OutlandishRoutemasterBundle:Feed:sitemap.xml.php', array('pageItems' => $pageItems));
	    return new Response($content, 200, array('Content-type' => 'text/xml'));
    }


	/**
	 * @Route("/feed.rss")
	 */
	public function feedAction() {
		$pageItems = array(); //provide your post items here

		$content = $this->renderView('OutlandishRoutemasterBundle:Feed:feed.xml.php', array(
			'title' => get_bloginfo('name'),
			'description' => '',
			'pageItems' => $pageItems
		));
		return new Response($content, 200, array('Content-type' => 'text/xml'));
	}

    /**
     * @Route("/robots.txt")
     */
    public function robots()
    {
        ob_start();
        do_action('do_robots');
        $robots = ob_get_clean();

        return new Response($robots, 200, array('Content-type' => 'text/plain'));
    }

}