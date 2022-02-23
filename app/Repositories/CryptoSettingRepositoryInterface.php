<?php
namespace App\Repositories;

use Illuminate\Support\Collection;

interface CryptoSettingRepositoryInterface
{
   public function all(): Collection;
}