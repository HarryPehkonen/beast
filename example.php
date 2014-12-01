<?php

require_once 'beast.php';

$beast = new Beast(__DIR__);
$data = array(
	'columns' => array(
		'Monday',
		'Tuesday',
		'Wednesday',
		'Thursday',
		'Friday',
		'Saturday',
		'Sunday',
	),
	'rows' => array(
		array(
			'title' => 'Breakfast',
			'Monday' => 'Toast',
			'Tuesday' => 'Egg',
			'Wednesday' => 'Cereal',
			'Thursday' => 'Yoghurt',
			'Friday' => 'Beans',
			'Saturday' => 'Protein Shake',
			'Sunday' => 'Muffin',
		),
		array(
			'title' => 'Lunch',
			'Monday' => 'Banana',
			'Tuesday' => 'Orange',
			'Wednesday' => 'Watermelon',
			'Thursday' => 'Kumquat',
			'Friday' => 'Apple',
			'Saturday' => 'Pineapple',
			'Sunday' => 'Tomato',
		),
		array(
			'title' => 'Dinner',
			'Monday' => 'Pizza',
			'Tuesday' => 'Lasagna',
			'Wednesday' => 'Tortellini',
			'Thursday' => 'Hamburger',
			'Friday' => 'Potato',
			'Saturday' => 'Veal',
			'Sunday' => 'Salad',
		)
	)
);
$content = $beast->render('template.php', $data);
echo $content;

?>
