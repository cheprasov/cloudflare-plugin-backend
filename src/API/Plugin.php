<?php

namespace CF\API;

use CF\Integration\DataStoreInterface;

class Plugin extends Client
{
    const PLUGIN_API_NAME = 'PLUGIN API';
    const ENDPOINT = 'https://partners.cloudflare/plugins/';

    //plugin/:id/settings/:human_readable_id setting names
    const SETTING_DEFAULT_SETTINGS = 'default_settings';
    const SETTING_IP_REWRITE = 'ip_rewrite';
    const SETTING_PROTOCOL_REWRITE = 'protocol_rewrite';
    const SETTING_PLUGIN_SPECIFIC_CACHE = 'plugin_specific_cache';
    const SETTING_PLUGIN_SPECIFIC_CACHE_TAG = 'plugin_specific_cache_tag';

    const SETTING_ID_KEY = 'id';
    const SETTING_VALUE_KEY = 'value';
    const SETTING_EDITABLE_KEY = 'editable';
    const SETTING_MODIFIED_DATE_KEY = 'modified_on';

    public static function getPluginSettingsKeys()
    {
        return array(
            self::SETTING_DEFAULT_SETTINGS,
            self::SETTING_IP_REWRITE,
            self::SETTING_PROTOCOL_REWRITE,
            self::SETTING_PLUGIN_SPECIFIC_CACHE,
            self::SETTING_PLUGIN_SPECIFIC_CACHE_TAG,
        );
    }

    /**
     * @return string
     */
    public function getEndpoint()
    {
        return self::ENDPOINT;
    }

    /**
     * @return string
     */
    public function getAPIClientName()
    {
        return self::PLUGIN_API_NAME;
    }

    /**
     * @param Request $request
     *
     * @return array|mixed
     */
    public function callAPI(Request $request)
    {
        return $this->createAPIError('The url: '.$request->getUrl().' is not a valid path.');
    }

    public function createAPISuccessResponse($result)
    {
        return array(
            'success' => true,
            'result' => $result,
            'messages' => [],
            'errors' => [],
        );
    }

    /**
     * @param $pluginSettingKey
     * @param $value
     * @param $editable
     * @param $modified_on
     * @return array
     */
    public function createPluginSettingObject($pluginSettingKey, $value, $editable, $modified_on)
    {
        return array(
            self::SETTING_ID_KEY => $pluginSettingKey,
            self::SETTING_VALUE_KEY => $value,
            self::SETTING_EDITABLE_KEY => $editable,
            self::SETTING_MODIFIED_DATE_KEY => $modified_on,
        );
    }
}
