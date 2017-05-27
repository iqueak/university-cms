<?php

use yii\db\Migration;
use yii\db\Schema;

class m170517_223934_studying extends Migration
{
    public function up()
    {
        $this->createTable('{{%students}}', [
            'group_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'student_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'first_name' => Schema::TYPE_STRING . ' NOT NULL',
            'middle_name' => Schema::TYPE_STRING . ' NOT NULL',
            'last_name' => Schema::TYPE_STRING . ' NOT NULL',
            'user_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'created_at' => Schema::TYPE_DATETIME . ' NOT NULL',
            'updated_at' => Schema::TYPE_DATETIME . ' NOT NULL'
        ]);
        $this->createTable('{{%groups}}', [
            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING . ' NOT NULL',
            'speciality_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'date_create' => Schema::TYPE_DATETIME . ' NOT NULL',
            'created_at' => Schema::TYPE_DATETIME . ' NOT NULL',
            'updated_at' => Schema::TYPE_DATETIME . ' NOT NULL'
        ]);
        $this->createTable('{{%teachers}}', [
            'id' => Schema::TYPE_PK,
            'first_name' => Schema::TYPE_STRING . ' NOT NULL',
            'middle_name' => Schema::TYPE_STRING . ' NOT NULL',
            'last_name' => Schema::TYPE_STRING . ' NOT NULL',
            'cathedra_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'rank' => Schema::TYPE_INTEGER . ' NOT NULL',
            'user_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'created_at' => Schema::TYPE_DATETIME . ' NOT NULL',
            'updated_at' => Schema::TYPE_DATETIME . ' NOT NULL'
        ]);
        $this->createTable('{{%cathedres}}', [
            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING . ' NOT NULL',
            'created_at' => Schema::TYPE_DATETIME . ' NOT NULL',
            'updated_at' => Schema::TYPE_DATETIME . ' NOT NULL'
        ]);
        $this->createTable('{{%specialties}}', [
            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING . ' NOT NULL',
            'cathedra_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'created_at' => Schema::TYPE_DATETIME . ' NOT NULL',
            'updated_at' => Schema::TYPE_DATETIME . ' NOT NULL'
        ]);
        $this->createTable('{{%subjects}}', [
            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING . ' NOT NULL',
            'created_at' => Schema::TYPE_DATETIME . ' NOT NULL',
            'updated_at' => Schema::TYPE_DATETIME . ' NOT NULL'
        ]);
        $this->createTable('{{%studying}}', [
            'group_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'subject_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'teacher_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'lessons_type' => Schema::TYPE_STRING . ' NOT NULL',
            'lessons_hours' => Schema::TYPE_INTEGER . ' NOT NULL',
            'created_at' => Schema::TYPE_DATETIME . ' NOT NULL',
            'updated_at' => Schema::TYPE_DATETIME . ' NOT NULL'
        ]);
        $this->createTable('{{%progress}}', [
            'group_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'student_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'subject_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'teacher_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'lessons_type' => Schema::TYPE_STRING . ' NOT NULL',
            'date_eval' => Schema::TYPE_DATETIME . ' NOT NULL',
            'work_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'value' => Schema::TYPE_INTEGER . ' NOT NULL',
            'description' => Schema::TYPE_TEXT,
            'created_at' => Schema::TYPE_DATETIME . ' NOT NULL',
            'updated_at' => Schema::TYPE_DATETIME . ' NOT NULL'
        ]);

        $this->addPrimaryKey('pk_student', '{{%students}}', ['group_id','student_id']);
        $this->addPrimaryKey('pk_studying', '{{%studying}}', ['group_id', 'subject_id', 'teacher_id', 'lessons_type']);
        $this->addPrimaryKey('pk_progress', '{{%progress}}', ['group_id', 'student_id',
                                                        'subject_id', 'teacher_id',
                                                        'lessons_type','date_eval',
                                                        'work_id']);


        $this->addForeignKey('fk_student_user_id', '{{%students}}', 'user_id', '{{%user}}', 'id', null, 'CASCADE');
        $this->addForeignKey('fk_student_group_id', '{{%students}}', 'group_id', '{{%groups}}', 'id', null, 'CASCADE');

        $this->addForeignKey('fk_group_speciality_id', '{{%groups}}', 'speciality_id', '{{%specialties}}', 'id', null, 'CASCADE');

        $this->addForeignKey('fk_speciality_cathedra_id', '{{%specialties}}', 'cathedra_id', '{{%cathedres}}', 'id', null, 'CASCADE');

        $this->addForeignKey('fk_teacher_user_id', '{{%teachers}}', 'user_id', '{{%user}}', 'id', null, 'CASCADE');
        $this->addForeignKey('fk_teacher_cathedra_id', '{{%teachers}}', 'cathedra_id', '{{%cathedres}}', 'id', null, 'CASCADE');

        $this->addForeignKey('fk_studying_subject_id', '{{%studying}}', 'subject_id', '{{%subjects}}', 'id', null, 'CASCADE');
        $this->addForeignKey('fk_studying_teacher_id', '{{%studying}}', 'teacher_id', '{{%teachers}}', 'id', null, 'CASCADE');
        $this->addForeignKey('fk_studying_group_id', '{{%studying}}', 'group_id', '{{%groups}}', 'id', null, 'CASCADE');

        $this->addForeignKey('fk_progress_student', '{{%progress}}', ['group_id','student_id'], '{{%students}}', ['group_id','student_id'], null, 'CASCADE');
        $this->addForeignKey('fk_progress_studying', '{{%progress}}', ['group_id', 'subject_id', 'teacher_id', 'lessons_type'], '{{%studying}}', ['group_id', 'subject_id', 'teacher_id', 'lessons_type'], null, 'CASCADE');

        //RBAC
        $authManager = Yii::$app->authManager;

        // user groups
        $administrateSTD = $authManager->createPermission('administrateSTD');
        $administrateSTD->description = 'Can administrate Studying';
        $authManager->add($administrateSTD);

        $teacherSTD = $authManager->createPermission('teacherSTD');
        $teacherSTD->description = 'Teacher in STD';
        $authManager->add($teacherSTD);

        $studentSTD = $authManager->createPermission('studentSTD');
        $studentSTD->description = 'Student in STD';
        $authManager->add($studentSTD);

        //objects STD
        $STDViewStudents = $authManager->createPermission('STDViewStudents');
        $STDViewStudents->description = 'Can view students';
        $authManager->add($STDViewStudents);

        $STDCreateStudents = $authManager->createPermission('STDCreateStudents');
        $STDCreateStudents->description = 'Can create students';
        $authManager->add($STDCreateStudents);

        $STDDeleteStudents = $authManager->createPermission('STDDeleteStudents');
        $STDDeleteStudents->description = 'Can delete students';
        $authManager->add($STDDeleteStudents);

        $STDUpdateStudents = $authManager->createPermission('STDUpdateStudents');
        $STDUpdateStudents->description = 'Can update students';
        $authManager->add($STDUpdateStudents);

        $STDViewGroups = $authManager->createPermission('STDViewGroups');
        $STDViewGroups->description = 'Can view groups';
        $authManager->add($STDViewGroups);

        $STDCreateGroups = $authManager->createPermission('STDCreateGroups');
        $STDCreateGroups->description = 'Can create groups';
        $authManager->add($STDCreateGroups);

        $STDDeleteGroups = $authManager->createPermission('STDDeleteGroups');
        $STDDeleteGroups->description = 'Can delete groups';
        $authManager->add($STDDeleteGroups);

        $STDUpdateGroups = $authManager->createPermission('STDUpdateGroups');
        $STDUpdateGroups->description = 'Can update groups';
        $authManager->add($STDUpdateGroups);

        $STDViewTeachers = $authManager->createPermission('STDViewTeachers');
        $STDViewTeachers->description = 'Can view teachers';
        $authManager->add($STDViewTeachers);

        $STDCreateTeachers = $authManager->createPermission('STDCreateTeachers');
        $STDCreateTeachers->description = 'Can create teachers';
        $authManager->add($STDCreateTeachers);

        $STDDeleteTeachers = $authManager->createPermission('STDDeleteTeachers');
        $STDDeleteTeachers->description = 'Can delete teachers';
        $authManager->add($STDDeleteTeachers);

        $STDUpdateTeachers = $authManager->createPermission('STDUpdateTeachers');
        $STDUpdateTeachers->description = 'Can update teachers';
        $authManager->add($STDUpdateTeachers);

        $STDViewCathedres = $authManager->createPermission('STDViewCathedres');
        $STDViewCathedres->description = 'Can view cathedres';
        $authManager->add($STDViewCathedres);

        $STDCreateCathedres = $authManager->createPermission('STDCreateCathedres');
        $STDCreateCathedres->description = 'Can create cathedres';
        $authManager->add($STDCreateCathedres);

        $STDDeleteCathedres = $authManager->createPermission('STDDeleteCathedres');
        $STDDeleteCathedres->description = 'Can delete cathedres';
        $authManager->add($STDDeleteCathedres);

        $STDUpdateCathedres = $authManager->createPermission('STDUpdateCathedres');
        $STDUpdateCathedres->description = 'Can update cathedres';
        $authManager->add($STDUpdateCathedres);

        $STDViewSubjects = $authManager->createPermission('STDViewSubjects');
        $STDViewSubjects->description = 'Can view subjects';
        $authManager->add($STDViewSubjects);

        $STDCreateSubjects = $authManager->createPermission('STDCreateSubjects');
        $STDCreateSubjects->description = 'Can create subjects';
        $authManager->add($STDCreateSubjects);

        $STDDeleteSubjects = $authManager->createPermission('STDDeleteSubjects');
        $STDDeleteSubjects->description = 'Can delete subjects';
        $authManager->add($STDDeleteSubjects);

        $STDUpdateSubjects = $authManager->createPermission('STDUpdateSubjects');
        $STDUpdateSubjects->description = 'Can update subjects';
        $authManager->add($STDUpdateSubjects);

        $STDViewSpecialties = $authManager->createPermission('STDViewSpecialties');
        $STDViewSpecialties->description = 'Can view specialties';
        $authManager->add($STDViewSpecialties);

        $STDCreateSpecialties = $authManager->createPermission('STDCreateSpecialties');
        $STDCreateSpecialties->description = 'Can create specialties';
        $authManager->add($STDCreateSpecialties);

        $STDDeleteSpecialties = $authManager->createPermission('STDDeleteSpecialties');
        $STDDeleteSpecialties->description = 'Can delete specialties';
        $authManager->add($STDDeleteSpecialties);

        $STDUpdateSpecialties = $authManager->createPermission('STDUpdateSpecialties');
        $STDUpdateSpecialties->description = 'Can update specialties';
        $authManager->add($STDUpdateSpecialties);

        $STDViewStudying = $authManager->createPermission('STDViewStudying');
        $STDViewStudying->description = 'Can view studying';
        $authManager->add($STDViewStudying);

        $STDCreateStudying = $authManager->createPermission('STDCreateStudying');
        $STDCreateStudying->description = 'Can create studying';
        $authManager->add($STDCreateStudying);

        $STDDeleteStudying = $authManager->createPermission('STDDeleteStudying');
        $STDDeleteStudying->description = 'Can delete studying';
        $authManager->add($STDDeleteStudying);

        $STDUpdateStudying = $authManager->createPermission('STDUpdateStudying');
        $STDUpdateStudying->description = 'Can update studying';
        $authManager->add($STDUpdateStudying);

        $STDViewProgress = $authManager->createPermission('STDViewProgress');
        $STDViewProgress->description = 'Can view progress';
        $authManager->add($STDViewProgress);

        $STDCreateProgress = $authManager->createPermission('STDCreateProgress');
        $STDCreateProgress->description = 'Can create progress';
        $authManager->add($STDCreateProgress);

        $STDDeleteProgress = $authManager->createPermission('STDDeleteProgress');
        $STDDeleteProgress->description = 'Can delete progress';
        $authManager->add($STDDeleteProgress);

        $STDUpdateProgress = $authManager->createPermission('STDUpdateProgress');
        $STDUpdateProgress->description = 'Can update progress';
        $authManager->add($STDUpdateProgress);

        $authManager->addChild($administrateSTD, $STDViewStudents);
        $authManager->addChild($administrateSTD, $STDCreateStudents);
        $authManager->addChild($administrateSTD, $STDDeleteStudents);
        $authManager->addChild($administrateSTD, $STDUpdateStudents);
        $authManager->addChild($administrateSTD, $STDViewGroups);
        $authManager->addChild($administrateSTD, $STDCreateGroups);
        $authManager->addChild($administrateSTD, $STDDeleteGroups);
        $authManager->addChild($administrateSTD, $STDUpdateGroups);
        $authManager->addChild($administrateSTD, $STDViewTeachers);
        $authManager->addChild($administrateSTD, $STDCreateTeachers);
        $authManager->addChild($administrateSTD, $STDDeleteTeachers);
        $authManager->addChild($administrateSTD, $STDUpdateTeachers);
        $authManager->addChild($administrateSTD, $STDViewCathedres);
        $authManager->addChild($administrateSTD, $STDCreateCathedres);
        $authManager->addChild($administrateSTD, $STDDeleteCathedres);
        $authManager->addChild($administrateSTD, $STDUpdateCathedres);
        $authManager->addChild($administrateSTD, $STDViewSubjects);
        $authManager->addChild($administrateSTD, $STDCreateSubjects);
        $authManager->addChild($administrateSTD, $STDDeleteSubjects);
        $authManager->addChild($administrateSTD, $STDUpdateSubjects);
        $authManager->addChild($administrateSTD, $STDViewSpecialties);
        $authManager->addChild($administrateSTD, $STDCreateSpecialties);
        $authManager->addChild($administrateSTD, $STDDeleteSpecialties);
        $authManager->addChild($administrateSTD, $STDUpdateSpecialties);
        $authManager->addChild($administrateSTD, $STDViewStudying);
        $authManager->addChild($administrateSTD, $STDCreateStudying);
        $authManager->addChild($administrateSTD, $STDDeleteStudying);
        $authManager->addChild($administrateSTD, $STDUpdateStudying);
        $authManager->addChild($administrateSTD, $STDViewProgress);
        $authManager->addChild($administrateSTD, $STDCreateProgress);
        $authManager->addChild($administrateSTD, $STDDeleteProgress);
        $authManager->addChild($administrateSTD, $STDUpdateProgress);

        $admin = $authManager->getRole('admin');

        $student = $authManager->createRole('student');
        $student->description = 'Studying student';
        $authManager->add($student);

        $teacher = $authManager->createRole('teacher');
        $teacher->description = 'Studying teacher';
        $authManager->add($teacher);

        $administratorSTD = $authManager->createRole('administratorSTD');
        $administratorSTD->description = 'Studying admin';
        $authManager->add($administratorSTD);

        $authManager->addChild($administratorSTD, $administrateSTD);
        $authManager->addChild($admin, $administrateSTD);
        $authManager->addChild($student, $studentSTD);
        $authManager->addChild($teacher, $teacherSTD);


    }

