<?php

use yii\db\Migration;


class m170517_213627_rbac_init extends Migration
{


    public function up()
    {
        $authManager = Yii::$app->authManager;
        $authManager->removeAll();

        // Permissions
        $accessBackend = $authManager->createPermission('accessBackend');
        $accessBackend->description = 'Can access old_backend';
        $authManager->add($accessBackend);

        $administrateRBAC = $authManager->createPermission('administrateRBAC');
        $administrateRBAC->description = 'Can administrate all "RBAC" module';
        $authManager->add($administrateRBAC);

        $BViewRoles = $authManager->createPermission('BViewRoles');
        $BViewRoles->description = 'Can view roles list';
        $authManager->add($BViewRoles);

        $BCreateRoles = $authManager->createPermission('BCreateRoles');
        $BCreateRoles->description = 'Can create roles';
        $authManager->add($BCreateRoles);

        $BUpdateRoles = $authManager->createPermission('BUpdateRoles');
        $BUpdateRoles->description = 'Can update roles';
        $authManager->add($BUpdateRoles);

        $BDeleteRoles = $authManager->createPermission('BDeleteRoles');
        $BDeleteRoles->description = 'Can delete roles';
        $authManager->add($BDeleteRoles);

        $BViewPermissions = $authManager->createPermission('BViewPermissions');
        $BViewPermissions->description = 'Can view permissions list';
        $authManager->add($BViewPermissions);

        $BCreatePermissions = $authManager->createPermission('BCreatePermissions');
        $BCreatePermissions->description = 'Can create permissions';
        $authManager->add($BCreatePermissions);

        $BUpdatePermissions = $authManager->createPermission('BUpdatePermissions');
        $BUpdatePermissions->description = 'Can update permissions';
        $authManager->add($BUpdatePermissions);

        $BDeletePermissions = $authManager->createPermission('BDeletePermissions');
        $BDeletePermissions->description = 'Can delete permissions';
        $authManager->add($BDeletePermissions);

        $BViewRules = $authManager->createPermission('BViewRules');
        $BViewRules->description = 'Can view rules list';
        $authManager->add($BViewRules);

        $BCreateRules = $authManager->createPermission('BCreateRules');
        $BCreateRules->description = 'Can create rules';
        $authManager->add($BCreateRules);

        $BUpdateRules = $authManager->createPermission('BUpdateRules');
        $BUpdateRules->description = 'Can update rules';
        $authManager->add($BUpdateRules);

        $BDeleteRules = $authManager->createPermission('BDeleteRules');
        $BDeleteRules->description = 'Can delete rules';
        $authManager->add($BDeleteRules);

        $BViewRoutes = $authManager->createPermission('BViewRoutes');
        $BViewRoutes->description = 'Can view routes list';
        $authManager->add($BViewRoutes);

        $BCreateRoutes = $authManager->createPermission('BCreateRoutes');
        $BCreateRoutes->description = 'Can create routes';
        $authManager->add($BCreateRoutes);

        $BUpdateRoutes = $authManager->createPermission('BUpdateRoutes');
        $BUpdateRoutes->description = 'Can edit routes';
        $authManager->add($BUpdateRoutes);

        $BViewAssignments = $authManager->createPermission('BViewAssignments');
        $BViewAssignments->description = 'Can view list of assignments';
        $authManager->add($BViewAssignments);

        $BUpdateAssignments = $authManager->createPermission('BUpdateAssignments');
        $BUpdateAssignments->description = 'Can edit users assignments';
        $authManager->add($BUpdateAssignments);

        $BViewUsers = $authManager->createPermission('BViewUsers');
        $BViewUsers->description = 'Can view users list';
        $authManager->add($BViewUsers);

        $BCreateUsers = $authManager->createPermission('BCreateUsers');
        $BCreateUsers->description = 'Can create users';
        $authManager->add($BCreateUsers);

        $BUpdateUsers = $authManager->createPermission('BUpdateUsers');
        $BUpdateUsers->description = 'Can edit users';
        $authManager->add($BUpdateUsers);

        $BDeleteUsers = $authManager->createPermission('BDeleteUsers');
        $BDeleteUsers->description = 'Can delete users';
        $authManager->add($BDeleteUsers);

        // Assignments
        $authManager->addChild($administrateRBAC, $BViewRoles);
        $authManager->addChild($administrateRBAC, $BCreateRoles);
        $authManager->addChild($administrateRBAC, $BUpdateRoles);
        $authManager->addChild($administrateRBAC, $BDeleteRoles);
        $authManager->addChild($administrateRBAC, $BViewPermissions);
        $authManager->addChild($administrateRBAC, $BCreatePermissions);
        $authManager->addChild($administrateRBAC, $BUpdatePermissions);
        $authManager->addChild($administrateRBAC, $BDeletePermissions);
        $authManager->addChild($administrateRBAC, $BViewRules);
        $authManager->addChild($administrateRBAC, $BCreateRules);
        $authManager->addChild($administrateRBAC, $BUpdateRules);
        $authManager->addChild($administrateRBAC, $BDeleteRules);
        $authManager->addChild($administrateRBAC, $BViewRoutes);
        $authManager->addChild($administrateRBAC, $BCreateRoutes);
        $authManager->addChild($administrateRBAC, $BUpdateRoutes);
        $authManager->addChild($administrateRBAC, $BViewAssignments);
        $authManager->addChild($administrateRBAC, $BUpdateAssignments);
        $authManager->addChild($administrateRBAC, $BViewUsers);
        $authManager->addChild($administrateRBAC, $BCreateUsers);
        $authManager->addChild($administrateRBAC, $BUpdateUsers);
        $authManager->addChild($administrateRBAC, $BDeleteUsers);

        // Roles
//        

        $admin = $authManager->createRole('admin');
        $admin->description = 'Admin';
        $authManager->add($admin);

        $authManager->addChild($admin, $accessBackend);
        $authManager->addChild($admin, $administrateRBAC);
        
        $authManager->assign($admin, 1);
    }

    public function down()
    {

    }


}
