<?php declare(strict_types=1);

namespace App\UI\Control\DataGrid\UserDataGrid;

interface UserDataGridFactoryInterface
{
    /**
     * @return UserDataGrid
     */
    public function create(): UserDataGrid;
}
