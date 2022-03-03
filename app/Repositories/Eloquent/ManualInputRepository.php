<?php

namespace App\Repositories\Eloquent;

use App\Models\ManualInput;
use App\Repositories\ManualInputRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class ManualInputRepository
 * @package App\Repositories
 */
class ManualInputRepository implements ManualInputRepositoryInterface {

    /**
     * @var ManualInput
     */
    protected $manualInput;
    /**
     * @param News $news
     */
    public function __construct(ManualInput $manualInput)
    {
        $this->manualInput = $manualInput;
    }

    public function find($id)
    {
        return $this->manualInput->findOrFail($id);
    }

    /**
    * @return Collection
    */
    public function all(): Collection
    {
        return $this->manualInput->all();    
    }

}