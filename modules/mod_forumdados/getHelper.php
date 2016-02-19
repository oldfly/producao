<?php

class ModGetHelper{

public static function getDevices(){
	$db = JFactory::getDbo();
	$query = $db->getQuery(true);
	$query->select(array('count(*)'));
	$query->from($db->quoteName('#__kunena_categories'));
	$query->where($db->quoteName('parent_id') . ' >= 1 and '. $db->quoteName('published').' = 1');
	$db->setQuery($query);
	$results = $db->loadResult();
 return $results;
}

public static function getSolutions(){

	$db = JFactory::getDbo();
	$query = $db->getQuery(true);
	$query->select('count(postid)');
	$query->from($db->quoteName('#__kunena_thankyou'));
	$db->setQuery($query);
	$results = $db->loadResult();
 	return $results;
	
}

public static function getTotalTutorials(){
		jimport('joomla.application.categories');
		$categories 	= JCategories::getInstance('Content', array());
		$category   	= $categories->get(7);
		$getChildren 	= $category->getChildren(true);
		$catids			= array();
		$countarticles = 0;
	 	foreach ($getChildren as $k => $children) {

	 		$cat = JModelLegacy::getInstance('Articles', 'ContentModel');
			$cat->setState('filter.category_id', $children->id); // Set category ID here
			$articles = $cat->getItems();

			$countarticles = $countarticles + count($articles); 
	 	}

	return $countarticles;
}

public static function getPercent(){
	$db = JFactory::getDbo();
	$query = $db->getQuery(true);
	//solutions
	$query->select('count(distinct(postid)) as thankformsn');
	$query->from($db->quoteName('#__kunena_thankyou'));
	$db->setQuery($query);
	$thanks = $db->loadResult();
	$query->clear();
	//mensagens
	$query->select('count(id)');
	$query->from($db->quoteName('#__kunena_topics'));
	$db->setQuery($query);
	$msns = $db->loadResult();

	$percent = (  $thanks * 100) / $msns;
 	return $percent;
}

}


?>