<?php

namespace app\controllers;

use yii\web\{Controller,Response};
use yii\data\Pagination;
use yii\widgets\ActiveForm;
use app\models\Task;
use app\forms\TaskForm;

class TaskController extends Controller
{
    public function actionIndex($orderBy = 'name', $type = 'asc')
    {
        $query = Task::find();
        $pagination = new Pagination([
            'defaultPageSize' => 3,
            'totalCount' => $query->count(),
        ]);
        $tasks = $query->orderBy($orderBy)
        ->offset($pagination->offset)
        ->limit($pagination->limit)
        ->all();

        return $this->render('index', [
            'tasks' => $tasks,
            'pagination' => $pagination,
        ]);
    }

    public function actionAddTask()
    {
        $request = \Yii::$app->request;
        $model = new Task();
        if ($request->isPost && $model->load($request->post())) {
            
            if ($request->isAjax) {
                \Yii::$app->response->format = Response::FORMAT_JSON;
                return ActiveForm::validate($model);
            }

            if($model->validate()) {
                $transaction = Task::getDb()->beginTransaction();
                try {
                    $model->save();
                    $transaction->commit();
                } catch (\Exeption $e) {
                    \Yii::$app->session->setFlash('warning',$e->getMessage());
                    return $this->render('addtask',['model' => $model]);
                }
                \Yii::$app->session->setFlash('success',"Запись успешно добавлена");
                return $this->redirect(['/task']);

            }
        }

        return $this->render('addtask',['model' => $model]);

    }

    public function actionEditTask($id)
    {   
        $request = \Yii::$app->request;
        if ($request->isPost) {

        }
        $model = Task::find(['id' => $id])->one();
        if ($model) {
            return $this->render('edittask',['model' => $model]);
        }
        return $this->redirect(['/task']);
        
    }
}