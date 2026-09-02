<?php

if (!defined('ABSPATH')) {
	exit();
}

/**
 * Returns the external destinations used throughout the marketing site.
 */
function drtalk_redesign_individual_signup_url()
{
	return 'https://signup.drtalk.com/register-individual/';
}

function drtalk_redesign_practice_signup_url()
{
	return 'https://signup.drtalk.com/v2/register';
}

function drtalk_redesign_login_url()
{
	return 'https://app-v3.drtalk.com/login';
}

function drtalk_redesign_demo_url()
{
	return 'https://calendly.com/drtalksupport/demonstration';
}

function drtalk_redesign_default_referral_gap_analysis_url()
{
	return 'https://calendly.com/drtalksupport/free-referral-gap-analysis';
}

function drtalk_redesign_referral_gap_analysis_url()
{
	$url = get_option('drtalk_referral_gap_analysis_url', drtalk_redesign_default_referral_gap_analysis_url());

	return wp_http_validate_url($url) ? $url : drtalk_redesign_default_referral_gap_analysis_url();
}

function drtalk_redesign_default_contact_email()
{
	return 'info@drtalk.com';
}

function drtalk_redesign_contact_email()
{
	$email = get_option('drtalk_contact_email', drtalk_redesign_default_contact_email());

	return is_email($email) ? $email : drtalk_redesign_default_contact_email();
}

function drtalk_redesign_contact_url()
{
	return 'mailto:' . drtalk_redesign_contact_email();
}
