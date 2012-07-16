<?php

// THE CONFIG RULES BELOW ARE LISTED IN ALPHABETICAL ORDER BY CONTROLLER NAME

$config = array(
	
	'login/index' => array(
		array(
			'field' => 'username',
			'label' => 'username',
			'rules' => 'trim|required'
		),
		array(
			'field' => 'password',
			'label' => 'password',
			'rules' => 'trim|required'
		)
	),
	
	'users/add' => array(
		array(
			'field' => 'forename',
			'label' => 'forename',
			'rules' => 'trim|required'
		),
		array(
			'field' => 'surname',
			'label' => 'surname',
			'rules' => 'trim|required'
		),
		array(
			'field' => 'email',
			'label' => 'email',
			'rules' => 'trim|valid_email|required'
		),
		array(
			'field' => 'username',
			'label' => 'username',
			'rules' => 'trim|required'
		),
		array(
			'field' => 'password',
			'label' => 'password',
			'rules' => 'trim|required'
		)
	),
	
	'users/edit' => array(
		array(
			'field' => 'forename',
			'label' => 'forename',
			'rules' => 'trim|required'
		),
		array(
			'field' => 'surname',
			'label' => 'surname',
			'rules' => 'trim|required'
		),
		array(
			'field' => 'email',
			'label' => 'email',
			'rules' => 'trim|valid_email|required'
		),
		array(
			'field' => 'username',
			'label' => 'username',
			'rules' => 'trim|required'
		),
		array(
			'field' => 'password',
			'label' => 'password',
			'rules' => 'trim|matches[passwordconf]'
		),
		array(
			'field' => 'passwordconf',
			'label' => 'confirm password',
			'rules' => 'trim'
		)
	)
);

?>