<?php

namespace App\Repositories\Eloquent;

use App\Models\CryptoSettings;
use App\Repositories\CryptoSettingRepositoryInterface;
use Illuminate\Support\Collection;

class CryptoSettingRepository extends BaseRepository implements CryptoSettingRepositoryInterface
{

   /**
    * CryptoSettingRepository constructor.
    *
    * @param CryptoSettings $model
    */
   public function __construct(CryptoSettings $model)
   {
       parent::__construct($model);
   }

   /**
    * @return Collection
    */
   public function all(): Collection
   {
       return $this->model->all();    
   }
}