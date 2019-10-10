<?php
namespace DaiDP\StsSDK\HttpClient;

/**
 * Class ReponseData
 * @package DaiDP\StsSDK\HttpClient
 * @author DaiDP
 * @since Sep, 2019
 */
class ReponseData
{
    public $error;
    public $errorMessage;
    public $data;

    /**
     * ReponseData constructor.
     * @param $error
     * @param $errorMessage
     * @param $data
     */
    public function __construct($error, $data, $errorMessage = null)
    {
        $this->error = $error;
        $this->errorMessage = __($errorMessage);
        $this->data  = $data;
    }
}
