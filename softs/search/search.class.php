<?php
	class Search {
		var $query;
		var $baseUrl;
		var $patternPages;
		var $patternResults;
		var $patternEngines;
		var $searchEngineUrl;
		var $searchEngineOptions;
		var $searchEngineQueryVar;
		var $searchEnginePageVar;
		var $noResultMessage;
		
		function Search($baseUrl, $query) {
			$this->baseUrl = $baseUrl;
			$this->query = $query;
			//Les trois variables suivantes sont très importantes, ce sont des expressions régulières qui récupèrent le contenu souhaité.
			//patternPages permet de récupérer tous les numéros de page et ainsi de gérér la pagination.
			//patternResults permet de récupérer les urls et les descriptions pour tous les résulats de recherche.
			//patternEngines permet de récupérer les noms des moteurs de recherches dont sont issus les résultats.
			$this->patternPages = '#<span id="search_page_current">([0-9]+)</span>#Usi';
			$this->patternResults = '#<li class="search_snippet">.*<a +href=".*">(.*)</a>(.*)<div>(.*)<cite>(.*)</cite>#Usi';
			$this->patternEngines = '#.*title="(.*)".*#Usi';
			$this->searchEngineUrl = 'http://seeks.fr/search';
			//prs=off permet d'exclure les résultats personnalisés inutiles ici.
			//expansion=3 permet d'avoir plus de résultats.
			$this->searchEngineOptions = '&expansion=3&action=expand&prs=off&lang=fr';
			$this->searchEngineQueryVar = '?q';
			$this->searchEnginePageVar = '&page';
			$this->noResultMessage = '<p>Il n\'y a aucun résultat.</p>';
		}
		
		function setBaseUrl($baseUrl) {
			$this->baseUrl = $baseUrl;
		}
		
		function setQuery($query) {
			$this->query = $query;
		}
		
		function getCurrentPage() {
			return (isset($_GET['spage']) && $_GET['spage'] > 0) ? $_GET['spage'] : 1;
		}
		
		function getStartIndex() { //On calcule l'index courant pour affectuer la recherche.
			return $this->searchEnginePageVar . '=' . $this->getCurrentPage();
		}
		
		function getEngines($enginesStr) {
			$html = '(';
			if(preg_match_all($this->patternEngines, $enginesStr, $matches)) {
				$engines = $matches[1];
				for($i = 0; $i < count($engines); $i++) {
					$html .= $engines[$i];
					if($i < count($engines) - 1) {
						$html .= ', ';
					}
				}
			}
			$html .= ')';
			return $html;
		}
		
		function getPagination($content) { //On récupère la pagination sous forme de HTML.
			$html = '';
			$html .= '<br /><center><b>';
			$page = $this->getCurrentPage();
			if(preg_match($this->patternPages, $content, $matchesPages)) {
				$pages = $matchesPages[1];
				if(preg_match('#id="search_page_prev"#Usi', $content, $matchPrev)) {
					$html .= '<a href="?q=' . $this->query . '&spage=' . ($page - 1) . '">Précédent</a> - ';
				}
				for($i = 0; $i < count($pages); $i++) {
					if($page == $pages[$i]) {
						$html .= '<span>' . $pages[$i] . '</span> ';
					} else {
						$html .= '<a href="?q=' . $this->query . '&spage=' . $pages[$i] . '">' . $pages[$i] . '</a> ';
					}
				}
				if(preg_match('#id="search_page_next"#Usi', $content, $matchNext)) {
					$html .= '- <a href="?q=' . $this->query . '&spage=' . ($page + 1) . '">Suivant</a> ';
				}
			} else {
				$html = '';
			}
			$html .= '</center></b>';
			return $html;
		}
		
		function getResults($content) { //On récupère les résultats sous forme de HTML.
			$html = '';
			if(preg_match_all($this->patternResults, $content, $matches)) {
				$urls = $matches[4];
				$titles = $matches[1];
				$descs = $matches[3];	
				$engines = $matches[2];	
				for($i = 0; $i < count($urls); $i++) {
					$enginesNames = $this->getEngines($engines[$i]);
					$enginesNames = utf8_decode(str_replace("(", "&nbsp;", $enginesNames));
					$enginesNames = utf8_decode(str_replace(")", "", $enginesNames));
					$enginesNames = utf8_decode(str_replace(",", "", $enginesNames));
					$enginesNames = utf8_decode(str_replace("Google", " <img src='common/images/moteurs/google_12x12.png'/>", $enginesNames));
					$enginesNames = utf8_decode(str_replace("Exalead", " <img src='common/images/moteurs/exalead_12x12.png'/>", $enginesNames));
					$enginesNames = utf8_decode(str_replace("Seeks", " <img src='common/images/moteurs/seeks_12x12.png'/>", $enginesNames));
					$enginesNames = utf8_decode(str_replace("Bing", " <img src='common/images/moteurs/bing_12x12.png'/>", $enginesNames));
					$enginesNames = utf8_decode(str_replace("Yahoo", " <img src='common/images/moteurs/yahoo_12x12.png'/>", $enginesNames));
					$titles[$i] = utf8_decode(str_replace("&amp;#39;", "'", $titles[$i]));
					$descs[$i] = strip_tags(utf8_decode(str_replace("&amp;#39;", "'", $descs[$i])), '<br>');
					$html .= '<p><a class="searchLink" href="' . $urls[$i] . '">' . $titles[$i] . '</a> <small>' . $enginesNames . '</small><br/><span class="descrecherche">' . $descs[$i] . '<i>' . $urls[$i] . '</i></span></p><hr />';
				}
			} else {
				$html = $this->noResultMessage;
			}
			return $html;
		}
		
		function getUrl() { //On génère l'adresse permettant d'effectuer la recherche avec tous les paramètres (page, options, mots clés, etc).
			return $this->searchEngineUrl . $this->searchEngineQueryVar . '=site:' . $this->baseUrl . '+' . $this->query . $this->searchEngineOptions . $this->getStartIndex();
		}
		
		function getHTML() { //On récupère tout le code HTML de la recherche (résultats + pagination).
			/*if($this->query == '') {
				return $this->noResultMessage;
			}*/
			$this->query = str_replace(' ', '+', $this->query);
			$content = str_replace("\n", '', file_get_contents($this->getUrl()));
			$html = $this->getResults($content) . $this->getPagination($content) . '<p></p>';
			return $html;
		}
	}
?>
