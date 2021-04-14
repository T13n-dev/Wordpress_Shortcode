<?php
// #1 Shortcode ZendVn
//
// add_shortcode('tien_my_sc_date', 'tien_mp_show_date');

// function tien_mp_show_date()
// {
// 	$str = date('l jS \of F Y h:i:s A');

// 	return $str;
// }

// Shortcode with my class
class Tien_Sc_Date
{
	public function __construct()
	{
		add_shortcode('tien_my_sc_date', [$this, 'show']);
	}

	public function show()
	{
		echo '<br/>' . get_the_ID();
		$postObj = get_post(get_the_ID());

		if (has_shortcode($postObj->post_content, 'tien_my_sc_date') == 1) {
			echo "<pre>";
			print_r($postObj);
			echo "</pre>";

			$str = date('l jS \of F Y h:i:s A');
		}

		return $str;
	}
}

// #2
// new Tien_Sc_Date();

// #2 Shortcode with setting options

// Lớp quản lý các shortcode cho Tien_Sc_Date
// Membership Anyone can register
class Zendvn_Mp_SC_Main
{
	private $_shortcode_name = 'zendvn_mp_sc_options';
	private $_shortcode_option = array();

	public function __construct()
	{
		// Set true cho option
		$defaultOption = array(
			'tien_my_sc_date' => true
		);

		$this->_shortcode_option = get_option($this->_shortcode_name, $defaultOption);

		// echo '<br/>' .  __METHOD__;
		// if ($this->_shortcode_option == true) {
		$this->date();
		// }

		// echo '<br/>shortcode exists: ' . shortcode_exists('tien_my_sc_date');


		// #3 Remove shortcode
		// loại bỏ phương thức đưa vào trong hook
		// remove_shortcode('tien_my_sc_date');
	}

	public function date()
	{
		if ($this->_shortcode_option == true) {
			new Tien_Sc_Date();
		} else {
			add_shortcode('tien_my_sc_date', '__return_false');
		}
	}
}

new Zendvn_Mp_SC_Main();
