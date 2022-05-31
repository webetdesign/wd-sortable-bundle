<?php
/*
 * This file is part of the pixSortableBehaviorBundle.
 *
 * (c) Nicolas Ricci <nicolas.ricci@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WebEtDesign\SortableBundle\Controller;

use Sonata\AdminBundle\Controller\CRUDController;
use Symfony\Component\HttpFoundation\Request;

class SortableAdminController extends CRUDController
{
    public function moveAction(Request $request)
    {
        $this->assertObjectExists($request, true);

        $id = $request->attributes->get('id');
        $position = $request->attributes->get('position');
        \assert(null !== $id);
        $existingObject = $this->admin->getObject($id);
        \assert(null !== $existingObject);

        $this->admin->checkAccess('edit', $existingObject);

        $existingObject->setPosition($position);

        $existingObject = $this->admin->update($existingObject);

        return $this->handleXmlHttpRequestSuccessResponse($request, $existingObject);
    }
}
