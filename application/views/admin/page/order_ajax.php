<?php
echo get_ol($pages);
function get_ol($arr, $child = false) {

	$str = '';
	if (count($arr)) {
		$str .= $child == false ? '<ol class="sortable">' : '<ol>';

		foreach ($arr as $item) {
			
			$str .= '<li id="list_' . $item['id'] . '">';
			$str .= '<div>' . $item['title'] . '</div>';

			//check for children
			if (isset($item['children']) && count($item['children'])) {
				$str .= get_ol($item['children'], true);
			}

			$str .= '</li>' . PHP_EOL;

		}

		$str .= '</ol>' . PHP_EOL;
	}

	return $str;
	
}
?>
<script>
	$(document).ready(function() {
		$('.sortable').nestedSortable({
			handle: 'div',
			items: 'li',
			toleranceElement: '> div',
			maxLevels: 2
		});
	});
</script>