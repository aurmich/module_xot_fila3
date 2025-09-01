<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Cast;

<<<<<<< HEAD
=======
use Doctrine\DBAL\Schema\Index;
>>>>>>> e697a77b (.)
use Illuminate\Database\Eloquent\Model;
use Spatie\QueueableAction\QueueableAction;

class SafeArrayByModelCastAction
{
    use QueueableAction;

    /**
     * @return array<string, mixed>
     */
    public function execute(Model $model): array
    {
<<<<<<< HEAD
        try {
            return $model->attributesToArray();
        } catch (\ValueError|\Error|\Exception $e) {
=======
        try{
            return $model->attributesToArray(); 
        }catch(\ValueError|\Error|\Exception $e){
>>>>>>> e697a77b (.)
            return $this->safeExecute($model);
        }
    }

<<<<<<< HEAD
    public function safeExecute(Model $model): array
    {
        $data = [];
        foreach ($model->getAttributes() as $key => $value) {
            try {
                $data[$key] = $model->$key;
                /** @phpstan-ignore-next-line */
            } catch (\ValueError|\Error $e) {

            }
        }

        return $data;
=======

    public function safeExecute(Model $model): array
    {
        $data=[];
        foreach($model->getAttributes() as $key=>$value){
            try{
                $data[$key]=$model->$key;
                /** @phpstan-ignore-next-line */
            }catch(\ValueError|\Error $e){
                
            }
        }
        
        return $data;;
>>>>>>> e697a77b (.)
    }
}
