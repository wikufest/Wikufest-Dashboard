<?php 
/*
 *
 * (c) 2015 Okta Purnama Rahadian <okta.rahadian@hotmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Wikusama\Bundle\Wikufest\AppBundle\Controller\UserAccount;
 
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class ActivateUserAccountController extends Controller
{
    public function activateSingleAccountAction()
    {
        if(!$this->get('security.context')->isGranted('ROLE_ADMIN')) {
            return new AccessDeniedException();
        }
        
        $username = "";
        $email = "";
        
        $this->get('wikufest.user_account')->activateAccount($username, $email);
        
        return new Response("activateSingleAccountAction");
    }
    
    public function loadFromFileAction()
    {
        if(!$this->get('security.context')->isGranted('ROLE_ADMIN')) {
            return new AccessDeniedException();
        }

        $file = "";
        $this->get('wikufest.user_account')->bulkActivateFromCsv($file);
        
        return new Response("loadFromFileAction");
        
    }
}