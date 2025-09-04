<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Cast;

<<<<<<< HEAD
use Doctrine\DBAL\Schema\Index;
=======
>>>>>>> 841fcfb (.)
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
        try{
            return $model->attributesToArray(); 
        }catch(\ValueError|\Error|\Exception $e){
=======
        try {
            return $model->attributesToArray();
        } catch (\ValueError|\Error|\Exception $e) {
>>>>>>> 841fcfb (.)
            return $this->safeExecute($model);
        }
    }

<<<<<<< HEAD

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
=======
    /**
     * @return array<string, mixed>
     */
    public function safeExecute(Model $model): array
    {
        /** @var array<string, mixed> $data */
        $data = [];
        foreach ($model->getAttributes() as $key => $value) {
            try {
                $data[$key] = $model->$key;
            } catch (\ValueError|\Error $e) {
                // Skip this attribute if it causes an error
            }
        }

        return $data;
>>>>>>> 841fcfb (.)
    }
}
