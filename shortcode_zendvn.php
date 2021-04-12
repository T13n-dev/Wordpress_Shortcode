
// Shortcode with my class
class Tien_Sc_Date
{
	public function __construct()
	{
		add_shortcode('tien_my_sc_date', [$this, 'show']);
	}

	public function show()
	{
		$str = date('l jS \of F Y h:i:s A');

		return $str;
	}
}

<?php
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
		if ($this->_shortcode_option == true) {
			$this->date();
		}
	}

	public function date()
	{
		new Tien_Sc_Date();
	}
}

new Zendvn_Mp_SC_Main();
