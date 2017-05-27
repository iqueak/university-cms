<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Progress;

/**
 * ProgressSearch represents the model behind the search form about `common\models\Progress`.
 */
class ProgressSearch extends Progress
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['group_id', 'student_id', 'subject_id', 'teacher_id', 'work_id', 'value'], 'integer'],
            [['lessons_type', 'date_eval', 'description', 'created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Progress::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'group_id' => $this->group_id,
            'student_id' => $this->student_id,
            'subject_id' => $this->subject_id,
            'teacher_id' => $this->teacher_id,
            'date_eval' => $this->date_eval,
            'work_id' => $this->work_id,
            'value' => $this->value,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'lessons_type', $this->lessons_type])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
