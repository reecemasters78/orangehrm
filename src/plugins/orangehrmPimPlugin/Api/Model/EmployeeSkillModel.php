<?php
/**
 * OrangeHRM is a comprehensive Human Resource Management (HRM) System that captures
 * all the essential functionalities required for any enterprise.
 * Copyright (C) 2006 OrangeHRM Inc., http://www.orangehrm.com
 *
 * OrangeHRM is free software; you can redistribute it and/or modify it under the terms of
 * the GNU General Public License as published by the Free Software Foundation; either
 * version 2 of the License, or (at your option) any later version.
 *
 * OrangeHRM is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY;
 * without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 * See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with this program;
 * if not, write to the Free Software Foundation, Inc., 51 Franklin Street, Fifth Floor,
 * Boston, MA  02110-1301, USA
 */

namespace OrangeHRM\Pim\Api\Model;

use OrangeHRM\Core\Api\V2\Serializer\ModelTrait;
use OrangeHRM\Core\Api\V2\Serializer\Normalizable;
use OrangeHRM\Entity\EmployeeSkill;

/**
 * @OA\Schema(
 *     schema="Pim-EmployeeSkillModel",
 *     type="object",
 *     @OA\Property(property="yearsOfExperience", type="number"),
 *     @OA\Property(property="comments", type="string"),
 *     @OA\Property(property="skill", type="object",
 *         @OA\Property(property="id", type="integer"),
 *         @OA\Property(property="name", type="string"),
 *         @OA\Property(property="description", type="string")
 *     )
 * )
 */
class EmployeeSkillModel implements Normalizable
{
    use ModelTrait;

    /**
     * @param EmployeeSkill $employeeSkill
     */
    public function __construct(EmployeeSkill $employeeSkill)
    {
        $this->setEntity($employeeSkill);
        $this->setFilters(
            [
                'yearsOfExp',
                'comments',
                ['getSkill', 'getId'],
                ['getSkill', 'getName'],
                ['getSkill', 'getDescription']
            ]
        );
        $this->setAttributeNames(
            [
                'yearsOfExperience',
                'comments',
                ['skill', 'id'],
                ['skill', 'name'],
                ['skill', 'description']
            ]
        );
    }
}
