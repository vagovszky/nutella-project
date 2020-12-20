<?php declare(strict_types = 1);

namespace App\Modules\Admin\User;

use App\Modules\Admin\BaseAdminPresenter;

use App\UI\Control\DataGrid\UserDataGrid\UserDataGridFactoryInterface;
use App\UI\Control\DataGrid\UserDataGrid\UserDataGrid;

final class UserPresenter extends BaseAdminPresenter {

    /** @var UserDataGridFactoryInterface @inject */
    public $userDataGridFactory;
    
    /**
     * @param UserDataGridFactoryInterface $factory
     * @return UserDataGrid
     */
    protected function createComponentGrid(): UserDataGrid
    {
        return $this->userDataGridFactory->create();
    }
    
  
}
