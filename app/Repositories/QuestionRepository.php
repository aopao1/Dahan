<?php
/**
 * 广场问题处理模块
 * Author: Jason
 * Email: Admin@wujinyu.com
 * Version: V1.0
 * Time: 2018/4/20 13:57:22
 */
namespace App\Repositories;
use App\Models\Question;
use Illuminate\Database\Eloquent\Model;

/**
 * Class QuestionRepository
 * @package App\Repositories
 */
class QuestionRepository
{
    /**
     * @param string $id
     * @return mixed
     */
    public function byId($id = '')
    {
        return Question::with(['user', 'topic'])->find($id);
    }

    /**
     * @return mixed
     */
    public function getAll()
    {
        return Question::with(['user', 'topic'])->get()->ToArray();
    }

    /**
     * @param array $data
     */
    public function store(array $data)
    {
        $question = Question::create($data);
        $question->topic()->attach($data['topic']);  //多对多关联,数据关联
    }


    /**
     * @param Model $model
     * @param array $data
     */
    public function update(Model $model, array $data)
    {
        $model->update([
            'title' => $data['title'],
            'body' => $data['body'],
        ]);
        $model->topic()->sync($data['topic']);  //多对多关联,数据关联
    }

}