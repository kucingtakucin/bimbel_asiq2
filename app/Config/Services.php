<?php

namespace Config;

use App\Models\LoginModel;
use App\Models\UserModel;
use CodeIgniter\Config\BaseService;
use CodeIgniter\Model;
use Myth\Auth\Authentication\Activators\UserActivator;
use Myth\Auth\Authentication\Passwords\PasswordValidator;
use Myth\Auth\Authentication\Resetters\UserResetter;
use Myth\Auth\Authorization\FlatAuthorization;
use Myth\Auth\Authorization\GroupModel;
use Myth\Auth\Authorization\PermissionModel;

/**
 * Services Configuration file.
 *
 * Services are simply other classes/libraries that the system uses
 * to do its job. This is used by CodeIgniter to allow the core of the
 * framework to be swapped out easily without affecting the usage within
 * the rest of your application.
 *
 * This file holds any application-specific services, or service overrides
 * that you might need. An example has been included with the general
 * method format you should use for your service methods. For more examples,
 * see the core Services file at system/Config/Services.php.
 */
class Services extends BaseService
{
	// public static function example($getShared = true)
	// {
	//     if ($getShared)
	//     {
	//         return static::getSharedInstance('example');
	//     }
	//
	//     return new \CodeIgniter\Example();
	// }
}
