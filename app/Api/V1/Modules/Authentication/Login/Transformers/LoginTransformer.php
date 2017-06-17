<?php
/**
 * LoginTransformer Class
 * Transforms an authentication response
 */

namespace App\Api\V1\Modules\Authentication\Login\Transformers;


class LoginTransformer
{
    /**
     * Transform an authentication response
     * @param array $authenticationData
     * @return array
     */
    public function transform(array $authenticationData){
        return [
            'token'                         => (string) $authenticationData['token'],
            'name'                          => (string) $authenticationData['name'],
            'email'                         => (string) $authenticationData['email']
        ];
    }
}