    public function down()
    {
        //RBAC
        $authManager = Yii::$app->authManager;



        $administrateSTD = $authManager->getPermission('administrateSTD');
        $studentSTD = $authManager->getPermission('studentSTD');
        $teacherSTD = $authManager->getPermission('teacherSTD');

        $admin = $authManager->getRole('admin');
        $student = $authManager->getRole('student');
        $teacher = $authManager->getRole('teacher');
        $administratorSTD = $authManager->getRole('administratorSTD');

        $authManager->removeChild($administratorSTD, $administrateSTD);
        $authManager->removeChild($admin, $administrateSTD);
        $authManager->removeChild($student, $studentSTD);
        $authManager->removeChild($teacher, $teacherSTD);

        $authManager->remove($student);
        $authManager->remove($teacher);
        $authManager->remove($administratorSTD);

        $STDViewStudents = $authManager->getPermission('STDViewStudents');
        $STDCreateStudents = $authManager->getPermission('STDCreateStudents');
        $STDDeleteStudents = $authManager->getPermission('STDDeleteStudents');
        $STDUpdateStudents = $authManager->getPermission('STDUpdateStudents');
        $STDViewGroups = $authManager->getPermission('STDViewGroups');
        $STDCreateGroups = $authManager->getPermission('STDCreateGroups');
        $STDDeleteGroups = $authManager->getPermission('STDDeleteGroups');
        $STDUpdateGroups = $authManager->getPermission('STDUpdateGroups');
        $STDViewTeachers = $authManager->getPermission('STDViewTeachers');
        $STDCreateTeachers = $authManager->getPermission('STDCreateTeachers');
        $STDDeleteTeachers = $authManager->getPermission('STDDeleteTeachers');
        $STDUpdateTeachers = $authManager->getPermission('STDUpdateTeachers');
        $STDViewCathedres = $authManager->getPermission('STDViewCathedres');
        $STDCreateCathedres = $authManager->getPermission('STDCreateCathedres');
        $STDDeleteCathedres = $authManager->getPermission('STDDeleteCathedres');
        $STDUpdateCathedres = $authManager->getPermission('STDUpdateCathedres');
        $STDViewSubjects = $authManager->getPermission('STDViewSubjects');
        $STDCreateSubjects = $authManager->getPermission('STDCreateSubjects');
        $STDDeleteSubjects = $authManager->getPermission('STDDeleteSubjects');
        $STDUpdateSubjects = $authManager->getPermission('STDUpdateSubjects');
        $STDViewSpecialties = $authManager->getPermission('STDViewSpecialties');
        $STDCreateSpecialties = $authManager->getPermission('STDCreateSpecialties');
        $STDDeleteSpecialties = $authManager->getPermission('STDDeleteSpecialties');
        $STDUpdateSpecialties = $authManager->getPermission('STDUpdateSpecialties');
        $STDViewStudying = $authManager->getPermission('STDViewStudying');
        $STDCreateStudying = $authManager->getPermission('STDCreateStudying');
        $STDDeleteStudying = $authManager->getPermission('STDDeleteStudying');
        $STDUpdateStudying = $authManager->getPermission('STDUpdateStudying');
        $STDViewProgress = $authManager->getPermission('STDViewProgress');
        $STDCreateProgress = $authManager->getPermission('STDCreateProgress');
        $STDDeleteProgress = $authManager->getPermission('STDDeleteProgress');
        $STDUpdateProgress = $authManager->getPermission('STDUpdateProgress');

        $authManager->removeChildren($administrateSTD);

        $authManager->remove($STDViewStudents);
        $authManager->remove($STDCreateStudents);
        $authManager->remove($STDDeleteStudents);
        $authManager->remove($STDUpdateStudents);
        $authManager->remove($STDViewGroups);
        $authManager->remove($STDCreateGroups);
        $authManager->remove($STDDeleteGroups);
        $authManager->remove($STDUpdateGroups);
        $authManager->remove($STDViewTeachers);
        $authManager->remove($STDCreateTeachers);
        $authManager->remove($STDDeleteTeachers);
        $authManager->remove($STDUpdateTeachers);
        $authManager->remove($STDViewCathedres);
        $authManager->remove($STDCreateCathedres);
        $authManager->remove($STDDeleteCathedres);
        $authManager->remove($STDUpdateCathedres);
        $authManager->remove($STDViewSubjects);
        $authManager->remove($STDCreateSubjects);
        $authManager->remove($STDDeleteSubjects);
        $authManager->remove($STDUpdateSubjects);
        $authManager->remove($STDViewSpecialties);
        $authManager->remove($STDCreateSpecialties);
        $authManager->remove($STDDeleteSpecialties);
        $authManager->remove($STDUpdateSpecialties);
        $authManager->remove($STDViewStudying);
        $authManager->remove($STDCreateStudying);
        $authManager->remove($STDDeleteStudying);
        $authManager->remove($STDUpdateStudying);
        $authManager->remove($STDViewProgress);
        $authManager->remove($STDCreateProgress);
        $authManager->remove($STDDeleteProgress);
        $authManager->remove($STDUpdateProgress);

        $authManager->remove($studentSTD);
        $authManager->remove($teacherSTD);

        $authManager->remove($administrateSTD);

        $this->dropForeignKey('fk_progress_studying', '{{%progress}}');
        $this->dropForeignKey('fk_progress_student', '{{%progress}}');
        $this->dropForeignKey('fk_studying_group_id', '{{%studying}}');
        $this->dropForeignKey('fk_studying_subject_id', '{{%studying}}');
        $this->dropForeignKey('fk_studying_teacher_id', '{{%studying}}');
        $this->dropForeignKey('fk_student_user_id', '{{%students}}');
        $this->dropForeignKey('fk_student_group_id', '{{%students}}');
        $this->dropForeignKey('fk_group_speciality_id', '{{%groups}}');
        $this->dropForeignKey('fk_speciality_cathedra_id', '{{%specialties}}');
        $this->dropForeignKey('fk_teacher_user_id', '{{%teachers}}');
        $this->dropForeignKey('fk_teacher_cathedra_id', '{{%teachers}}');

        $this->dropPrimaryKey('pk_student', '{{%students}}');
        $this->dropPrimaryKey('pk_studying', '{{%studying}}');
        $this->dropPrimaryKey('pk_progress', '{{%progress}}');

        $this->dropTable('{{%students}}');
        $this->dropTable('{{%groups}}');
        $this->dropTable('{{%teachers}}');
        $this->dropTable('{{%cathedres}}');
        $this->dropTable('{{%subjects}}');
        $this->dropTable('{{%specialties}}');
        $this->dropTable('{{%studying}}');
        $this->dropTable('{{%progress}}');
    }
}
