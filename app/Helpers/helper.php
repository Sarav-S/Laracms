<?php 

use Vinkla\Hashids\Facades\Hashids;

/**
 * Returns the hashed string for the given id
 * 
 * @param integer $id id which has to be encoded
 * 
 * @return string
 */
function encode(int $id) : string
{
    return Hashids::encode($id);
}

/**
 * Returns the integer value for the given hashed string
 *
 * @param string $code code which has to be decoded
 *
 * @return integer
 */
function decode(string $code) : int
{
    return collect(Hashids::decode($code))->first();
}

/**
 * Returns the status options
 * 
 * @return array
 */
function getStatusOptions() : array
{
    return [
        '1' => 'Enabled',
        '0' => 'Disabled'
    ];
}