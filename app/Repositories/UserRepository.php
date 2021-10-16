<?php
namespace App\Repositories;
use Illuminate\Database\Eloquent\Model;
 use App\Models\User;
class UserRepository extends BaseRepository implements UserInterfaceRepository
{
   public function __construct(User $model)
   {
       parent::__construct($model);
   }
}
