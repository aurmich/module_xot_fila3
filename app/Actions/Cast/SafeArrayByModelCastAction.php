<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Cast;

<<<<<<< HEAD
<<<<<<< HEAD
=======
use Doctrine\DBAL\Schema\Index;
>>>>>>> e697a77b (.)
=======
use Doctrine\DBAL\Schema\Index;
>>>>>>> 89d0c8f4 (.)
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
<<<<<<< HEAD
        try {
            return $model->attributesToArray();
        } catch (\ValueError|\Error|\Exception $e) {
=======
        try{
            return $model->attributesToArray(); 
        }catch(\ValueError|\Error|\Exception $e){
>>>>>>> e697a77b (.)
=======
        try{
            return $model->attributesToArray(); 
        }catch(\ValueError|\Error|\Exception $e){
>>>>>>> 89d0c8f4 (.)
            return $this->safeExecute($model);
        }
    }

<<<<<<< HEAD
<<<<<<< HEAD
=======

>>>>>>> 89d0c8f4 (.)
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
<<<<<<< HEAD

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
=======
        
        return $data;;
>>>>>>> 89d0c8f4 (.)
    }
}
