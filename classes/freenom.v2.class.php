<?php
namespace Freenom;

require_once( __DIR__ . '/freenom.class.php');

class V2 extends Main {
    protected $blueprint;

    public function __construct($email, $password, $test_mode=0)
    {
        parent::__construct('https://api.freenom.com/v2/', $email, $password);

        // The blueprint for the api
        $this->blueprint = array(
            /**
            * Ping the service
            */
            'ping' => array(
                'url' => 'service/ping',
                'method' => 'get',
                'params' => array(),
                'required' => array()
            ),

            // Domains

            /**
            * Search for available domains
            */
            'domain_search' => array(
                'url' => 'domain/search',
                'method' => 'get',
                'params' => array(
                    'domainname' => '',
                    'email' => '',
                    'password' => '',
                    'test_mode' => $test_mode
                ),
                'required' => array(
                    'domainname',
                    'email',
                    'password'
                )
            ),

            /**
            * Register a domain
            */
            'domain_register' => array(
                'url' => 'domain/register',
                'method' => 'post',
                'params' => array(
                    'domainname' => '',
                    'owner_id' => '',
                    'email' => '',
                    'password' => '',

                    'email' => '',
                    'password' => '',
                    'period' => '1Y',
                    'forward_url' => '',
                    'nameserver' => '',
                    'billing_id' => '',
                    'tech_id' => '',
                    'admin_id' => '',
                    'test_mode' => $test_mode
                ),
                'required' => array(
                    'domainname',
                    'owner_id',
                    'email',
                    'password'
                )
            ),

            /**
            * Renew a domain name registration
            */
            'domain_renew' => array(
                'url' => 'domain/renew',
                'method' => 'post',
                'params' => array(
                    'domainname' => '',
                    'email' => '',
                    'password' => '',

                    'period' => '1Y',
                    'test_mode' => $test_mode
                ),
                'required' => array(
                    'domainname',
                    'email',
                    'password',

                    'period'
                )
            ),

            /**
            * Get info on the registered domain names
            */
            'domain_getinfo' => array(
                'url' => 'domain/getinfo',
                'method' => 'get',
                'params' => array(
                    'domainname' => '',
                    'email' => '',
                    'password' => '',
                    'test_mode' => $test_mode
                ),
                'required' => array(
                    'domainname',
                    'email',
                    'password'
                )
            ),

            /**
            * Modify a domain
            */
            'dommain_modify' => array(
                'url' => 'domain/modify',
                'method' => 'post',
                'params' => array(
                    'domainname' => '',
                    'email' => '',
                    'password' => '',

                    'owner_id' => '',
                    'email' => '',
                    'password' => '',
                    'period' => '',
                    'forward_url' => '',
                    'nameserver' => '',
                    'billing_id' => '',
                    'tech_id' => '',
                    'admin_id' => '',
                    'test_mode' => $test_mode
                ),
                'required' => array(
                    'domainname',
                    'email',
                    'password',
                    'owner_id'
                )
            ),

            /**
            * Register or modify a nameserver glue record
            */
            'nameserver_register' => array(
                'url' => 'nameserver/register',
                'method' => 'post',
                'params' => array(
                    'domainname' => '',
                    'hostname' => '',
                    'ipaddress' => '',
                    'email' => '',
                    'password' => '',
                    'test_mode' => $test_mode
                ),
                'required' => array(
                    'domainname',
                    'hostname',
                    'email',
                    'password'
                )
            ),

            /**
            * Deleting a nameserver glue record
            */
            'nameserver_delete' => array(
                'url' => 'nameserver/delete',
                'method' => 'post',
                'params' => array(
                    'domainname' => '',
                    'hostname' => '',
                    'email' => '',
                    'password' => '',
                    'test_mode' => $test_mode
                ),
                'required' => array(
                    'domainname',
                    'hostname',
                    'email',
                    'password'
                )
            ),

            /**
            * Listing nameserver glue records under a domain
            */
            'nameserver_list' => array(
                'url' => 'nameserver/list',
                'method' => 'get',
                'params' => array(
                    'domainname' => '',

                    'email' => '',
                    'password' => '',
                    'test_mode' => $test_mode
                ),
                'required' => array(
                    'domainname',
                    'email',
                    'password'
                )
            ),

            // Contacts

            /**
            * Create or modify contact
            */
            'contact_register' => array(
                'url' => 'contact/register',
                'method' => 'post',
                'params' => array(
                    'contact_title' => '',
                    'contact_first_name' => '',
                    'contact_last_name' => '',
                    'contact_address' => '',
                    'contact_city' => '',
                    'contact_zipcode' => '',
                    'contact_statecode' => '',
                    'contact_country_code' => '',
                    'contact_phone' => '',
                    'contact_email' => '',
                    'email' => '',
                    'password' => '',

                    'contact_organization' => '',
                    'contact_middle_name' => '',
                    'contact_fax' => '',
                    'contact_id' => '',
                    'test_mode' => $test_mode
                ),
                'required' => array(
                    'contact_first_name',
                    'contact_last_name',
                    'email',
                    'password'
                )
            ),

            /**
            * Delete contact
            */
            'contact_delete' => array(
                'url' => 'contact/delete',
                'method' => 'post',
                'params' => array(
                    'contact_id' => '',
                    'email' => '',
                    'password' => '',
                    'test_mode' => $test_mode
                ),
                'required' => array(
                    'contact_id',
                    'email',
                    'password'
                )
            ),

            /**
            * Get info on specific contacts
            */
            'contact_getinfo' => array(
                'url' => 'contact/getinfo',
                'method' => 'get',
                'params' => array(
                    'contact_id' => '',
                    'email' => '',
                    'password' => '',
                    'test_mode' => $test_mode
                ),
                'required' => array(
                    'contact_id',
                    'email',
                    'password'
                )
            ),

            /**
            * List contacts under account
            */
            'contact_list' => array(
                'url' => 'contact/list',
                'method' => 'post',
                'params' => array(
                    'email' => '',
                    'password' => '',
                    'test_mode' => $test_mode
                ),
                'required' => array(
                    'email',
                    'password'
                )
            ),

            // Transfers

            /**
            * Get price of a domain transfer
            */
            'domain_transfer_price' => array(
                'url' => 'domain/transfer/price',
                'method' => 'get',
                'params' => array(
                    'domainname' => '',
                    'authcode' => '',
                    'email' => '',
                    'password' => '',
                    'test_mode' => $test_mode
                ),
                'required' => array(
                    'domainname',
                    'authcode',
                    'email',
                    'password'
                )
            ),

            /**
            * Request a domain transfer
            */
            'domain_transfer_request' => array(
                'url' => 'domain/transfer/request',
                'method' => 'post',
                'params' => array(
                    'domainname' => '',
                    'authcode' => '',
                    'owner_id' => '',
                    'period' => '',
                    'email' => '',
                    'password' => '',
                    'test_mode' => $test_mode
                ),
                'required' => array(
                    'domainname',
                    'authcode',
                    'owner_id',
                    'period',
                    'email',
                    'password'
                )
            ),

            /**
            * Approve a domain transfer
            */
            'domain_transfer_approve' => array(
                'url' => 'domain/transfer/approve',
                'method' => 'post',
                'params' => array(
                    'domainname' => '',
                    'email' => '',
                    'password' => '',
                    'test_mode' => $test_mode
                ),
                'required' => array(
                    'domainname',
                    'email',
                    'password'
                )
            ),

            /**
            * Decline a domain transfer
            */
            'domain_transfer_decline' => array(
                'url' => 'domain/transfer/decline',
                'method' => 'post',
                'params' => array(
                    'domainname' => '',
                    'reason' => '',
                    'email' => '',
                    'password' => '',
                    'test_mode' => $test_mode
                ),
                'required' => array(
                    'domainname',
                    'reason',
                    'email',
                    'password'
                )
            ),

            /**
            * List current domain transfers
            */
            'domain_transfer_list' => array(
                'url' => 'domain/transfer/list',
                'method' => 'get',
                'params' => array(
                    'email' => '',
                    'password' => '',
                    'test_mode' => $test_mode
                ),
                'required' => array(
                    'email',
                    'password'
                )
            )
        );
    }
}

?>
