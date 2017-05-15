<?php
/**
 * Created by PhpStorm.
 * User: iqueak
 * Date: 26.04.2017
 * Time: 23:07
 */

namespace common\models;

use Yii;
use yii\db\ActiveRecord;

class BasePost extends ActiveRecord
{
    /**
     * @var BasePost
     */

    public $imageAlias = '@frontend';
    public $imagePath = '/web/img/';
    public $imageFolder = 'blog/';
    public $imageName = '';
    public $imageFile;

    public function rules()
    {
        return [
            [['imageFile'], 'image', 'skipOnEmpty' => true, 'extensions' => 'png, jpg','maxSize' => (1024*1024*5)],
        ];
    }

    public function upload($path)
    {
        if ($this->validate()) {
            $this->imageFile->saveAs($path);
            return true;
        } else {
            return false;
        }
    }
}
