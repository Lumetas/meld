<?php
namespace Meld;
use Meract\Core\View;
use Meract\Core\Response;

class Meld {
	private static array $pages = [];
	public static function show($rq, $data = null) {
		return (new Response(new View("../core/meld/views/main", ["isRender" => true, "pages" => self::$pages])))->header("Content-Type", "text/html");
	}

	public static function registerPage(string $name, callable $route, $backloadType){
		self::$pages[] = [$name, morphLive($route), $backloadType];
	}
}
