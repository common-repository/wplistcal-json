<?php
/*
Controller name: WPListCal
Controller description: View calendar items
*/

class JSON_API_listcal_Controller {
	public function view()
	{
		global $wpdb;
		
		$limit = (int)((empty($_REQUEST['limit']) || $_REQUEST['limit'] > 500) ? 5 : $_REQUEST['limit']);
		
		$now = current_time('timestamp', 0);
		$tbl_name = $wpdb->prefix.'wplistcal';
		
		$result = $wpdb->get_results('SELECT * FROM '.$tbl_name.' WHERE `event_end_time` >= "'.(int)$now.'" ORDER BY `event_start_time` ASC, `event_end_time` ASC LIMIT '.$limit);
		
		$r = array(
			'status' => 'ok',
			'now' => $now,
			'now_full' => date('Y-m-d H:i:s', $now),
			'count' => count($result),
			'items' => array()
		);
		
		foreach ($result as $item)
		{
			$item->event_start_fulltime = date('Y-m-d H:i:s', $item->event_start_time);
			$item->event_end_fulltime = date('Y-m-d H:i:s', $item->event_start_time);
			$r['items'][] = $item;
		}
		
		return $r;
	}
}